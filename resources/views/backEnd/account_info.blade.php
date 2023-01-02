@extends('layouts.admin')
@section('content')
<div class="page-content">
   <!--breadcrumb-->
   <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">Admin Profile</div>
      <div class="ps-3">
         <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
               <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">Admin Profile</li>
            </ol>
         </nav>
      </div>
   </div>
   <!--end breadcrumb-->
   <div class="user-profile-page">
      <div class="card radius-15">
         <div class="card-body">
            <div class="row">
               <div class="col-12 col-lg-7 border-right">
                  <div class="d-md-flex align-items-center">
                     <div class="mb-md-0 mb-3">
                        <img src="{{asset('public/assets/images/avatars/avatar-659651_1920.png')}}" 

                        
                        class="rounded-circle shadow" width="130" height="130" alt="" />
                     </div>
                     <div class="ms-md-4 flex-grow-1">
                        <div class="d-flex align-items-center mb-1">
                           <h4 class="mb-0">Admin</h4>
                           
                        </div>
                        <p class="mb-0 text-muted">Administrator</p>
                        
                     </div>
                  </div>
               </div>
              
            </div>
            <!--end row-->
            <ul class="nav nav-pills">
               <li class="nav-item"> <a class="" href="{{url('/change-password')}}"> Change Password</a>

               </li>
              
               <li class="nav-item"> <a class="" href="{{url('/edit-account-info')}}">Edit Profile</a>

               </li>
            </ul>
            
         </div>
      </div>
   </div>
</div>
@endsection