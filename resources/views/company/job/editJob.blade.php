@extends('company.layouts.master')

@section('title', 'Edit Job Details')

@section('content')

<div class="main-content">

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">Edit Job</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Skillz Matics</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Job</a></li>
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
                                <strong>Update</strong> successfull.
                            </div>
                            @endif
                            <form method="POST" action="{{ route('skills.updateJob', ['id' => $Datajob->id]) }}" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label>Department Name</label>
                                    <select class="form-control select2" name="department" id="department">
                                        <option value="">Select</option>
                                        @foreach($department as $data)
                                        <option value="{{$data->id}} " @if ($Datajob->department == $data->id) selected @endif>{{$data->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Requirement</label>
                                    <select class="form-control select2" name="requirements" id="requirements">
                                        <option value="">Select</option>
                                        @foreach($requirement as $rdata)
                                        <option value="{{$rdata->iid}}" @if ($Datajob->requirements == $rdata->iid) selected @endif>{{$rdata->unit_name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label>Title</label>
                                    <input type="text" class="form-control" maxlength="50" name="title" id="title" value="{{$Datajob->title}}">
                                    @error('title')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>Description</label>
                                    <textarea id="elm1" class="form-control" name="description" maxlength="225" rows="3"
                                        placeholder="This textarea has a limit of 225 chars.">{{$Datajob->description}}</textarea>
                                </div>


                                @php  $locationSegments = explode('/', $Datajob->location); @endphp
                                <div class="mb-3">
                                    <label>Street</label>
                                    <input type="text" class="form-control" maxlength="50" name="street" id="street" value="{{ $locationSegments[0] }}">
                                    @error('street')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>City</label>
                                    <input type="text" class="form-control" maxlength="50" name="city" id="city" value="{{ $locationSegments[1] }}">
                                    @error('city')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>State</label>
                                    <input type="text" class="form-control" maxlength="50" name="state" id="state" value="{{ $locationSegments[2] }}">
                                    @error('state')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>Country</label>
                                    <input type="text" class="form-control" maxlength="50" name="country" id="country" value="{{ $locationSegments[3] }}">
                                    @error('country')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <label>Zip</label>
                                    <input type="text" class="form-control" maxlength="50" name="zip" id="zip" value="{{ $locationSegments[4] }}">
                                    @error('zip')<span class="text-danger" role="alert">{{ $message
                                        }}</span>@enderror
                                </div>

                                <div class="mb-3">
                                    <div class="float-end d-none d-md-block">
                                        <button class="btn btn-primary" type="submit"><i
                                                class="fa fa-arrow-right bold"></i> Update</button>
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

@endsection