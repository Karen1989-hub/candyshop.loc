@include('include.header')
<!-- Start Main Top -->
@include('include.navbar')
<!-- End Main Top -->

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Search">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>Магазин</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Магазин</a></li>
                    <li class="breadcrumb-item active">Список</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Shop Page  -->
<div class="shop-detail-box-main">
    <div class="container">
        <div class="row">
            <div class="col-xl-5 col-lg-5 col-md-6">
                <div id="carousel-example-1" class="single-product-slider carousel slide" data-ride="carousel">
                    <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active"> <img class="d-block w-100" src="{{asset('images/productsImg/'.$singlProduct[0]->imgName)}}" alt="First slide"> </div>

                    </div>

                    </a>

                    </a>

                </div>
            </div>
            <div class="col-xl-7 col-lg-7 col-md-6">
                <div class="single-product-details">
                    <h2>{{$singlProduct[0]->title}}</h2>
                    <h5>{{$singlProduct[0]->price}} &#8381</h5>

                    <h4>Детальное описание:</h4>
                    <p>{{$singlProduct[0]->description}}</p>
                    <ul>
                        <li>
                            <div class="form-group quantity-box">
                                <label class="control-label">Количество</label>
                                <input class="form-control" value="0" min="0" max="20" type="number">
                            </div>
                        </li>
                    </ul>

                    <div class="price-box-bar">
                        <div class="cart-and-bay-btn">
                            <a class="btn hvr-hover" data-fancybox-close="" href="#">В корзину</a>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>
<!-- End Shop Page -->

<!-- Start Instagram Feed  -->
@include('include.footer')
