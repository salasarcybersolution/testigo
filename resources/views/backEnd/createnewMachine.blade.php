  @extends('layouts.admin')
  @section('content')
  <div class="page-wrapper">
        <!--page-content-wrapper-->
          <div class="page-content">
  <div class="card">
    <div class="card-header">Create New Machine</div>
    <div class="card-body">
         @if(Session::has('message'))
<p class="alert alert-info">{{ Session::get('message') }}</p>
@endif
   <form action="{{url('/saveXrayname')}}" method="post" id="saveXraymachineForm">{!! csrf_field() !!}
          <label>Machine Name</label></br>
          <input type="text" name="machine_name" id="machine_name" class="form-control"  required></br>
          <required>

            <label>Model</label></br>
          <input type="text" name="model" id="model" class="form-control"  required></br>
          <required>

            <label>Description</label></br>
          <input type="text" name="description" id="description" class="form-control"  required></br>
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
           
          <input type="submit"  class="btn btn-success"></br>
            
            </div></form>
          </div>
        </div>
      </div>
  </div>
  
 @endsection