<?php

namespace App\Http\Controllers\Admin;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\ProdcutInquiry;
use Session;
use DB;
use Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\AdminNotification;

class ProductInquiryController extends Controller
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

    public function contact_submit(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
        ]);



        $inquiry['first_name'] = $request['first_name'];
        $inquiry['last_name'] = $request['last_name'];
        $inquiry['email'] = $request['email'];
        $inquiry['company_name'] = $request['company_name'];
        $inquiry['state'] = $request['state'];
        $inquiry['city'] = $request['city'];
        $inquiry['What_describes_you_best'] = $request['What_describes_you_best'];
        $inquiry['hear_about_us'] = $request['hear_about_us'];
        $inquiry['message'] = $request['message'];
        $inquiry['phone'] = $request['phone'];
        $inquiry['created_at'] = date('Y-m-d H:i:s');

        $if_success = DB::table('product_inquiry')->insert($inquiry);

        if ($if_success) {
            // Send email to admin
            $adminEmail = 'hariom10.msg@gmail.com'; // Replace with the admin's email address
            $notification = new AdminNotification($inquiry);
            Mail::to($adminEmail)->send($notification);

            $message = 'Our Team will be in touch with you shortly.';
            Alert::success('Form Submitted', $message)->persistent(true)->autoClose(5000);
        } else {
            // Handle database insertion failure
            $message = 'Failed to submit the form. Please try again.';
            Alert::error('Form Submission Failed', $message)->persistent(true)->autoClose(5000);
        }


        // some alert function
        //Alert::info('Info Title', 'Info Message');
        //Alert::warning('Warning Title', 'Warning Message');
        //Alert::error('Error Title', 'Error Message');
        //Alert::question('Question Title', 'Question Message');
        //Alert::image('Image Title!','Image Description','Image URL','Image Width','Image Height');
        //Alert::html('Html Title', 'Html Code', 'Type');

        return redirect()->back();

    }
    public function inquiry_list()
    {
        $inquiry_data = ProdcutInquiry::all();
        return view('admin.product-inquiry.inquiry_list',compact('inquiry_data'));
    }

    public function markAsRead(Request $request)
    {

        $inquiryId = $request->input('inquiry_id');
        $inquiry = ProdcutInquiry::find($inquiryId);
        if (!$inquiry) {
            return response('Inquiry not found', 404);
        }
        $inquiry->markasread = 1;
        $inquiry->save();
        return response('OK');
    }

    public function send_mail(Request $request)
    {
        $request->validate([
            'to' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
    
        $to = $request->to;
        $subject = $request->subject;
        $message = $request->message;
    
        $from = 'admin@gmail.com';
        $headers = 'From: ' . $from;
    
        mail($to, $subject, $message, $headers);
    
        return redirect()->back()->with('pass', 'Mail sent successfully.');
    }



    
}
