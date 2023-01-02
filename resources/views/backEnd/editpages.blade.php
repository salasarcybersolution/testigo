@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updatepages/'.$page_list->id)}}" method="post" id="updateForm">{!! csrf_field() !!}
  @method('PUT')
         <label>Page Title</label></br>
          <input type="text" name="page_title" id="page_title" class="form-control" value="{{$page_list->page_title}}"required></br>
          <required>
            <label>Page Description</label></br>
          <input type="text" name="page_description" id="page_description" class="form-control" value="{{$page_list->page_description}}"required></br>
          <required>
     <div class="form-group">
                          <label for="exampleInputUsername1">Status</label>
                          <select class="form-control" name="status" id="status" value="{{$page_list->status}}">
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                          </select>
                        </div>

      <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
         
<button type="submit" class="btn btn-primary">Submit</button>     </form>
   
  </div>
</div>
  </div></div></div>
    </section>
  </div>
   @endsection