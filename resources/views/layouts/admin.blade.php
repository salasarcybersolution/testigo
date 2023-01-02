<!DOCTYPE html>
<html lang="en">
<head>

 @include('backEnd.includes.head') 
</head>

<body>
    <!-- wrapper -->
    <div class="wrapper">
        <!--sidebar-wrapper-->
       @include('backEnd.includes.menu') 
        <!--end sidebar-wrapper-->
        <!--header-->
         @include('backEnd.includes.header') 
        <!--end header-->
        <!--page-wrapper-->
        <div class="page-wrapper">
            <!--page-content-wrapper-->
            <div class="page-content-wrapper">
                @yield('content')
            </div>
            <!--end page-content-wrapper-->
        </div>
        <!--end page-wrapper-->
        <!--start overlay-->
        <div class="overlay toggle-btn-mobile"></div>
        <!--end overlay-->
        <!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
        <!--End Back To Top Button-->
        <!--footer -->
         @include('backEnd.includes.footer') 
        <!-- end footer -->
    </div>
    <!--start switcher-->
    
    <!-- JavaScript -->
    <!-- Bootstrap JS -->
    <script src="{{asset('public/assets/js/bootstrap.bundle.min.js')}}"></script>
    
    <!--plugins-->
    <script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/simplebar/js/simplebar.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/metismenu/js/metisMenu.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js')}}"></script>
    <!-- Vector map JavaScript -->
    <script src="{{asset('public/assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js')}}"></script>
    <script src="{{asset('public/assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('public/assets/plugins/vectormap/jquery-jvectormap-in-mill.js')}}"></script>
    <script src="{{asset('public/assets/plugins/vectormap/jquery-jvectormap-us-aea-en.js')}}"></script>
    <script src="{{asset('public/assets/plugins/vectormap/jquery-jvectormap-uk-mill-en.js')}}"></script>
    <script src="{{asset('public/assets/plugins/vectormap/jquery-jvectormap-au-mill.js')}}"></script>
    <script src="{{asset('public/assets/plugins/apexcharts-bundle/js/apexcharts.min.js')}}"></script>
    <script src="{{asset('public/assets/js/index2.js')}}"></script>
    <!-- App JS -->
    <script src="{{asset('public/assets/js/app.js')}}"></script>
</body>


<!-- Mirrored from codervent.com/mons/syndash/demo/vertical/index2.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 31 Oct 2022 10:36:46 GMT -->
</html>