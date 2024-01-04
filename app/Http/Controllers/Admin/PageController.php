<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\LrPost;
use Cookie;
use DB;
use Mail;
use File;
use Session;
use Carbon\Carbon;

class PageController extends Controller
{
   
    public function index()
    {
        return view('backend.admin.pages.index');
    }

    public function create(Request $request)
    {
        return view('backend.admin.pages.create');
    }

    public function store(Request $request)
    {
         $adminId = Session::get('ADMIN_LOGIN');
        dd($request);
        $request->validate([
        'post_title' => 'required'
        ]);

        $Pages = new LrPost;
        $Pages->post_author = $adminId;
        $Pages->post_date = now();
        $Pages->post_date_gmt = Carbon::now('GMT');
        $Pages->post_content = $request->input('post_content');
        $Pages->post_title = $request->input('post_title');


        $Pages->post_excerpt = $request->input('cat_name');
        $Pages->post_status = $request->input('cat_slug');
        $Pages->comment_status = $request->input('unit_id');
        $Pages->ping_status = 'active';
        $Pages->post_name = $request->input('post_name');

        $Pages->post_modified = $request->input('cat_name');
        $Pages->post_modified_gmt = Carbon::now('GMT');
        $Pages->post_parent = $request->input('post_parent');
        $Pages->menu_order = 'active';
        $Pages->post_type = 'page';

        $Pages->guid = $request->input('featured_image');
        $mimeType = $request->file('featured_image')->getMimeType();
        $Pages->post_mime_type = $mimeType;

        $Pages->save();
        Session::flash('pass', 'Page Added.');
        return redirect()->back()->with('success', 'Your operation was successful.');

    }
    
    public function edit(Page $page)
    {
        return view('backend.admin.pages.edit');
    }

    public function update(Request $request, Page $page)
    {
        // Logic to validate and update a specific page
    }

    public function updateStatus(Page $page)
    {
        // Logic to update the status of a specific page
    }

    public function destroy(Page $page)
    {
        // Logic to delete a specific page
    }

}
