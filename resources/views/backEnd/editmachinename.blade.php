@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">
 <form action="{{url('updateMachinenames/'.$machine_name->id)}}" method="post" id="updateForm">{!! csrf_field() !!}
  @method('PUT')
         <label>Machine Name</label></br>
          <input type="text" name="machine_name" id="machine_name" class="form-control" value="{{$machine_name->machine_name}}"required></br>
          <required>
            <label>Model</label></br>
          <input type="text" name="model" id="model" class="form-control" value="{{$machine_name->model}}"required></br>
          <required>
            <label>Description</label></br>
          <input type="text" name="description" id="description" class="form-control" value="{{$machine_name->description}}"required></br>
          <required>
     <div class="form-group">
                          <label for="exampleInputUsername1">Status</label>
                          <select class="form-control" name="status" id="status" value="{{$machine_name->status}}">
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                          </select>
                        </div>

      <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
         
        <input type="submit"  class="btn btn-success"></br>
    </form>
   
  </div>
</div>
  </div></div></div>
    </section>
  </div>
   @endsection