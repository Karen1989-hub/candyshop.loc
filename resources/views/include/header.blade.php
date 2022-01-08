<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas r-->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Atag Mak</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="" type="image/x-icon"><!-- Favicon -->
    <link rel="apple-touch-icon" href="">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <!-- Site CSS -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/shopPagination.css')}}">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="{{asset('css/responsive.css')}}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<!-- Start Main Top -->
<div class="main-top">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5 col-md-4 col-sm-12 col-xs-12">

                <div class="right-phone-box">
                    <p>Позванить нам : <a href="#"> +11 900 800 100</a></p>
                </div>
                <div class="our-link">
                    <ul>
                        <li><a href="#"><i class="fa fa-user s_color"></i>
                                @if($autorizedUser != null)
                                    {{$autorizedUser->firstName}} {{$autorizedUser->lastName }}
                                    @if($autorizedUser->userType == 'retail')
                                        <span style="font-size: 0.8em;"> ( розничная торговля )</span>
                                    @else
                                        <span style="font-size: 0.8em;"> ( оптовик )</span>
                                        @endif
                                @endif
                            </a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                <div class="text-slid-box">
                    <div id="offer-box" class="carouselTicker">
                        <ul class="offer-box">
                            @foreach($discount as $val)
                                <li>
                                    <i class="fab fa-opencart"></i> {{$val->text}}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="right-phone-box">
                    @if($autorizedUser == null)
                    <p><a href="{{route('wholesalerRegistration')}}">Вход для оптовиков</a><span class="opasit">._._.</span><a
                            href="{{route('userRegistrationPage')}}">Pозничная торговля</a><span
                            class="opasit">._._.</span><a href="#"></a></p>
                    @endif
                </div>
                <div class="right-phone-box" style="float: right">
                    <p><a href="/user/signUp">выход</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Main Top -->
