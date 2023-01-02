@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updateOperatorList/'.$operator_list->id)}}" method="post" id="updateForm">{!! csrf_field() !!}
  @method('PUT')
        <label>Name</label></br>
        <input type="text" name="name" id="name" class="form-control" value="{{$operator_list->name}}" required ></br>
        <required>
       <label>Email</label></br> 
       <input type= "email" name="email" id="email" class="form-control" value="{{$operator_list->email}}" required></br>
        <required>
        <label>Mobile</label></br>
        <input type="text" name="mobile" id="mobile" class="form-control" value="{{$operator_list->mobile}}" required></br>

       <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
         
<button type="submit" class="btn btn-primary">Submit</button>   
    </form>
   
  </div>
</div>
  </div></div></div>
    </section>
  </div>
   @endsection