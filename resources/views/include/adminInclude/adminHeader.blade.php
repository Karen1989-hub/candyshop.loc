<!doctype html>
<html lang="en" dir="ltr">

<!-- Mirrored from laravel.spruko.com/adminor/Leftmenu-Icon-DarkSidebar-Dark/form-wizard by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 05 May 2020 09:11:09 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <!-- Meta data -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta content="Adminor-Bootstrap HTML Admin Template" name="description">
    <meta content="Spruko Technologies Private Limited" name="author">
    <meta name="keywords" content="admin dashboard,admin dashboard template,admin panel template,admin template,bootstrap 4 dashboard,bootstrap admin dashboard,bootstrap admin panel,bootstrap admin template,bootstrap dashboard,bootstrap dashboard template,dashboard design template,dashboard html,dashboard template,html admin template,html dashboard template">
    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/images/brand/favicon.ico')}}" type="image/x-icon"/>
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />

    <!-- Title -->
    <title>admin</title>
    <link rel="stylesheet" href="{{asset('assets/fonts/fonts/font-awesome.min.css')}}">

    <!-- Font family -->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- Sidemenu Css -->
    <link href="{{asset('assets/plugins/toggle-sidebar/sidemenu-dark.css')}}" rel="stylesheet" />

    <!-- Dashboard Css -->
    <link href="{{asset('assets/css/left-menu-dark.css')}}" rel="stylesheet" />

    <!-- c3.js Charts Plugin -->
    <link href="{{asset('assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet" />

    <!-- select2 Plugin -->
    <link href="{{asset('assets/plugins/select2/select2.min-dark.css')}}" rel="stylesheet" />
    <!-- forn-wizard css-->
{{--    <link href="../../../public/assets/plugins/forn-wizard/css/material-bootstrap-wizard-dark.css" rel="stylesheet" />--}}
{{--    <link href="../../../public/assets/plugins/forn-wizard/css/demo.css" rel="stylesheet" />--}}

<!-- Custom scroll bar css-->
    <link href="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

    <!---Font icons-->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />

    <!---Switcher css-->
    <link href="{{asset('assets/switcher/css/switcher.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/switcher/demo.css')}}" rel="stylesheet" />	</head>

<!-- file Uploads -->
<link href="{{asset('assets/plugins/fileuploads/css/dropify.min-dark.css')}}" rel="stylesheet" type="text/css" />



<body class="app sidebar-mini">

<div id="global-loader" ></div>
<div class="page" >
    <div class="page-main">
        <div class="app-header header py-1 d-flex">
            <div class="container-fluid">
                <div class="d-flex">

                    <a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
                    <div class="d-flex order-lg-2 ml-auto header-right-icons header-search-icon">

                        <div class="dropdown d-none d-md-flex" >
                            <a  class="nav-link icon full-screen-link nav-link-bg">
                                <i class="fa fa-expand"  id="fullscreen-button"></i>
                            </a>
                        </div>

                        <div class="dropdown d-none d-md-flex">
                            <a class="nav-link icon text-center" data-toggle="dropdown">
                                <i class="icon icon-speech"></i>
                                @if(true)
                                    <span class=" nav-unread badge badge-info badge-pill">2</span>
                                @endif
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <a href="#" class="dropdown-item text-center">2 New Messages</a>
                                <div class="dropdown-divider"></div>
                                <div class="dropdown-divider"></div>
                                <a href="" class="dropdown-item text-center">See all Messages</a>
                            </div>
                        </div>

                        <a class="dropdown-item" href="{{route('goOut')}}">
                            <i class="dropdown-icon mdi  mdi-logout-variant"></i> Դուրս գալ
                        </a>
                    </div>
                </div>
            </div>
        </div>			<!-- Sidebar menu-->
