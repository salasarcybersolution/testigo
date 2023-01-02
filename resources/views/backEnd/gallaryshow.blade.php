@extends('layouts.admin')
@section('content')

<div class="page-wrapper">
      <!--page-content-wrapper-->
        <div class="page-content">
<div class="content-wrapper">
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
<!--             <h1 class="m-0">{{$title}}</h1>
 -->          </div>


     <div class="row g-3">
          @if($gallary_list->count())
                @foreach($gallary_list as $image)
               
  <div class="col-12 col-lg-3">
    <a href="{{url('storage/app/public/images/'.$image->image)}}" data-toggle="lightbox" data-gallery="gallery" >
       <img class="img-responsive" height="200px" width="100%" alt="" src="{{url('storage/app/public/images/'.$image->image)}}" > </a>
             <!--   <div class="col-12 col-lg-3">
                        <img class="img-responsive" height="200px" width="200px" alt="" src="{{url('storage/app/public/images/'.$image->image)}}" />

                        </div>  --><!-- text-center / end -->
                    </div>
               
                @endforeach
            @endif


        </div> <!-- list-group / end -->
    </div> <!-- row / end -->
</div> <!-- container / end -->
</div>
</div></div></div>
@endsection
