@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updateXraytypes/'.$xray_type->id)}}" method="post" id="updateForm">{!! csrf_field() !!}
  @method('PUT')
         <label>Xray Types</label></br>
          <input type="text" name="type_name" id="type_name" class="form-control" value="{{$xray_type->type_name}}"required></br>
          <required>
     <div class="form-group">
                          <label for="exampleInputUsername1">Status</label>
                          <select class="form-control" name="status" id="status" value="{{$xray_type->status}}">
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