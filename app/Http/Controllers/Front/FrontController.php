<?php


namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Subscriber;
use App\Models\SkillsChecklist;
use App\Models\SkillsChecklistUnit;
use App\Models\ChecklistItem;
use App\Models\Cms;
use DB;
use Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;
use App\Notifications\ReviewNotification;


use Illuminate\Http\Request;

class FrontController extends Controller
{

    public function __construct()
    {
    
            $subscription = Subscriber::get();
            view()->share([
            'subscription' =>$subscription,
          ]);
    }

    public function index()
    {

        return view('frontend.index');
    }
    


    public function resourceSkillCheckList()
    {
        $skillUnitList = CheckListItem::leftJoin('skills_checklist_unit AS cat_unit', 'checklist_items.unit_id', '=', 'cat_unit.iid')
        ->leftJoin('skills_checklist AS checklist', 'cat_unit.cid', '=', 'checklist.id')
        ->where('checklist.status', 'active')
        ->where('cat_unit.status', 'active')
        ->select('checklist.name as checklist_name','checklist.id as checklist_id','cat_unit.*', 'checklist_items.*')
        ->get();
        $skillCat = SkillsChecklist::where('status', 'active')->get();

        foreach ($skillCat as $category) {
            $units = SkillsChecklistUnit::where('cid', $category->id)->where('status', 'active')->get();
            $category->units = $units;
        }
        return view('frontend.template.resourceSkillCheckList',compact('skillCat'));
    }


    public function checklistItems($checklist_id, $unit_id)
    {
        $skillUnitList = CheckListItem::join('skills_checklist', 'checklist_items.checklist_id', '=', 'skills_checklist.id')
                    ->join('skills_checklist_unit', 'checklist_items.unit_id', '=', 'skills_checklist_unit.iid')
                    ->where('checklist_items.checklist_id', $checklist_id)
                    ->where('checklist_items.unit_id', $unit_id)
                    ->select('checklist_items.*', 'skills_checklist.name as checklist_name', 'skills_checklist_unit.*')
                    ->first();
                      //dd($skillUnitList);
        return view('frontend.template.reviewPage',compact('skillUnitList'));
    }

    public function submitSkillzReview(Request $request)
    {
        $request->validate([
            'requestedBy' => 'required',
            'firstName' => 'required',
            'lastName' => 'required',
            'mobileNumber' => 'required',
            'emailAddress' => 'required',
            'stars.*' => 'required|integer|between:1,5',
        ]);
        $data = $request->input('data');
        $formattedData = [];
        foreach ($data as $item) {
            $topQuestion = $item['top_question'];
            $questionSet = $item['question_set'];
    
            $formattedData[] = [
                'top_question' => $topQuestion,
                'question_set' => $questionSet,
            ];
        }
        
        $randomNumber = str_pad(mt_rand(0, 999999), 6, '0', STR_PAD_LEFT);
        $reference_id = 'SK_' . $randomNumber;
        $userResponse = [
            'requested_by' => $request->input('requestedBy'),
            'name' => $request->input('firstName') . ' ' . $request->input('lastName'),
            'mobile' => $request->input('mobileNumber'),
            'email' => $request->input('emailAddress'),
            'checklist_response' => json_encode($formattedData),
            'reference_id' => $reference_id,
            'created_at' => now(),
        ];
        $if_success = DB::table('user_responses')->insert($userResponse);
        Session::flash('pass', 'Review Submitted.');
    if ($if_success) {
        $email = $request->emailAddress;
        $latestRecord = DB::table('user_responses')
            ->where('email', $email)
            ->latest() 
            ->first();
    //return view('backend.admin.mail_notification.review_notification',compact('latestRecord'));
        $adminEmail = 'hariom10.msg@gmail.com'; 
        Notification::route('mail', $adminEmail)->notify(new ReviewNotification($latestRecord));
        $message = 'Our Team will be in touch with you shortly.';
    } else {
                $message = 'Failed to submit the form. Please try again.';
            }
    
        $ref_id= $latestRecord->reference_id;
    return view('frontend.template.successful',compact('ref_id'));
    }




    public function aboutus()
    {
        return view('frontend.template.about');
    }

    public function pricing()
    {
        return view ('frontend.template.pricing');
    }

    public function training()
    {
        return view('frontend.template.traing');
    }

    public function ReachUs()
    {
        return view('frontend.template.contact');
    }

    public function selectValidityPeriod(Request $request)
    {
        
        $validityPeriod = $request->input('validity_period');
        dd($validityPeriod);
        Session::put('validity_period', $validityPeriod);

        return redirect()->route('register');
    }

    
}
