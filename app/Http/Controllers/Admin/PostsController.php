<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Cookie;
use DB;
use Mail;
use File;
use Session;

class PostsController extends Controller
{

    public function index()
    {
        return view('backend.admin.posts.index');
    }

    public function create()
    {
        return view('backend.admin.posts.create');
    }

    public function store(Request $request)
    {
        // Logic to validate and store a new page
    }
    
    public function edit(Page $page)
    {
        return view('backend.admin.posts.edit');
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

    public function postsCategory()
    {
        return view('backend.admin.posts.createCategory');
    }

}
