@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updateCenterList/'.$user_list->id)}}" method="post" id="updateForm">{!! csrf_field() !!}
  @method('PUT')
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{$user_list->name}}" required ></br>
        <required>
       <label>Email</label></br> 
       <input type= "email" name="email" id="email" class="form-control" value="{{$user_list->email}}" required></br>
        <required>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control" value="{{$user_list->mobile}}" required></br>
        <div>
          <label for="country">States</label>
                  <select name="state"  class="form-control" id="state" onchange="selectCity(this);">
                      <option value="">Select States</option> 
                    @foreach ($states as $state) 
                      <option value="{{$state->id}}" <?php if($user_list->state == $state->id){ echo 'selected'; }?>>{{$state->name}}</option> 
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
              <label for="city">City</label>
         <select name="city" class="form-control" id="city">
                 @foreach ($cities as $citys) 
                      <option value="{{$citys->id}}" <?php  if($citys->id == $user_list->city){ echo 'Selected'; }?>>{{$citys->city}}</option> 
                    @endforeach
               </select>
             </div>


      <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
         
<button type="submit" class="btn btn-primary">Submit</button>    </form>
   
  </div>
</div>
  </div></div></div>
    </section>
  </div>
 @endsection

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