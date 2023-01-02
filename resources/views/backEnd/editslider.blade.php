@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updateslider/'.$slider_list->id)}}" method="post" id="updatesliderForm" enctype="multipart/form-data">{!! csrf_field() !!}
  @method('PUT')
         <label>Page Title</label></br>
          <input type="text" name="title" id="title" class="form-control" value="{{$slider_list->title}}"required></br>
          <required>
            <div class="form-group">
       @if ("storage/app/public/images/{{ $slider_list->images }}")
        <img src="{{url('storage/app/public/images/'.$slider_list->image)}}"  class="img-thumbnail " width="78px" height="78px">
    @else
            <p>No image found</p>
    @endif
        image <input type="file" name="image" value="{{ $slider_list->images }}"/>
<!--       <input type="hidden" value="{{ $slider_list->oldimages}}" id="image" name="image"/>
 -->    </div>
     <div class="form-group">
                          <label for="exampleInputUsername1">Status</label>
                          <select class="form-control" name="status" id="status" value="{{$slider_list->status}}">
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