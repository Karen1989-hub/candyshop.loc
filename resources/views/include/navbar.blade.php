<header class="main-header">
    <!-- Start Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
        <div class="container">
            <!-- Start Header Navigation -->
            <div class="navbar-header" style="width: 40%;">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu"
                        aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="index.html"><img width="25%" style="margin: 0;"
                                                               src="images2/SusUntitled.png" class="logo" alt=""></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="nav-item @if($frontPageName=='home') active @endif"><a class="nav-link"
                                                                                      href="{{route('home')}}">Главная</a>
                    </li>
                    <li class="nav-item @if($frontPageName=='shop') active @endif"><a class="nav-link"
                                                                                      href="{{route('shop')}}">Магазин</a>
                    </li>
                    <li class="dropdown @if($frontPageName=='about') active @endif">
                        <a href="#" class="nav-link dropdown-toggle arrow" data-toggle="dropdown">о компании</a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('aboutUs')}}">О нас</a></li>
                            <li><a href="{{route('awards')}}">Наши награды</a></li>
                            <li><a href="{{route('news')}}">Новости</a></li>
                        </ul>
                    </li>
                    <li class="nav-item @if($frontPageName=='contactUs') active @endif"><a class="nav-link"
                                                                                           href="{{route('contactUs')}}">Контакты</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->

            <!-- Start Atribute Navigation -->
            <div class="attr-nav">
                <ul>
                    <li class="search"><a href="#"><i class="fa fa-search"></i></a></li>
                    <li class="side-menu">
                        <a href="#">
                            <i class="fa fa-shopping-bag"></i>
                            <span
                                class="badge">@if($basketAllProductsCount != null){{$basketAllProductsCount}}@endif</span>
                            <p>Корзина</p>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- End Atribute Navigation -->
        </div>
        <!-- Start Side Menu -->
        <div class="side">
            <a href="#" class="close-side"><i class="fa fa-times"></i></a>
            <li class="cart-box">
                <ul class="cart-list">
                    @if($basketProducts != null)
                        @php $price = 0; @endphp
                        @foreach($basketProducts as $val)
                            <li>
                                <a href="#" class="photo"><img src="images/productsImg/{{$val->imgName}}"
                                                               class="cart-thumb"
                                                               alt=""/></a>
                                <h6><a href="#">{{$val->title}}</a></h6>
                                <p> {{$val->getProductInBasketCount()->productCount}} x - <span class="price">{{$val->price}}&#8381</span></p>
                                @php
                                    $singPrice = $val->price * $val->getProductInBasketCount()->productCount;
                                    $price += $singPrice;
                                @endphp
                            </li>
                        @endforeach
                        <li class="total">
                            <a href="{{route('getOrderPage')}}" class="btn btn-default hvr-hover btn-cart">Заказать</a>
                            <span class="float-right"><strong>Всего</strong>: {{$price}}</span>
                        </li>
                    @endif
                </ul>
            </li>
        </div>
        <!-- End Side Menu -->
    </nav>
    <!-- End Navigation -->
</header>
