  @extends('layouts.admin')
  @section('content')
  <div class="page-wrapper">
        <!--page-content-wrapper-->
          <div class="page-content">
  <div class="card">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="card-header">Create Contact Us Page</div>
    <div class="card-body">
@if (Session::has('message'))
   <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif
   <form action="{{url('/savecontactuslist')}}" method="post" id="savecontactusForm">{!! csrf_field() !!}
          <label>Name</label></br>
          <input type="text" name="name" id="name" class="form-control"  required></br>
          <label>Email</label></br>
          <input type="email" name="email" id="email" class="form-control"  required></br>
            <label>Subject</label></br>
          <input type="text" name="subject" id="subject" class="form-control"  required></br>
            <label>Message</label></br>
          <input type="text" name="message" id="message" class="form-control"  required></br>

            <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
          </br>
           
<button type="submit" class="btn btn-primary">Submit</button>             
            </div></form>
          </div>
        </div>
      </div>
  </div>
 @endsection