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
            <h1 class="m-0">{{$title}}</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                    
            </ol>
          </div>
        </div>
      </div>
    </div>
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
            
              <div class="card-body">
                     @if (Session::has('error'))
                 <div class="alert alert-danger">{{ Session::get('error') }}</div>
              @endif


              @if (Session::has('success'))
                 <div class="alert alert-success">{{ Session::get('success') }}</div>
              @endif

@if (Session::has('update'))
                 <div class="alert alert-primary">{{ Session::get('update') }}</div>
              @endif

          <a href="{{ url('/createsliderList') }}" class="btn btn-primary btn-sm float-end" title=" Add Sliders" enctype="multipart/form-data">
            <i class="fa fa-plus" aria-hidden="true"></i> Add Sliders </a>
          <br />
          <br />
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Slider Title</th>
                  <th>Status</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody> @foreach($slider_list as $item) 
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->title }}</td>
                     <td>@if($item->status =='1')
                              <button type="button" class="btn btn-inverse-success btn-sm">Active</button>
                              @else
                              <button type="button" class="btn btn-inverse-warning btn-sm">Inactive</button>
                              @endif
                            </td>
                 <td><img src="{{url('storage/app/public/images/'.$item->image)}}"  class="img-thumbnail " width="78px" height="78px"></td>
                  <td>
                    <a href="{{url('editslider/'.$item->id)}}" class="mb-2"><i class="fadeIn animated bx bx-edit-alt"></i></a>
                    <a href="{{url('deletesliderlist/'.$item->id)}}"><i class="fadeIn animated bx bx-trash-alt"></i></a>
                  </td>
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      
                    </form>
                  </td>
                </tr> @endforeach 
              </tbody>
            </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
   </div></div></div>

  </div>
 @endsection
