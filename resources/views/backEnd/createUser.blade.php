@extends('layouts.admin')
@section('content')

<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">
<div class="card">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <div class="card-header">Create Center Page</div>
  <div class="card-body">
      
 <form action="{{url('/saveUser')}}" method="post" id="registrationForm">{!! csrf_field() !!}
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control"  required></br>
        <required>
       <label>Email</label></br> 
       <input type="email" name="email" id="email" class="form-control"  required></br>
        <required>
        <label>Mobile</label></br>
          <input type="hidden" value="2" name="user_type_id">

        <input type="text" name="mobile" id="mobile" class="form-control"  required></br>
                <label>Password</label></br>
<input type="text" name="password" id="password" class="form-control"  required></br>
    <div class="form-group">
                  <label for="country">States</label>
                  <select name="state"  class="form-control" id="state" onchange="selectCity(this);">
                      <option value="">Select States</option> 
                    @foreach ($states as $state) 
                      <option value="{{$state->id}}">{{$state->name}}</option> 
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
              <label for="city">City</label>
               <select name="city" class="form-control" id="city">
                </select>
       </div>
         <div>
          <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
        </br>
         
<button type="submit" class="btn btn-primary">Submit</button>           
          </div></form>
        </div>
      </div>
    </div>
</div>
<script>   
function selectCity(set){
  var state_id = set.value;
  var urls  = "{{url('get-cities-by-state')}}";
  var token = '{{csrf_token()}}';
  $.ajax({
      type: "POST",
      url: urls,
      data: {
        state_id: state_id,
        _token: token 
      },
    dataType : 'html',
    success: function(result){
       var obj = jQuery.parseJSON(result);
       $("#city").html(obj.cities_list);
    }   
     
    });
}
</script>
 @endsection