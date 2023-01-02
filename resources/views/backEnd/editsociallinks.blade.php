@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updatesociallinks/'.$social_list->id)}}" method="post" id="updateForm">{!! csrf_field() !!}
  @method('PUT')
         <label>Social Media Links</label></br>
          <input type="text" name="title" id="title" class="form-control" value="{{$social_list->title}}"required></br>
          <required>
            <label>Social Media Link Url</label></br>
          <input type="text" name="link" id="link" class="form-control" value="{{$social_list->link}}"required></br>
     <div class="form-group">
                          <label for="exampleInputUsername1">Status</label>
                          <select class="form-control" name="status" id="status" value="{{$social_list->status}}">
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