@extends('frontend.layouts.master')

@section('title', 'User All Jobs')

@section('content')
<div class="dash_all">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('user.layouts.sidebar')
            </div>

            <div class="col-md-9">
                <div class="dash_res">
                    <p>
                        Hello <strong>{{Session::get('FRONT_USER_NAME')}}</strong>
                    </p>
                    <div id="detailsContainer">
                        <!-- Initially hide this div -->
                    </div>
                    <table id="datatable-buttons"
                        class="table table-striped table-bordered dt-responsive nowrap datatable-skills "
                        style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>Company</th>
                                <th>Position</th>
                                <th>Location</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($getJobsData as $data)

                            <tr id="row-{{ $data->id }}">
                                <td>{{ $data->company_name }}</td>
                                <td>{{ $data->title }}</td>
                                @php $modifiedLocation = str_replace('/', ', ', $data->location); @endphp
                                <td>{{ $modifiedLocation }}</td>
                                <td>
                                    <label class="form-label" data-on-label="Yes" data-off-label="No">Open</label>
                                </td>
                                <label class="form-label" for="switch4" data-on-label="Yes" data-off-label="No"></label>
                                <td>
                                    <a href="#" class="btn btn-info btn-sm view-details"
                                        data-details="{{ $data->company_name }}">View Details</a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        $('.view-details').on('click', function (e) {
            e.preventDefault();

            // Get the necessary details data
            var detailsData = {
                company_name: '{{ $data->company_name }}',
                location: '{{ $modifiedLocation }}',
                title: '{{ $data->title }}',
                description: '{{ $data->description }}'
            };

            // Create HTML content for details using the detailsData
            var detailsHtml = '<p>Company: ' + detailsData.company_name + '</p>';
            detailsHtml += '<p>Location: ' + detailsData.location + '</p>';
            detailsHtml += '<p>Title: ' + detailsData.title + '</p>';
            detailsHtml += '<p>Description: ' + detailsData.description + '</p>';
            // Add more details as needed

            // Replace the content of the detailsContainer with the detailsHtml
            $('#detailsContainer').html(detailsHtml);

            // Hide the table
            $('#datatable-buttons').hide();
        });
    });
</script>
@endsection