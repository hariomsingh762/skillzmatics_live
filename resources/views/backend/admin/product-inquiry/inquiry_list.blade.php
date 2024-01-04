@extends('admin.layouts.master')

@section('title', 'Inquiry Module')

@section('content')

<style>
    span .circle_Accept{color:green;}
    </style>
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <!--<h3><a href="" class="btn btn-success">Back</a></h3>-->
              </div>

              
            </div>

            <div class="clearfix"></div>
            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Inquiry Listing</h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                     
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">

                    
                      <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                         <thead>
                            <tr>
                               <th>Name</th>
                               <th>Phone</th>
                               <th>Email</th>
                               <th>Message</th>
                               <th>Status</th>
                               <th>Reply</th>
                            </tr>
                         </thead>
                         <tbody>
                            @foreach($inquiry_data as $inquiry)
                            <tr>
                               <td>{{$inquiry->first_name}}</td>
                               <td>{{$inquiry->phone}}</td>
                               <td>{{$inquiry->email}}</td>
                               <td>
                                  <button class="btn btn-info mark-as-read"
                                     data-toggle="modal"
                                     data-target="#messageModal{{$inquiry->id}}"
                                     data-message="{{$inquiry->message}}"
                                     data-inquiry-id="{{$inquiry->id}}">
                                  Read
                                  </button>
                               </td>
                               @if($inquiry->markasread==1)
                               <td class="badge badge-success" style="border-radius:50%;"><i class="fa fa-check"></i></td>
                               @else
                               <td class="badge badge-warning" style="border-radius:50%;"><i class="fa fa-check"></i></td>
                               @endif
                               <td>
                                  <button class="btn btn-success open-reply-modal"
                                    data-toggle="modal"
                                    data-target="#replyModal{{$inquiry->id}}"
                                    data-email="{{$inquiry->email}}">
                                    Click
                                </button>
                               </td>
                            </tr>
                            <div class="modal fade" id="messageModal{{$inquiry->id}}">
                               <div class="modal-dialog">
                                  <div class="modal-content">
                                     <div class="modal-header">
                                        <h4 class="modal-title">Message</h4>
                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                     </div>
                                     <div class="modal-body">
                                        <p>Name: {{$inquiry->first_name}} {{$inquiry->last_name}}</p>
                                        <p>Email: {{$inquiry->email}}</p>
                                        <p>Company Name: {{$inquiry->company_name}}</p>
                                        <p>Phone: {{$inquiry->phone}}</p>
                                        <p>City: {{$inquiry->city}}</p>
                                        <p>State: {{$inquiry->state}}</p>
                                        <p>Hear From: {{$inquiry->hear_about_us}}</p>
                                        <hr>
                                        <p id="message"></p>
                                     </div>
                                     <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                     </div>
                                  </div>
                               </div>
                            </div>
                            <div class="modal fade" id="replyModal{{$inquiry->id}}">
                               <div class="modal-dialog">
                                  <div class="modal-content">
                                     <div class="modal-header">
                                        <h4 class="modal-title">Send Mail</h4>
                                        <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->
                                     </div>
                                     <form method="POST" action="{{ route('admin.send_mail') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal-body">
                                           <div class="form-group">
                                              <label for="to">To:</label>
                                              <input class="form-control" type="text" name="to" id="to" value="{{ $inquiry->email }}" readonly>
                                           </div>
                                           <div class="form-group">
                                              <label for="subject">Subject:</label>
                                              <input class="form-control" type="text" name="subject" id="subject" required>
                                           </div>
                                           <div class="form-group">
                                              <label for="message">Message:</label>
                                              <textarea class="form-control" name="message" id="message" rows="5" required></textarea>
                                           </div>
                                        </div>
                                        <div class="modal-footer">
                                           <button type="submit" class="btn btn-success">Send</button>
                                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </div>
                                     </form>
                                  </div>
                               </div>
                            </div>
                            @endforeach
                         </tbody>
                      </table>
                  		
                    </div>
                  		</div>
              		</div>
            	</div>
                </div>
              </div>
          </div>
      </div>

  </div>

  @if(Session::get('pass'))
  <script type="text/javascript">
    toastr.success(' {{session('pass')}}');
  </script>
 @endif

 @if(Session::get('message'))
  <script type="text/javascript">
    toastr.success(' {{session('message')}}');
  </script>
 @endif
 <script>
    $('#messageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var message = button.data('message');
        var modal = $(this);
        modal.find('#message').text(message);
    });
</script>

<script>
    $('#replyModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        //var message = button.data('message');
        var modal = $(this);
        modal.find('#reply');
    });
</script>
<script>
    $(document).ready(function() {
        $('.open-reply-modal').click(function() {
            var email = $(this).data('email');
            var modalId = $(this).data('target');
            $(modalId).find('#to').val(email);
        });
    });
</script>


<script>
    $(document).ready(function() {
        $('.mark-as-read').click(function() {
            var button = $(this);
            var inquiryId = button.data('inquiry-id');
            console.log(inquiryId);
            $.ajax({
                url: '{{route("admin.markasread")}}',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    inquiry_id: inquiryId
                },
                success: function(response) {
                    console.log(response);
                    button.closest('tr').find('.badge').removeClass('badge-warning').addClass('badge-success');
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });
</script>

@endsection






