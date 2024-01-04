@extends('backend.admin.layouts.master')

@section('title','Add Skill Category')

@section('content') 

<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-md-8">
                                    <h6 class="page-title">Add Category</h6>
                                    <ol class="breadcrumb m-0">
                                        <li class="breadcrumb-item"><a href="#">Skillz Matics</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Add Category</a></li>
                                    </ol>
                                </div>
                                <div class="col-md-4">
                                    <div class="float-end d-none d-md-block">
                                        <div class="dropdown">
                                            <a href="{{route('skills.checkList')}}" class="btn btn-primary" type="button">
                                                <i class="fa fa-arrow-left"></i> Back
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->



                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        @if(Session::get('pass'))
                                        <div class="alert alert-success" role="alert">
                                            <strong>Well done!</strong> You successfully Added Skills Category.
                                        </div>
                                        @endif
                                        <form method="POST" action="{{route('skills.storeCheckList')}}" enctype="multipart/form-data" >
                                            @csrf
                                            <div class="mb-3">
                                                <label>Category Name</label>
                                                <input type="text" class="form-control" maxlength="50" name="cat_name" id="cat_name_defaultconfig">
                                                 @error('cat_name')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                                            </div>

                                            <div class="mb-3">
                                                <label>Slug</label>
                                                <input type="text" class="form-control" maxlength="50" name="cat_slug" id="cat_slug_defaultconfig">
                                                @error('cat_slug')<span class="text-danger" role="alert">{{ $message }}</span>@enderror
                                            </div>

                                            <!-- <div class="mb-3">
                                                <label class="form-label">Select Parent Category</label>
                                                <select class="form-control select2" name="parent_cat_name">
                                                    <option value="">Select</option>
                                                    @foreach($skillListCat as $data)
                                                        <option value="{{$data->id}}">{{$data->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div> -->

                                            <div class="mb-3">
                                                <label>Description</label>
                                                <textarea id="elm1" class="form-control" name="description" maxlength="225" rows="3" placeholder="This textarea has a limit of 225 chars."></textarea>
                                            </div>


                                            <!-- <div class="mb-5">
                                                <div class="dropzone dz-clickable">
                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple="multiple">
                                                    </div>

                                                    <div class="dz-message needsclick">
                                                        <div class="mb-3">
                                                            <i class="mdi mdi-cloud-upload display-4 text-muted"></i>
                                                        </div>
                                                        
                                                        <h4>Drop files here or click to upload.</h4>
                                                    </div>
                                                </div>
                                            </div> -->
                                            <!-- <div class="mb-3">
                                                <label class="form-label">Auto Close</label>
                                                <div class="input-group" id="datepicker2">
                                                    <input type="text" class="form-control" placeholder="dd M, yyyy"
                                                        data-date-format="dd M, yyyy" data-date-container='#datepicker2' data-provide="datepicker"
                                                        data-date-autoclose="true">

                                                    <span class="input-group-text"><i class="mdi mdi-calendar"></i></span>
                                                </div>
                                            </div> -->

                                            <!-- <input class="form-check form-switch" type="checkbox" id="switch4" switch="success" checked>
                                            <label class="form-label" for="switch4" data-on-label="Yes" data-off-label="No"></label> 

                                           <div class="mb-3">
                                                <label class="form-label">Using data attributes</label>
                                                <input id="demo0" type="text" value="55" name="demo0" data-bts-min="0" data-bts-max="100" data-bts-init-val="" data-bts-step="1" data-bts-decimal="0" data-bts-step-interval="100" data-bts-force-step-divisibility="round" data-bts-step-interval-delay="500" data-bts-prefix="" data-bts-postfix="" data-bts-prefix-extra-class="" data-bts-postfix-extra-class="" data-bts-booster="true" data-bts-boostat="10" data-bts-max-boosted-step="false" data-bts-mousewheel="true" data-bts-button-down-class="btn btn-default" data-bts-button-up-class="btn btn-default">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">With prefix </label>
                                                <input id="demo2" type="text" value="0" name="demo2" class=" form-control">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Default file input</label>
                                                <input type="file" class="filestyle" data-buttonname="btn-secondary">
                                            </div> -->

                                            <div class="mb-3">
                                                <div class="float-end d-none d-md-block">
                                                    <button class="btn btn-primary" type="submit"><i class="fa fa-arrow-right bold"></i> Add</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div> <!-- end col -->
                        </div> <!-- end row -->

                        

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->
            </div>
            <!-- End main-content -->
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<!-- 
<div class="">

<div class="alert alert-info" role="alert">
<strong>Heads up!</strong> This alert needs your attention, but it's not super important.
</div>
<div class="alert alert-warning" role="alert">
<strong>Warning!</strong> Better check yourself, you're not looking too good.
</div>
<div class="alert alert-danger mb-0" role="alert">
<strong>Oh snap!</strong> Change a few things up and try submitting again.
</div>
</div> -->

<script>
    function slugify(text)
    {
    return text.toString().toLowerCase()
    .replace(/\s+/g, '-')           // Replace spaces with -
    .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
    .replace(/\-\-+/g, '-')         // Replace multiple - with single -
    .replace(/^-+/, '')             // Trim - from start of text
    .replace(/-+$/, '');            // Trim - from end of text
    }

    $('#cat_name_defaultconfig').keyup(function(){
    var slug = $(this).val();
    $('#cat_slug_defaultconfig').val(slugify(slug));
    });
    function preview2() {
    frame2.src=URL.createObjectURL(event.target.files[0]);
    }
    </script>
@endsection