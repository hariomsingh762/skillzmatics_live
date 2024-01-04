@extends('backend.admin.layouts.master')
@section('title','Skill CheckList Item List')
@section('content')         
<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="page-title-box">
            <div class="row align-items-center">
               <div class="col-md-8">
                  <h6 class="page-title">All CheckList Item</h6>
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="#">Skillz Matics</a></li>
                     <li class="breadcrumb-item"><a href="#">CheckList Item</a></li>
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
         <div id="notification-message"></div>
                     <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Checklist Items</h4>
                        <div class="accordion" id="accordionExample">
                            @foreach ($skillUnitList as $index => $data)
                            
                            <div class="accordion-item border rounded mt-2">
                              <h2 class="accordion-header" id="heading{{$index}}">
                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}" aria-expanded="true" aria-controls="collapse{{$index}}">
                                  <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">{{$data->checklist_name}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$data->unit_name}}</a></li>
                                  </ol>
                                </button>
                              </h2>
                              <div id="collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$index}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                            @php 
                            $abc = json_decode($data->data_set, true);
                            $holdValue = $abc;

                            @endphp
                            @if (!is_null($holdValue))
                            @foreach($holdValue as $index_1 => $data_1)
                            
                            @if ($data_1['question_set']!=NULL)
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <h4 class="card-title"><span class="badge rounded-pill bg-info">{{ $data_1['top_question'] }}</span></h4>
                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>Question Name</th>
                                                        <th>Stars</th>
                                                        <th>Status</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                            <tbody>
                                @php
                                $classes = [
                                '0' => '',            
                                '1' => 'table-light', 
                                '2' =>'table-success', 
                                '3' =>'table-info', 
                                '4' =>'table-warning',
                                '5' =>'table-danger'
                            ];
                                @endphp
                                @if (isset($data_1['question_set']) && is_array($data_1['question_set']))
                                @foreach ($data_1['question_set'] as $index_2 => $question)

                            <tr class="{{ $classes[$index_2] }}" id="row-{{ $index_2 }}">
                            <th scope="row">{{ $index_2 + 1 }}</th>
                            <td>{{ $question['question_name'] }}</td>
                            <td>{{ $question['stars'] }}</td>
                            <td>{{ $question['stars'] }}</td>
                            <td><a href="#" class="btn btn-primary btn-sm">Edit</a> 
                            <button class="btn btn-danger btn-sm delete-checklist-item"
                                    data-checklist-id="{{$data->checklist_id}}"
                                    data-unit-id="{{$data->iid}}"
                                    data-index-2="{{$index_2}}"
                                    data-top-question="{{$data_1['top_question']}}"
                                    data-question-name="{{$question['question_name']}}">Delete</button>

                            </td>
                            </tr>
                            @endforeach
                            @endif
                            </tbody>
                            </table>

                            </div>

                            </div>
                            </div>
                            </div>
                            </div>
                            @endif
                            <!-- end row -->


                            @endforeach
                            @endif
                                </div>
                              </div>
                            </div>
                            @endforeach

                        </div>

                    </div>
                </div>
            </div>

         <!-- end row -->
      </div>
      <!-- container-fluid -->
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
           const newStatus = currentStatus === 'active' ? 'inactive' : 'active';
   
           $.ajax({
               url: '/update-skill-status/' + skillId,
               type: 'POST',
               data: {
                   "_token": "{{ csrf_token() }}",
                   "status": newStatus
               },
               success: function(data) {
                   $(this).data('current-status', newStatus);
   
                   if (data.message) {
                           // Display the message in a designated element
                           $('#notification-message').html('<div class="alert alert-success" role="alert"><strong>Skill status updated to :</strong> ' + newStatus + '</div>');
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
       $('.delete-checklist-item').on('click', function() {

                var checklistId = $(this).data('checklist-id'); // Integer value
                var unitId = $(this).data('unit-id'); // Integer value
                var index2 = $(this).data('index-2'); // Integer value
                var topQuestion = $(this).data('top-question'); // String value
                var questionName = $(this).data('question-name'); // String value
           if (confirm('Are you sure you want to delete this skill?')) {
               $.ajax({
                   url: '/skill-check-list-item-delete/' + checklistId + '/' + unitId + '/' + index2 + '/' + topQuestion + '/' + questionName,
                   type: 'DELETE',
                   data: {
                       "_token": "{{ csrf_token() }}",
                   },
                   success: function(data) {
                       $('#row-' + index2).remove();
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