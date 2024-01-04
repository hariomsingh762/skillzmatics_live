@extends('company.layouts.master')

@section('title', 'Job Listing')

@section('content')


<div class="main-content">

<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h6 class="page-title">All Jobs</h6>
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="#">Skillz Matics</a></li>
                        <li class="breadcrumb-item"><a href="#">Jobs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </div>
                <div class="col-md-4">
                    <div class="float-end d-none d-md-block">
                        <div class="dropdown">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-arrow-left"></i> Back
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <!-- Add this empty div for notification messages -->
        <div id="notification-message"></div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap datatable-skills" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>Parent Categroy</th>
                                    <th>Child Name</th>
                                    <th>Title</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobDetails as $data)
                              
                                <tr id="row-{{ $data->id }}">
                                    <td>{{$data->department}}</td>
                                    <td>{{$data->requirements}}</td>
                                    <td>{{$data->title}}</td>                                   
                                    <td>
                                        <input  class="form-check form-switch status-switch" type="checkbox"
                                               data-skill-id="{{ $data->id }}"
                                               data-current-status="{{ $data->status }}"
                                               {{ $data->status == '1' ? 'checked' : '' }}>
                                        <label class="form-label" data-on-label="Yes" data-off-label="No"></label>
                                    </td>

                                        <label class="form-label" for="switch4" data-on-label="Yes" data-off-label="No"></label>
                                    <td>
                                        <a href="{{url('/company/edit-job')}}/{{$data->id}}" class="btn btn-primary btn-sm">Edit</a> 
                                        <button class="btn btn-danger btn-sm delete-job-button" data-id="{{ $data->id }}">Delete</button>
                                        <!-- <a href="#" class="btn btn-info btn-sm">Info</a>  -->
                                    </td>

                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div> <!-- container-fluid -->
</div>
<!-- End Page-content -->



<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                © <script>document.write(new Date().getFullYear())</script> Dpt<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by .....</span>
            </div>
        </div>
    </div>
</footer>

</div>
<!-- end main content-->






<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
$('.status-switch').on('change', function() {
const skillId = $(this).data('skill-id');
const currentStatus = $(this).data('current-status');
const newStatus = currentStatus === 1 ? 0 : 1;

$.ajax({
url: '/company/update-job-status/' + skillId,
type: 'POST',
data: {
"_token": "{{ csrf_token() }}",
"status": newStatus
},
success: function(data) {
$(this).data('current-status', newStatus);

if (data.message) {
        // Display the message in a designated element
        const statusText = newStatus === 1 ? 'Active' : 'Inactive';
        $('#notification-message').html('<div class="alert alert-success" role="alert"><strong>Job status changed to :</strong> ' + statusText + '</div>');
    }
// alert('Skill status updated to ' + newStatus);
},
error: function(xhr) {
console.log(xhr.responseText);
}
});
});
});
</script>

<script>
jQuery(document).ready(function($) {
$('.delete-job-button').on('click', function() {
const skillId = $(this).data('id');
if (confirm('Are you sure you want to delete this skill?')) {
$.ajax({
url: '/company/delete-job/' + skillId,
type: 'POST',
data: {
    "_token": "{{ csrf_token() }}",
},
success: function(data) {
    $('#row-' + skillId).remove();
    if (data.message) {
        $('#notification-message').html('<div class="alert alert-success" role="alert"><strong>Success:</strong> ' + data.message + '</div>');
    }
},
error: function(xhr) {
    console.log(xhr.responseText);
}
});
}
});
});
</script>

@endsection