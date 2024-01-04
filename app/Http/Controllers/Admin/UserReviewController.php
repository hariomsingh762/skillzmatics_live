<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Admin;
use Carbon\Carbon;
use Cookie;
use DB;
use Mail;
use File;
use Session;

class UserReviewController extends Controller
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

    public function userReview()
    {
        $ReviewData = DB::table('user_responses')->get();
        //dd($ReviewData);
        return view('backend.admin.user_responses.list',compact('ReviewData'));
    }
}
