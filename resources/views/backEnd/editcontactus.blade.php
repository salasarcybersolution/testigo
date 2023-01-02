@extends('layouts.admin')
@section('content')
<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">

 <form action="{{url('updatecontactus/'.$contact_list->id)}}" method="post" id="updateForm">{!! csrf_field() !!}
  @method('PUT')
         <label>Name</label></br>
          <input type="text" name="name" id="name" class="form-control" value="{{$contact_list->name}}"required></br>

            <label>Email</label></br>
          <input type="email" name="email" id="email" class="form-control" value="{{$contact_list->email}}"required></br>

            <label>Subject</label></br>

          <input type="text" name="subject" id="subject" class="form-control" value="{{$contact_list->subject}}"required></br>

            <label>Message</label></br>
          <input type="text" name="message" id="message" class="form-control" value="{{$contact_list->message}}"required></br>
          

      <input type="hidden" value="{{ csrf_token() }}" id="_token" name="_token"/>
         
<!--         <input type="submit"  class="btn btn-success"></br>
 --> <button type="submit" class="btn btn-primary">Submit</button>     
</form>
   
  </div>
</div>
  </div></div></div>
    </section>
  </div>
   @endsection