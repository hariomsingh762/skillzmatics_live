@extends('company.layouts.master')

@section('title', 'Requirements Wise Job Listing')

@section('content')

<div class="main-content">
   <div class="page-content">
      <div class="container-fluid">
         <!-- start page title -->
         <div class="page-title-box">
            <div class="row align-items-center">
               <div class="col-md-8">
                  <h6 class="page-title">Requirements Wise Job Listing</h6>
                  <ol class="breadcrumb m-0">
                     <li class="breadcrumb-item"><a href="#">Skillz Matics</a></li>
                     <li class="breadcrumb-item"><a href="#">Requirements Wise</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Job Listing</li>
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
                            @foreach ($requirements as $index => $data)
                            
                            <div class="accordion-item border rounded mt-2">
                              <h2 class="accordion-header" id="heading{{$index}}">
                              <button class="accordion-button fw-semibold"
                                        onclick="redirectToRoute('{{ route('company.requirementWise', ['requirementID' => $data['id']]) }}')">
                                  <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="#">{{$data['id']}}</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="#">{{$data['name']}}  ({{$data['count']}})</a></li>
                                  </ol>
                                </button>
                              </h2>
                              <div id="collapse{{$index}}" class="accordion-collapse collapse" aria-labelledby="heading{{$index}}" data-bs-parent="#accordionExample">

                              </div>
                            </div>
                            @endforeach
                            <script>
                                function redirectToRoute(route) {
                                    window.location.href = route;
                                }
                            </script>
                        </div>

                    </div>
                </div>
            </div>


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
<!-- End main-content -->