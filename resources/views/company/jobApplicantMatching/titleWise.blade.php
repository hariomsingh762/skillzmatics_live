@extends('company.layouts.master')

@section('title', 'Title Wise Job Listing')

@section('content')

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- start page title -->
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h6 class="page-title">All Title Wise Job Listing</h6>
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="#">Skillz Matics</a></li>
                            <li class="breadcrumb-item"><a href="#">Title Wise </a></li>
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

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable-buttons"
                                class="table table-striped table-bordered dt-responsive nowrap datatable-skills"
                                style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Applied For</th>
                                        <th>Name</th>
                                        <th>Contact Number</th>
                                        <th>Email</th>
                                        <th>Reference ID</th>
                                        <th>Applied Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($matchedUsers as $index => $data)
                                    <tr id="row-{{ $data->id }}">
                                        <td>{{ $data->title }}</td>
                                        <td>{{ $data->name }}</td>
                                        <td>{{ $data->mobile }}</td>
                                        <td>{{ $data->email }}</td>
                                        <td>{{ $data->reference_id }}</td>
                                        <td>{{ $data->mobile }}</td>
                                        <td>
                                            <a href="{{ url('/company/contact-applicant/') }}/{{ $data->id }}/{{ $data->title }}"
                                                class="btn btn-primary btn-sm">Ping</a>
                                            <a href="{{ route('company.viewApplicantReview', ['applicantID' => $data->id]) }}"
                                                class="btn btn-info btn-sm" data-bs-toggle="1modal"
                                                data-bs-target="#fullscreenModal{{ $data->id }}"
                                                onclick="updateModalContent('{{ $data->id }}', '{{ $data->name }}', '{{ $data->mobile }}', '{{ $data->email }}')">View
                                                Detail</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    ©
                    <script>document.write(new DatYear())</script> Dpt<span class="d-none d-sm-inline-block">
                        - Crafted with <i class="mdi mdi-heart text-danger"></i> by .....</span>
                </div>
            </div>
        </div>
    </footer>
</div>
<!-- end main content-->
<div id="fullscreenModal{{ $data->id }}" class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel{{ $data->id }}" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel{{ $data->id }}"></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Add your modal content here -->
                @php
                $abc = json_decode($data->checklist_response, true);
                $holdValue = $abc;
                @endphp

                @if (!is_null($holdValue))
                @foreach ($holdValue as $index_1 => $data_1)
                @if ($data_1['question_set'] != NULL)
                <div class="table-responsive">
                    <table class="table mb-0">
                        <thead>
                            <!-- Add your table header content here -->
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
                                <td>
                                    @for ($i = 1; $i <= 5; $i++) @if ($i <=$question['stars']) <span
                                        style="font-size: 20px;color: #9e670e;">&#9733;</span>
                                        @else
                                        <span style="font-size: 20px; color: grey;">&#9733;</span>
                                        @endif
                                        @endfor
                                </td>
                            </tr>
                            @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
                @endif
                <!-- end row -->
                @endforeach
                @endif
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>
    function updateModalContent(id, name, mobile, email) {
        // Update modal content based on the data from the clicked row
        document.getElementById('myModalLabel' + id).innerText = name;
    }
</script>
@endsection