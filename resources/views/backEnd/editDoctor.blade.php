@extends('layouts.admin')
@section('content')

<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updateDoctorList/'.$doctor_list->id)}}" method="post" id="updateDoctorForm">{!! csrf_field() !!}
  @method('PUT')
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{$doctor_list->name}}" required ></br>
        <required>
       <label>Email</label></br> 
       <input type= "email" name="email" id="email" class="form-control" value="{{$doctor_list->email}}" required></br>
        <required>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control" value="{{$doctor_list->mobile}}" required></br>
        <label>Password</label></br>
       <input type="text" name="password" id="password" class="form-control" value="{{$doctor_list->password}}" required></br>

      <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
         
<button type="submit" class="btn btn-primary">Submit</button>     </form>
   
  </div>
</div>
  </div></div></div>
  </div>
  @endsection