@extends('backend.admin.layouts.master')

@section('title','Create Page')

@section('content') 



            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Add Page</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Skill Matics</a></li>
                                        <li class="breadcrumb-item"><a href="#">Pages</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Page</li>
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
                                <!-- Left sidebar -->
                                <div class="email-leftbar card">
                                    <div class="d-grid">
                                        <a href="email-compose.html" class="btn btn-purple rounded btn-custom waves-effect waves-light">Publish</a>
                                    </div>    
                                    <div class="mail-list mt-4">
                                        <a href="#" class="active">Publish <span class="ms-1"></span></a>
                                        <a href="#">Status : </a>
                                        <a href="#">Published on : </a>
                                    </div>
        
        
                                    <h5 class="mt-4">Page Attributes</h5>
        
                                    <div class="mail-list mt-2">
                                        <a href="#"><span class="mdi  text-info float-end"></span>Parent</a>
                                        <div class=" row mb-3">
                                            <div class="col-sm-12">
                                                <select class="form-select" aria-label="Default select example">
                                                    <option selected>No Parent</option>
                                                    <option value="1">One</option>
                                                    <option value="2">Two</option>
                                                    <option value="3">Three</option>
                                                    </select>
                                            </div>
                                        </div>
                                    </div>
        
                                    <h5 class="mt-4">Featured Image</h5>
        							        <div class="col-md-6">
                                                <img class="rounded" alt="200x200" width="200"
                                                    src="{{ asset('admin/assets/images/small/img-4.jpg')}}" data-holder-rendered="true">
                                            </div>
                                    <div class="mt-4">
                                        <a href="#" class="d-flex">Set featured image
                                        </a>
                                    </div>
                                </div>
                                <!-- End Left sidebar -->
        
        
                                <!-- Right Sidebar -->
                                <div class="email-rightbar">
                                    


                                    <div class="card">
                                        <div class="card-body">

                                            <div>
                                                <div class="mb-3">
                                                    <input type="email" class="form-control" name="title" id="title" placeholder="Add Title" oninput="generateSlug()">
                                                </div>
            
                                                <div class="mb-3">
                                                    <input type="text" class="form-control" name="slug" id="slug" placeholder="Url">
                                                </div>
                                                <div class="mb-3">
                                                    <form method="post">
                                                        <textarea id="email-editor" name="area"></textarea>
                                                    </form>
                                                </div>

                                                <div class="btn-toolbar mb-0">
                                                    <div class="">
                                                        <button type="button" class="btn btn-danger waves-effect waves-light me-1"><i class="far fa-trash-alt"></i> Move to Trash</button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>


                                </div> <!-- end Col-9 -->
        
                            </div>
        
                        </div><!-- End row -->
    
                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
                
                
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12">
                                © <script>document.write(new Date().getFullYear())</script> Veltrix<span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                            </div>
                        </div>
                    </div>
                </footer>


            </div>
            <!-- end main content-->


    <script>
        function generateSlug() {
            const titleInput = document.getElementById('title');
            const slugInput = document.getElementById('slug');
            const title = titleInput.value.trim();
            const slug = title.toLowerCase().replace(/\s+/g, '-');
            slugInput.value = slug;
        }
    </script>
@endsection