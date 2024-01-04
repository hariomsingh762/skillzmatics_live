<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Admin;
use App\Models\SkillsChecklist;
use App\Models\SkillsChecklistUnit;
use App\Models\Category;
use App\Models\CheckListItemController;
use Carbon\Carbon;
use Cookie;
use DB;
use Mail;
use File;
use Session;

class CategoryController extends Controller
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
    
    public function CategoryList()
    {
        $skillCat = Category::get();

        return view('backend.admin.skillCategory.list',compact('skillCat'));
    }

    public function CategoryAdd()
    {
        $unit = SkillsChecklistUnit::all();
        $skillListCat = SkillsChecklist::all();
        return view('backend.admin.skillCategory.addCat',compact('skillListCat','unit'));
    }

    public function CategoryStore(Request $request)
    {

            $request->validate([
                'cat_name' => 'required',
                'unit_name' =>'required',
            ]);

            $SkillsCat['name'] = $request['cat_name'];
            $SkillsCat['slug'] = $request['cat_slug'];
            $SkillsCat['unit_id'] = $request['unit_id'];
            $SkillsCat['status'] = 'active';
            $SkillsCat['description'] = $request['description'];
            $SkillsCat['created_at'] = now();
            $query = DB::table('categories')->insert($SkillsCat);
            Session::flash('pass', 'Skill Category Added.'); 
            return redirect('/add-skills-category/');
        
    }


    public function CategoryEdit($id)
    {
        $skillCat = SkillsChecklist::all();
        $unit = SkillsChecklistUnit::all();
        $skillCategory = Category::find($id);

    return view('backend.admin.skillCategory.edit',compact('skillCategory','skillCat','unit'));
    }


    public function CategoryUpdate(Request $request,$id)
    {

            $request->validate([
                'cat_name' => 'required',
                'cat_slug' => 'required',
            ]);

            $SkillsCat['name'] = $request['cat_name'];
            $SkillsCat['slug'] = $request['cat_slug'];
            $SkillsCat['unit_id'] = $request['unit_id'];
            $SkillsCat['status'] = 'active';
            $SkillsCat['description'] = $request['description'];
            $SkillsCat['updated_at'] = now();
            $query = DB::table('categories')->where('id',$id)->update($SkillsCat);
            Session::flash('pass', 'Skill Category Updated.'); 
            return redirect()->back();
        
    }


    public function updateCategoryStatus(Request $request, $id)
    {
        $findIF = Category::where('id', $id)->value('status');

        $newStatus = $findIF === 'active' ? 'inactive' : 'active';

        $status['status'] = $newStatus;

        $changeStatus = DB::table('categories')->where('id', $id)->update($status);

        if ($changeStatus) {
            return response()->json(['message' => 'Skill categories status updated successfully', 'newStatus' => $newStatus]);
        } else {
            return response()->json(['message' => 'Failed to update skill categories status'], 400);
        }
    }


    public function deleteCategory($id)
    {
        $SkillsCat = Category::find($id);
        if ($SkillsCat) {
            $SkillsCat->delete();
            session()->flash('success', 'Skill Categories '.$SkillsCat->item_name.' deleted successfully');
            return response()->json(['message' => "Skill $SkillsCat->item_name deleted successfully"]);
        }
        // If the skill is not found, return an error message
        return response()->json(['error' => 'Skill Categories not found'], 404);
    }
}
