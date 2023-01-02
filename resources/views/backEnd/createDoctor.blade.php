  @extends('layouts.admin')
  @section('content')
  <div class="page-wrapper">
        <!--page-content-wrapper-->
          <div class="page-content">
  <div class="card">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="card-header">Add New Doctor</div>
    <div class="card-body">
         @if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
   <form action="{{url('/saveDoctor')}}" method="post" id="saveDoctorForm">{!! csrf_field() !!}
          <label>Name</label></br>
          <input type="text" name="name" id="name" class="form-control"  required></br>
          <required>
         <label>Email</label></br> 
         <input type="email" name="email" id="email" class="form-control"  required></br>
          <required>
          <label>Mobile</label></br>
          <input type="hidden" value="5" name="user_type_id">
          <input type="text" name="mobile" id="mobile" class="form-control"  required></br>
                  <label>Password</label></br>
        <input type="text" name="password" id="password" class="form-control"  required></br>
     
            <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
          </br>
           
<button type="submit" class="btn btn-primary">Submit</button>             
            </div></form>
          </div>
        </div>
      </div>
  </div>
@endsection

 
