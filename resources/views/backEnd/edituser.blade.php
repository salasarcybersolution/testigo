@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updateuserList/'.$user_listing->id)}}" method="post" id="updateForm">{!! csrf_field() !!}
  @method('PUT')
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{$user_listing->name}}" required ></br>
        <required>
       <label>Email</label></br> 
       <input type= "email" name="email" id="email" class="form-control" value="{{$user_listing->email}}" required></br>
        <required>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control" value="{{$user_listing->mobile}}" required></br>
          <label for="country">States</label>
          <div>
                  <select name="state"  class="form-control" id="state" onchange="selectCity(this);">
                      <option value="">Select States</option> 
                    @foreach ($states as $state) 
                      <option value="{{$state->id}}" <?php if($user_listing->state == $state->id){ echo 'selected'; }?>>{{$state->name}}</option> 
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
              <label for="city">City</label>
         <select name="city" class="form-control" id="city">
                 @foreach ($cities as $citys) 
                      <option value="{{$citys->id}}" <?php  if($citys->id == $user_listing->city){ echo 'Selected'; }?>>{{$citys->city}}</option> 
                    @endforeach
               </select>


      <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
         
<button type="submit" class="btn btn-primary">Submit</button>     </form>
   
  </div>
</div>
  </div></div></div>
    </section>
  </div>
   @endsection