<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\SkillsChecklist;
use App\Models\SkillsChecklistUnit;
use Carbon\Carbon;
use Cookie;
use DB;
use Mail;
use File;
use Session;

class SkillsController extends Controller
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

    public function checkList()
    {
        $skillListCat = SkillsChecklist::get();



    //    $checking = Subscriber::select('subscribers.s_name', 'subscribers.sid','subscribers.price','parents.s_name as parent_name')
    // ->leftJoin('subscribers as parents', 'subscribers.parent_id', '=', 'parents.sid')
    // ->whereNotNull('subscribers.parent_id')
    // ->get();
    $subscribers = SkillsChecklist::select('skills_checklist.name', 'skills_checklist.id', 'parents.name as parent_name')
    ->leftJoin('skills_checklist as parents', 'skills_checklist.parent_id', '=', 'parents.id')
    ->where('skills_checklist.parent_id')
    ->get();
        return view('backend.admin.skillCheckList.list',compact('skillListCat'));
    }

    public function addCheckList()
    {
        $skillListCat = SkillsChecklist::all();
        return view('backend.admin.skillCheckList.addCat',compact('skillListCat'));
    }

    public function storeCheckList(Request $request)
    {

            $request->validate([
                'cat_name' => 'required',
            ]);

            $storeSkillCat['name'] = $request['cat_name'];
            $storeSkillCat['slug'] = $request['cat_slug'];
            $storeSkillCat['parent_id'] = $request['parent_cat_name'];
            $storeSkillCat['description'] = $request['description'];
            $storeSkillCat['status'] = 'active';
            $storeSkillCat['created_at'] = now();
            $query = DB::table('skills_checklist')->insert($storeSkillCat);
            Session::flash('pass', 'Skill Category Added.'); 
            return redirect('/add-check-list-category/');
        
    }


    public function editcheckList($id)
    {
        $skillEdit = SkillsChecklist::find($id);
    return view('backend.admin.skillCheckList.edit',compact('skillEdit'));
    }


    public function updatecheckList(Request $request,$id)
    {

            $request->validate([
                'cat_name' => 'required',
                'cat_slug' => 'required',
            ]);

            $storeSkillCat['name'] = $request['cat_name'];
            $storeSkillCat['slug'] = $request['cat_slug'];
            $storeSkillCat['parent_id'] = $request['parent_cat_name'];
            $storeSkillCat['description'] = $request['description'];
            $storeSkillCat['status'] = 'active';
            $storeSkillCat['updated_at'] = now();
            $query = DB::table('skills_checklist')->where('id',$id)->update($storeSkillCat);
            Session::flash('pass', 'Skill Category Updated.'); 
            return redirect()->back();
        
    }


    public function updatecheckListStatus(Request $request, $id)
    {
        $findIF = SkillsChecklist::where('id', $id)->value('status');

        $newStatus = $findIF === 'active' ? 'inactive' : 'active';

        $status['status'] = $newStatus;

        $changeStatus = DB::table('skills_checklist')->where('id', $id)->update($status);

        if ($changeStatus) {
            return response()->json(['message' => 'Skill status updated successfully', 'newStatus' => $newStatus]);
        } else {
            return response()->json(['message' => 'Failed to update skill status'], 400);
        }
    }


    public function destroycheckList($id)
    {
        $SkillsChecklist = SkillsChecklist::find($id);
        if ($SkillsChecklist) {
            $SkillsChecklist->delete();
            session()->flash('success', 'Skill '.$SkillsChecklist->name.' deleted successfully');
            return response()->json(['message' => "Skill $SkillsChecklist->name deleted successfully"]);
        }
        // If the skill is not found, return an error message
        return response()->json(['error' => 'Skill not found'], 404);
    }


   // ======================================================================================================


    public function skillUnitList()
    {
        $skillUnitList = SkillsChecklistUnit::get();

//dd($skillUnitList);

    //    $checking = Subscriber::select('subscribers.s_name', 'subscribers.sid','subscribers.price','parents.s_name as parent_name')
    // ->leftJoin('subscribers as parents', 'subscribers.parent_id', '=', 'parents.sid')
    // ->whereNotNull('subscribers.parent_id')
    // ->get();
    // $subscribers = SkillsChecklist::select('skills_checklist_unit.name', 'skills_checklist_unit.id', 'parents.name as parent_name')
    // ->leftJoin('skills_checklist_unit as parents', 'skills_checklist_unit.parent_id', '=', 'parents.id')
    // ->where('skills_checklist_unit.parent_id')
    // ->get();
        return view('backend.admin.skillUnit.list',compact('skillUnitList'));
    }

    public function skillAddUnit()
    {
        $skillListCat = SkillsChecklist::all();
        return view('backend.admin.skillUnit.addUnit',compact('skillListCat'));
    }

    public function skilladdUnitStore(Request $request)
    {

            $request->validate([
                'unit_name' => 'required',
            ]);

            $SkillsUnit['unit_name'] = $request['unit_name'];
            $SkillsUnit['unit_slug'] = $request['unit_slug'];
            $SkillsUnit['cid'] = $request['cid'];
            $SkillsUnit['status'] = 'active';
            $SkillsUnit['description'] = $request['description'];
            $SkillsUnit['created_at'] = now();
            $query = DB::table('skills_checklist_unit')->insert($SkillsUnit);
            Session::flash('pass', 'Skill Unit Added.'); 
            return redirect('/add-skills-unit/');
        
    }


    public function skillEditunit($id)
    {
        
        $skillCat = SkillsChecklist::all();
        $skillEdit = SkillsChecklistUnit::find($id);

    return view('backend.admin.skillUnit.edit',compact('skillEdit','skillCat'));
    }


    public function skillUpdateUnit(Request $request,$id)
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
            $query = DB::table('skills_checklist_unit')->where('iid',$id)->update($SkillsUnit);
            Session::flash('pass', 'Skill Unit Updated.'); 
            return redirect()->back();
        
    }


    public function updateSkillUnitStatus(Request $request, $id)
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


    public function deleteUnit($id)
    {
        $SkillsUnit = SkillsChecklistUnit::find($id);
        if ($SkillsUnit) {
            $SkillsUnit->delete();
            session()->flash('success', 'Skill Unit'.$SkillsUnit->item_name.' deleted successfully');
            return response()->json(['message' => "Skill $SkillsUnit->item_name deleted successfully"]);
        }
        // If the skill is not found, return an error message
        return response()->json(['error' => 'Skill Unit not found'], 404);
    }

}
