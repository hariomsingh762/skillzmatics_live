<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\ContactedUser;
use Carbon\Carbon;
use Crypt;
use Session;
use DB;
use Mail;
use Cokie;
use File;

class UserJobController extends Controller
{
    public function jobs()
    {
        $user_id = 32;//Session::get('FRONT_USER_ID');
        $getJobsData = ContactedUser::where('user_id',$user_id)
        ->leftjoin('company','contacted_users.company_id','=','company.id')
        ->leftjoin('job_postings','contacted_users.jobpost_id','=','job_postings.id')
        ->select('company.*','contacted_users.*','job_postings.*')
        ->get();

        //dd($getJobsData);
        return view('user.jobs.alljobs',compact('getJobsData'));

    }
}
