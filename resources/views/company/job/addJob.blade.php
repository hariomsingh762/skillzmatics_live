@extends('company.layouts.master')

@section('title', 'Add Job Details')

@section('content')


<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Add Job</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Skillz Matics</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Add Job</a></li>
                        </ol>
                    </div>
                    <div class="col-md-4">
                        <div class="float-end d-none d-md-block">
                            <div class="dropdown">
                                <a href="{{route('skills.jobList')}}" class="btn btn-primary" type="button">
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
                            @if(Session::get('success'))
                            <div class="alert alert-success" role="alert">
                                <strong>Well done!</strong> You successfully Added Job.
                            </div>
                            @endif
                            <form method="POST" action="{{route('skills.storeJob')}}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label>Department Name</label>
                                    <select class="form-control select2" name="department" id="department">
                                                        <option value="">Select</option>
                                                        @foreach($department as $data)
                                                            <option value="{{$data->id}}">{{$data->name}}</option>
                                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Requirement</label>
                                    <select class="form-control select2" name="requirements" id="requirements">
                                                        <option value="">Select</option>
                                                        @foreach($requirement as $data)
                                                            <option value="{{$data->iid}}">{{$data->unit_name}}</option>
                                                        @endforeach
                                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" maxlength="50" name="title"
                                        id="title">
                                    @error('title')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea id="elm1" class="form-control" name="description" maxlength="225" rows="3"
                                        placeholder="This textarea has a limit of 225 chars."></textarea>
                                </div>


                                <div class="mb-3">
                                    <label>Street</label>
                                    <input type="text" class="form-control" maxlength="50" name="street"
                                        id="street">
                                    @error('street')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>City</label>
                                    <input type="text" class="form-control" maxlength="50" name="city"
                                        id="city">
                                    @error('city')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>State</label>
                                    <input type="text" class="form-control" maxlength="50" name="state"
                                        id="state">
                                    @error('state')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>Country</label>
                                    <input type="text" class="form-control" maxlength="50" name="country"
                                        id="country">
                                    @error('country')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>Zip</label>
                                    <input type="text" class="form-control" maxlength="50" name="zip"
                                        id="zip">
                                    @error('zip')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
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
                                        <button class="btn btn-primary" type="submit"><i
                                                class="fa fa-arrow-right bold"></i> Add</button>
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


<script>
    function slugify(text) {
        return text.toString().toLowerCase()
            .replace(/\s+/g, '-')           // Replace spaces with -
            .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
            .replace(/\-\-+/g, '-')         // Replace multiple - with single -
            .replace(/^-+/, '')             // Trim - from start of text
            .replace(/-+$/, '');            // Trim - from end of text
    }

    $('#cat_name_defaultconfig').keyup(function () {
        var slug = $(this).val();
        $('#cat_slug_defaultconfig').val(slugify(slug));
    });
    function preview2() {
        frame2.src = URL.createObjectURL(event.target.files[0]);
    }
</script>

@endsection