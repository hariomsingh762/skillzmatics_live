@extends('backend.admin.layouts.master')
@section('title','All User Review')
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
                            @foreach ($ReviewData as $index => $data)
                            
                            <div class="accordion-item border rounded mt-2">
                              <h2 class="accordion-header" id="heading{{$index}}">
                                <button class="accordion-button fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}" aria-expanded="true" aria-controls="collapse{{$index}}">
                                  <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">{{$data->reference_id}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$data->email}}</a></li>
                                  </ol>
                                </button>
                              </h2>
                              <div id="collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$index}}" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                            @php 
                            $abc = json_decode($data->checklist_response, true);
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
                                                    
                                                </thead>
                                            <tbody>
                                @php
                                $classes = [
                                    '0' => '',            
                                    '1' => 'table-light', 
                                    '2' => 'table-success', 
                                    '3' => 'table-info', 
                                    '4' => 'table-warning',
                                    '5' => 'table-danger'
                                ];
                                @endphp

                                @if (isset($data_1['question_set']) && is_array($data_1['question_set']))
                                    @foreach ($data_1['question_set'] as $index_2 => $question)
                                        @php
                                        $classIndex = $index_2 % count($classes);
                                        $class = $classes[$classIndex];
                                        @endphp

                                        <tr class="{{ $class }}" id="row-{{ $index_2 }}">
                                            <th scope="row">{{ $index_2 + 1 }}</th>
                                            <td>{{ $question['question_name'] }}</td>
                                            <td>@for($i = 1; $i <= 5; $i++)
                                                            @if($i <= $question['stars'])
                                                                <span style="font-size: 20px;color: #9e670e;">&#9733;</span>
                                                            @else
                                                                <span style="font-size: 20px; color: grey;">&#9733;</span>
                                                            @endif
                                                        @endfor</td>
                                           
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

@endsection