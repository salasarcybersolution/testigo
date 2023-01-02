  @extends('layouts.admin')
  @section('content')
  <div class="page-wrapper">
        <!--page-content-wrapper-->
          <div class="page-content">
  <div class="card">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="card-header">Create Links</div>
    <div class="card-body">
         @if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
   <form action="{{url('/savelink')}}" method="post" id="saveOperatorForm">{!! csrf_field() !!}
          <label>Social Media Title</label></br>
          <input type="text" name="title" id="title" class="form-control"  required></br>
          <required>
         <label>Social Media Links</label></br> 
         <input type="text" name="link" id="link" class="form-control"  required></br>
          <required>
     <div class="form-group">
                          <label for="exampleInputUsername1">Status</label>
                          <select class="form-control" name="status" id="status">
                            <option value="1"> Active</option>
                            <option value="0"> Inactive</option>
                          </select>
                        </div>
            <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
          </br>
           
<button type="submit" class="btn btn-primary">Submit</button>             
            </div></form>
          </div>
        </div>
      </div>
  </div>
 @endsection