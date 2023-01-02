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
          <a href="{{ url('/createOperator') }}" class="btn btn-primary float-end" title="Add New Operator">
            <i class="fa fa-plus" aria-hidden="true"></i> Add New Operator </a>
          <br />
          <br />
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                 <th>Status</th>
                 <th>Action</th>
                </tr>
              </thead>
              <tbody> @foreach($operator_list as $item) 
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $item->name }}</td>
                  <td>{{ $item->email }}</td>
                  <td>{{ $item->mobile }}</td>
                  <td>@if($item->status =='1')
                              <p type="" class=" ">Active</p>
                              @else
                              <p type="" class=" ">Inactive</p>
                              @endif
                            </td>
                  <td>
                    <a href="{{url('editOperator/'.$item->id)}}" class="mb-2"><i class="fadeIn animated bx bx-edit-alt"></i></a>
                    <a href="{{url('deleteOperatorList/'.$item->id)}}"><i class="fadeIn animated bx bx-trash-alt"></i></a>
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