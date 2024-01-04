<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\JobPosting;
use App\Models\SkillsChecklist;
use App\Models\SkillsChecklistUnit;
use App\Models\ContactedUser;
use Illuminate\Http\Request;
use Session;
use DB;
use Mail;
use App\Mail\ContactUserMailClass;

class JobMatchingController extends Controller
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

    public function listingJobMatch()
    {
        $companyId = session::get('COMPANY_LOGIN');
        $companyJobPosted = JobPosting::where('company_id',$companyId)->get();
        $applicants = [];
        foreach ($companyJobPosted as $jobPosting) {
            $jobApplicants = $jobPosting->department;
            $applicants[] = $jobApplicants;
        }
        $departments = [];
        
        foreach ($applicants as $key=>$value) {
            $skillsChecklist = SkillsChecklist::find($value);
        
            if ($skillsChecklist) {
                $departmentID = $skillsChecklist->id;
                $departmentName = $skillsChecklist->name;
                $count = DB::table('user_responses')->where('department', $departmentID)->count();
                $departmentCounts[$departmentID] = $count;
                $departments[] = [
                    'id' => $departmentID,
                    'name' => $departmentName,
                    'count' => $count,
                ];
            }
        }
        //dd($departments);
        return view('company.jobApplicantMatching.departmentWise',compact('departments'));
    }

    public function RequirementwiseJob($departmentID)
    {
        $companyId = session::get('COMPANY_LOGIN');
        $companyJobPosted = JobPosting::where('company_id',$companyId)->where('department',$departmentID)->get();

        if(empty($companyJobPosted))
        {
            return back()->with('message','You have not posted job for this category');
        }
        $applicants = [];
        foreach ($companyJobPosted as $jobPosting) {
            $jobApplicants = $jobPosting->requirements;
            $applicants[] = $jobApplicants;
        }

        $requirements = [];
        
        foreach ($applicants as $key=>$value) {
            $skillsChecklist = SkillsChecklistUnit::find($value);
        
            if ($skillsChecklist) {
                $requirementsID = $skillsChecklist->iid;
                $requirementsName = $skillsChecklist->unit_name;
                $count = DB::table('user_responses')->where('requirements', $requirementsID)->count();
                $departmentCounts[$requirementsID] = $count;
                $requirements[] = [
                    'id' => $requirementsID,
                    'name' => $requirementsName,
                    'count' => $count,
                ];
            }
        }

        return view('company.jobApplicantMatching.requirementsWise',compact('requirements'));

    }

    public function titleWiseJob($requirementsID)
    {
        $companyId = session::get('COMPANY_LOGIN');
        $companyJobPosted = JobPosting::where('company_id',$companyId)->where('department',$requirementsID)->get();

        if(empty($companyJobPosted))
        {
            return back()->with('message','You have not posted job for this category');
        }

        $applicants = [];
        $matchedUsers = [];
        foreach ($companyJobPosted as $jobPosting) {
            $jobApplicants = $jobPosting->title;
            $applicants[] = $jobApplicants;
        
            // Fetch user data for the current job posting
            $getApplicantSubmittedData = DB::table('user_responses')->get();
            $responseData = [];
        
            foreach ($getApplicantSubmittedData as $index => $data) {
                $responseData = json_decode($data->checklist_response, true);
        
                foreach ($responseData as $index1 => $data1) {
                    if ($data1 && is_array($data1) && isset($data1['question_set'])) {
                        foreach ($data1['question_set'] as $index_2 => $data2) {
                            if ($data2['question_name'] === $jobPosting->title) {
                                    $user = $data;
                                    $user->title = $jobPosting->title;
                                    $matchedUsers[] = $user;
                            }
                        }
                    }
                }
            }
        }
        //dd($matchedUsers);
        return view('company.jobApplicantMatching.titleWise',compact('matchedUsers'));

    }

    public function viewApplicantReview($applicantID)
    {
        $ApplicantReviewData  = DB::table('user_responses')->where('id',$applicantID)->first();
        return view('company.jobApplicantMatching.viewApplicantData',compact('ApplicantReviewData'));
    }

    public function contactApplicant($applicantID, $title)
    {
        $ApplicantReviewData  = DB::table('user_responses')->where('id',$applicantID)->first();
        $getJobDetail = JobPosting::whereRaw('LOWER(title) = ?', strtolower($title))->first();
        return view('company.jobApplicantMatching.contactApplicant',compact('ApplicantReviewData','getJobDetail'));
    }

    public function pingApplicant(Request $request)
    {
        
//dd($request);
        try {
            // Send email
            Mail::to($request->input('email'))->send(new ContactUserMailClass([
                'description' => $request->input('titleDescription'),
                'email' => $request->input('email'),
                // Add other email-related data as needed
            ]));
        
            // Save data to the database
            $contactedUserData = [
                'user_id' => $request->input('user_id'),
                'company_id' => $request->input('company_id'),
                'jobpost_id' => $request->input('jobpost_id'),
                'description' => $request->input('titleDescription'),
                'contacted_date' => now(),
                // Add other data as needed
            ];
        
        
            $contactedUser = ContactedUser::create($contactedUserData);
        
            return redirect()->back()->with('success', 'Email sent and data saved successfully.');
        } catch (\Exception $e) {

            return redirect()->back()->with('error', 'Failed to send email or save data.');
        }
        
    }
}

