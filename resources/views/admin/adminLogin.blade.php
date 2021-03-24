<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from laravel.spruko.com/adminor/Leftmenu-Icon-DarkSidebar-Dark/login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 May 2020 09:06:33 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Adminor-Bootstrap HTML Admin Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords"
          content="admin dashboard,admin dashboard template,admin panel template,admin template,bootstrap 4 dashboard,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap dashboard,bootstrap dashboard template,dashboard design template,dashboard html,dashboard template,html admin template,html dashboard template">
    <!-- Favicon -->
    <link rel="icon" href="/images/stone4.webp">

    <!-- Title -->
    <title>NewsFeed</title>

    <!-- Font family -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Sidemenu Css -->
    <link href="{{asset('assets/plugins/toggle-sidebar/sidemenu-dark.css')}}" rel="stylesheet"/>

    <!-- Dashboard Css -->
    <link href="{{asset('assets/css/left-menu-dark.css')}}" rel="stylesheet"/>

    <!-- c3.js Charts Plugin -->
    <link href="{{asset('assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet"/>


    <!-- Custom scroll bar css-->
    <link href="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet"/>

    <!---Font icons-->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>


    <!---Switcher css-->


<body class="login-img">
<div id="global-loader"></div>
<div class="page h-100">
    <div class="page-single">
        <div class="container">
            <div class="row authentication">
                <div class="col-lg-5 col-xl-4 col-md-6 d-block col-login mx-auto">

                    <form action="{{route('checkAdminLogin')}}" class="card" method="post">
                        @csrf
                        <div class="card-body p-6 ">
                            <div class="card-title text-center">Вход в систему управления</div>
                            <div class="input-icon form-group wrap-input">
											<span class="input-icon-addon search-icon">
												<i class="mdi mdi-account"></i>
											</span>
                                <input type="text" name="login" class="form-control" placeholder="@if($errors->has('login')){{$errors->first('login')}} @else {{'Логин'}}  @endif"
                                       value="{{ old('login') }}">

                            </div>
                            <div class="input-icon form-group wrap-input">
											<span class="input-icon-addon search-icon">
												<i class="zmdi zmdi-lock"></i>
											</span>
                                <input type="password" name="password" class="form-control mb-0"
                                       id="exampleInputPassword1" placeholder="@if($errors->has('password')){{$errors->first('password')}} @else {{'Пароль'}}  @endif" value="{{ old('password') }}">

                            </div>
                            @if(isset($adminloginError) && $adminloginError!='')
                                <span class="custom-control-label text-danger">
                                {{$adminloginError}}
                            </span>
                            @endif

                            <div class="form-footer">
                                <button type="submit" class="btn btn-primary btn-block">Մուտք</button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Back to top -->
<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>

<!-- Dashboard Core -->
<script src="{{asset('assets/js/vendors/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/jquery.sparkline.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/selectize.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/jquery.tablesorter.min.js')}}"></script>
<script src="{{asset('assets/js/vendors/circle-progress.min.js')}}"></script>
<script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

<!-- Fullside-menu Js-->
<script src="{{asset('assets/plugins/toggle-sidebar/sidemenu.js')}}"></script>


<!-- Custom scroll bar Js-->
<script src="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

<!-- Switcher Js-->
<script src="{{asset('assets/switcher/js/switcher.js')}}"></script>

<!-- Custom Js-->
<script src="{{asset('assets/js/custom-dark.js')}}"></script>
</body>

<!-- Mirrored from laravel.spruko.com/adminor/Leftmenu-Icon-DarkSidebar-Dark/login by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 May 2020 09:06:33 GMT -->
</html>
