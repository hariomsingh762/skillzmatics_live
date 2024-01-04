@extends('backend.admin.layouts.master')

@section('title','All Pages')

@section('content') 




            

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Skill Matics</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Skill Matics</a></li>
                                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">All Pages</li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <button class="btn btn-primary  dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="mdi mdi-cog me-2"></i> Settings
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Separated link</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->


                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                         <div class="btn-toolbar p-3" role="toolbar">
                                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Select
                                                    
                                                    <i class="mdi mdi-chevron-down ms-1"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Delete</a>
                                                    <a class="dropdown-item" href="#">Move to Trash</a>
                                                </div>
                                            </div>
                                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                             <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle"> Apply
                                                </button>
                                            </div>
                                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                                <button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    Select <i class="mdi mdi-chevron-down ms-1"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="#">Mark as Unread</a>
                                                    <a class="dropdown-item" href="#">Mark as Important</a>
                                                    <a class="dropdown-item" href="#">Add to Tasks</a>
                                                    <a class="dropdown-item" href="#">Add Star</a>
                                                    <a class="dropdown-item" href="#">Mute</a>
                                                </div>
                                            </div>
                                            <div class="btn-group me-2 mb-2 mb-sm-0">
                                             	<button type="button" class="btn btn-primary waves-light waves-effect dropdown-toggle">  Filter
                                                </button>
                                            </div>
                                        </div>
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                                            <thead>
                                            <tr>
                                            	<th>
                                            	<div class="checkbox-wrapper-mail">
                                                    <input type="checkbox" id="chk19">
                                                     <label for="chk19" class="toggle"></label>
                                                </div>
                                            	</th>
                                                <th style="width: 50%">Title</th>
                                                <th>Aurthor</th>
                                                <th>Date</th>
                                                <th>Stutus</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            <tr>
                                            	<td>
                                            	<div class="checkbox-wrapper-mail">
                                                    <input type="checkbox" id="chk19">
                                                    <label for="chk19" class="toggle"></label>
                                                </div>
                                                </td>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>2023/10/18 at 8:47 am</td>
                                                <td>Published</td>
                                                <td><button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button></td>
                                            </tr>
                                            <tr>
                                            	<td>
                                            	<div class="checkbox-wrapper-mail">
                                                    <input type="checkbox" id="chk19">
                                                    <label for="chk19" class="toggle"></label>
                                                </div>
                                            	</td>
                                                <td>Jonas Alexander</td>
                                                <td>Developer</td>
                                                <td>2023/10/18 at 8:47 am</td>
                                                <td>Published</td>
                                                <td><button type="button" class="btn btn-primary waves-light waves-effect"><i class="far fa-trash-alt"></i></button></td>
                                            </tr>
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
			</div>
            <!-- end main content-->


@endsection