<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\SkillsChecklist;
use App\Models\SkillsChecklistUnit;
use App\Models\Category;
use App\Models\ChecklistItem;
use Carbon\Carbon;
use Cookie;
use DB;
use Mail;
use File;
use Session;

class CheckListItemController extends Controller
{
   public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $admindata = Admin::where('id',Session::get('ADMIN_LOGIN'))->first();
            view()->share([
                'admindata' =>$admindata,
            ]);
        return $next($request);    
        });
    }
    
    public function CategoryItemList()
    {
        $skillUnitList = ChecklistItem::leftJoin('skills_checklist_unit AS cat_unit', 'checklist_items.unit_id', '=', 'cat_unit.iid')
            ->leftJoin('skills_checklist AS checklist', 'cat_unit.cid', '=', 'checklist.id')
            ->where('checklist.status', 'active')
            ->where('cat_unit.status', 'active')
            ->select('checklist.name as checklist_name','checklist.id as checklist_id','cat_unit.*', 'checklist_items.*')
            ->get();

        //dd($skillUnitList);

        return view('backend.admin.skillCheckListItem.list',compact('skillUnitList'));
    }

    public function CategoryItemAdd()
    {
        $SkillsChecklist = SkillsChecklist::all();
        $SkillsChecklistUnit = SkillsChecklistUnit::all();
       // $skillsCat = Category::all();
        return view('backend.admin.skillCheckListItem.addItem',compact('SkillsChecklist','SkillsChecklistUnit'));
    }

    public function getUnitsDepartments($checklistId)
    {
        $unitsDepartments = SkillsChecklistUnit::where('cid', $checklistId)->pluck('unit_name', 'iid');
        return response()->json($unitsDepartments);
    }

    public function CategoryItemStore(Request $request)
    {

            $request->validate([
                'checklist_id' => 'required',
                'unit_id' => 'required',
                'group-a.*.stars' => 'numeric|max:3',
            ]);

            $checklistId = $request->checklist_id;
            $unitId = $request->unit_id;
            $topQuestion = $request->top_question;
            $existingRecord = CheckListItem::where('checklist_id', $checklistId)
                ->where('unit_id', $unitId)
                ->first();

            if (!$existingRecord) {
                // Create a new record if it doesn't exist
                $dataSet = [];
                $entry = [
                    "top_question" => $topQuestion,
                    "rule" => $request->rule,
                    "question_set" => $request['group-a']
                ];
                $dataSet[] = $entry;
                $newRecord = new CheckListItem([
                    "checklist_id" => $checklistId,
                    "unit_id" => $unitId,
                    'data_set' => json_encode($dataSet),
                   
                ]);
                $newRecord->save();
                Session::flash('pass', 'Skill Check List Item Added.');
                return redirect('/add-skills-category-item/');
            } else {
                        $existingData = json_decode($existingRecord->data_set);
                        $foundMatch = false;
                        
                        foreach ($existingData as $index => $data) {
                            if ($data->top_question == $topQuestion) {
                                $newQuestions = [];
                                
                                foreach ($request['group-a'] as $questionData) {
                                    $newQuestion = [
                                        "question_name" => $questionData['question_name'],
                                        "stars" => $questionData['stars'],
                                        "status" => 'active'
                                    ];
                                    
                                    $newQuestions[] = $newQuestion;
                                }

                                // Append all the new questions to the existing data
                                $existingData[$index]->question_set = array_merge($existingData[$index]->question_set, $newQuestions);

                                $existingRecord->data_set = json_encode($existingData);
                                $existingRecord->save();
                                $foundMatch = true;
                                break;
                            }
                        }
                    }


                if (!$foundMatch) {
                    $newData = [
                        "top_question" => $topQuestion,
                        "rule" => $request->rule,
                        "question_set" => [
                            [
                                "question_name" => $request['group-a'][0]['question_name'],
                                "stars" => $request['group-a'][0]['stars']
                            ]
                        ]
                    ];
                    $existingData[] = $newData;
                    $existingRecord->data_set = json_encode($existingData);
                    $existingRecord->save();
                }

                Session::flash('pass', 'Skill Check List Item Added.');
                return redirect('/add-skills-category-item/');
    }


    public function CategoryItemEdit($id)
    {
        
        $skillCat = SkillsChecklist::all();
        $skillEdit = SkillsChecklistUnit::find($id);

    return view('backend.admin.skillCheckListItem.edit',compact('skillEdit','skillCat'));
    }


    public function CategoryItemUpdate(Request $request,$id)
    {

        $request->validate([
            'unit_name' => 'required',
            'unit_slug' => 'required',
        ]);

        $SkillsUnit['unit_name'] = $request['unit_name'];
        $SkillsUnit['unit_slug'] = $request['unit_slug'];
        $SkillsUnit['cid'] = $request['cid'];
        $SkillsUnit['status'] = 'active';
        $SkillsUnit['description'] = $request['description'];
        $SkillsUnit['updated_at'] = now();
        $query = DB::table('checklist_items')->where('id',$id)->update($SkillsUnit);
        Session::flash('pass', 'Skill Unit Updated.'); 
        return redirect()->back();
        
    }


    public function updateCategoryItemStatus(Request $request, $id)
    {
        $findIF = SkillsChecklistUnit::where('iid', $id)->value('status');

        $newStatus = $findIF === 'active' ? 'inactive' : 'active';

        $status['status'] = $newStatus;

        $changeStatus = DB::table('skills_checklist_unit')->where('iid', $id)->update($status);

        if ($changeStatus) {
            return response()->json(['message' => 'Skill unit status updated successfully', 'newStatus' => $newStatus]);
        } else {
            return response()->json(['message' => 'Failed to update skill unit status'], 400);
        }
    }


    public function deleteCheckListItem($id,$unitId, $index2, $top_question, $question_name)
    {
        $SkillsUnit = CheckListItem::where('checklist_id', $id)->where('unit_id', $unitId)->first();

        $rawData = json_decode($SkillsUnit->data_set, true); 

        foreach ($rawData as &$topQuestion) {
            if ($topQuestion['top_question'] === $top_question) {
                $topQuestion['question_set'] = array_filter($topQuestion['question_set'], function ($question) use ($question_name) {
                    return $question['question_name'] !== $question_name;
                });
            }
        }

        $newData = json_encode($rawData);
        $SkillsUnit->data_set = $newData;
        $SkillsUnit->save();

        return response()->json(['message' => "Skill $SkillsUnit->item_name deleted successfully"]);

        // If the skill is not found, return an error message
        //return response()->json(['error' => 'Skill Unit not found', 'check' =>$rawData], 404);
    }
}




