<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\SkillsChecklistUnit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Company;
use App\Models\JobPosting;
use App\Models\SkillsChecklist;
use Session;
use Carbon\Carbon;
use DB;
use Mail;
use File;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $companyId = session::get('COMPANY_LOGIN');
            $companyInfo=DB::table('company')->where('id',$companyId)->first();
            view()->share([
                'companyInfo' =>$companyInfo,
            ]);
        return $next($request);    
        });
    }

    public function listing()
    {
        $company_id = Session::get('COMPANY_LOGIN');
        $jobDetails = JobPosting::where('company_id',$company_id)->get();
        return view('company.job.jobListing',compact('jobDetails'));
    }

    public function addJob()
    {
        $department = SkillsChecklist::where('status',1)->get();
        $requirement = SkillsChecklistUnit::where('status',1)->get();
        return view('company.job.addJob',compact('department','requirement'));
    }

    public function storeJob(Request $request)
    {
        $validatedData = $request->validate([
            'department' => 'required',
            'title' => 'required',
            'requirements' => 'required',
            'city' => 'required',
        ]);
    
        // Creating a new job posting
        $companyId = session()->get('COMPANY_LOGIN');
    
        $jobPostingData = [
            'company_id' => $companyId,
            'title' => $validatedData['title'],
            'description' => $request->input('description'),
            'location' => implode('/', [
                $request->input('street'),
                $request->input('city'),
                $request->input('state'),
                $request->input('country'),
                $request->input('zip'),
            ]),
            'department' => $validatedData['department'],
            'requirements' => $validatedData['requirements'],
            'posted_date' => now(),
            'deadline' => now()->addMonth(),
            'status' => 1,
        ];
    
        $jobPosting = JobPosting::create($jobPostingData);
    
        // Retrieving job postings with their associated company
        //$jobPostings = JobPosting::with('company')->get();
    
        Session::flash('success', 'Job Posted');
    
        return back();
    }
    
    public function editJob($id)
    {
        $Datajob = JobPosting::find($id);
        $department = SkillsChecklist::where('status',1)->get();
        $requirement = SkillsChecklistUnit::where('status',1)->get();
        return view('company.job.editJob',compact('Datajob','department','requirement'));
    }

    public function updateJob(Request $request)
    {
        dd('here');
    }

    public function updateJobStatus($id)
    {
        $findIF = JobPosting::where('id', $id)->value('status');

        $newStatus = $findIF === 1 ? 0 : 1;

        $status['status'] = $newStatus;

        $changeStatus = DB::table('job_postings')->where('id', $id)->update($status);

        if ($changeStatus) {
            return response()->json(['message' => 'Job status updated successfully', 'newStatus' => $newStatus]);
        } else {
            return response()->json(['message' => 'Failed to update Job status'], 400);
        }
    }

    public function deleteJob($id)
    {
        $job = JobPosting::find($id);
        if ($job) {
            $job->delete();
            session()->flash('success', 'Skill Unit'.$job->title.' deleted successfully');
            return response()->json(['message' => "Skill $job->title deleted successfully"]);
        }
        // If the skill is not found, return an error message
        return response()->json(['error' => 'Skill Unit not found'], 404);
    }
}
