<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Admin Login</title>
    <!-- Scripts -->
    <link rel="icon" href="{{asset('public/assets/images/favicon2.png')}}" type="image/png" />
    <!-- loader-->
   <!--  <link href="{{asset('public/assets/css/pace.min.css')}}" rel="stylesheet" />
    <script src="{{asset('public/assets/js/pace.min.js')}}"></script> -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600&amp;family=Roboto&amp;display=swap" />
    <!-- Icons CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/icons.css')}}" />
    <!-- App CSS -->
    <link rel="stylesheet" href="{{asset('public/assets/css/app.css')}}" />
    
</head>


</head>
<body class="bg-login">
    <!-- wrapper -->
    <div class="wrapper">
        <div class="section-authentication-login d-flex align-items-center justify-content-center mt-4">
            <div class="row">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="card radius-15 overflow-hidden">
                        <div class="row g-0">
                            <div class="col-xl-6">
                                <div class="card-body p-5">
                                    <div class="text-center">
                                        <img src="{{asset('public/assets/images/Testigo Logo Final Copy 3 (1).png')}}" width="80" alt="">
                                        <h3 class="mt-4 font-weight-bold">Welcome To Testigo</h3>
                                    </div>
                                    <div class="">
                                                                                
                                        <div class="form-body">
                                            <form class="row g-3" action="{{url('checkDetails')}}">
                                                <div class="col-12">

                                                     @if(Session::has('msg'))
                                                        <div class="error-wrap">
                                                            <p class="error" >{{ Session::get('msg') }}</p>
                                                        </div>
                                                    @endif

                                                    <label for="inputEmailAddress" class="form-label">Email Address</label>
                                                    <input type="email" name="email" class="form-control" id="inputEmailAddress" placeholder="Email Address">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                    <div class="input-group" id="show_hide_password">
                                                        <input type="password" class="form-control border-end-0" id="inputChoosePassword" value="123456" placeholder="Enter Password" name="password"> <a href="javascript:;" class="input-group-text bg-transparent"><i class="bx bx-hide"></i></a>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-md-6">
                                                    <div class="form-check form-switch">
                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked="">
                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 text-end"> <a href="authentication-forgot-password.html">Forgot Password ?</a>
                                                </div> -->
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-12 text-center">
                                                    <p>Don't have an account yet? <a href="authentication-register.html">Sign up here</a></p>
                                                </div> -->
                                            </form>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                </div>
                             </div>
                            <div class="col-xl-6 d-flex align-items-center justify-content-center">
                                <img src="{{asset('public/assets/images/Group-370(1).png')}}" class="img-fluid" alt="...">
                            </div>
                        </div>
                        <!--end row-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end wrapper -->
</body>


<script src="{{asset('public/assets/js/jquery.min.js')}}"></script>
<!--Password show & hide js -->
<script>
    $(document).ready(function () {
        $("#show_hide_password a").on('click', function (event) {
            event.preventDefault();
            if ($('#show_hide_password input').attr("type") == "text") {
                $('#show_hide_password input').attr('type', 'password');
                $('#show_hide_password i').addClass("bx-hide");
                $('#show_hide_password i').removeClass("bx-show");
            } else if ($('#show_hide_password input').attr("type") == "password") {
                $('#show_hide_password input').attr('type', 'text');
                $('#show_hide_password i').removeClass("bx-hide");
                $('#show_hide_password i').addClass("bx-show");
            }
        });
    });
</script>


</html>
