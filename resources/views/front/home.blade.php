@include('include.header')
<!-- Start Main Top -->
@include('include.navbar')
<!-- End Main Top -->

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Искать">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->

<!-- Start Slider -->
<div id="slides-shop" class="cover-slides">
    <ul class="slides-container">
        @foreach($homePageSlider as $val)
            <li class="text-center">
                <img src="images/homePageSliderImg/{{$val->imgName}}" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1 class="m-b-20"><strong>{{$val->title}}</strong></h1>
                            <p class="m-b-40">{{$val->text}}</p>
                            <!--<p><a class="btn hvr-hover" href="#">Shop New</a></p>-->
                        </div>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
<!-- End Slider -->

<!-- Start Categories  -->
<div class="categories-shop">
    <div class="container">
        <div class="row d-flex justify-content-around">
            @foreach($categories as $val)
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="shop-cat-box">
                        <img class="img-fluid" src="images/categoriesImg/{{$val->imgName}}" alt=""/>
                        <a class="btn hvr-hover" href="#">{{$val->title}}</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Categories -->

<!-- Start Products  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Наша продукция</h1>
                    <p>Мы производим лучшую продукцию.</p>
                </div>
            </div>
        </div>


        <div class="row special-list">
            @foreach($product8 as $val)
                <div class="col-lg-3 col-md-6 special-grid best-seller">
                    <div class="products-single fix">
                        <div class="box-img-hover">
                            <img style="height: 250px;" src="images/productsImg/<?php echo str_replace("%","",$val->imgName); ?>" class="img-fluid" alt="Image">

                        </div>
                        <div class="why-text">
                            <h4>{{$val->title}}</h4>
                            <h5>{{$val->price}}</h5>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Products  -->

<!-- Start Blog  -->
<div class="latest-blog">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Новости</h1>
                    <p>Наши последние новости</p>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($news as $val)
            <div class="col-md-6 col-lg-4 col-xl-4">
                <div style="height: 400px;" class="blog-box">
                    <div class="blog-img">
                        <img class="img-fluid" src="{{asset('images/news/'.$val->imgName)}}" alt=""/>
                    </div>
                    <div class="blog-content">
                        <div class="title-blog">
                            <h3>{{$val->title}}</h3>
                            <p>{{$val->created_at}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End Blog  -->

@include('include.footer')

