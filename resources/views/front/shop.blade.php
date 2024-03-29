@include('include.header')
<!-- Start Main Top -->
@include('include.navbar')
<!-- End Main Top -->
<style>

</style>
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
<div class="shop-box-inner">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-9 col-sm-12 col-xs-12 shop-content-right">
                <div class="right-product-box">
                    <div class="product-categorie-box">
                        <div class="tab-content">
                            <div role="tabpanel" class="tab-pane fade show active" id="grid-view">
                                <div class="row">
                                    @if(count($products)>0)
                                        @foreach($products as $val)
                                            <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                                <div class="products-single fix">
                                                    <div class="box-img-hover">
                                                        <img style="height: 250px;" src="/images/productsImg/<?php echo str_replace("%","",$val->imgName) ?>"
                                                             class="img-fluid"
                                                             alt="Image">
                                                        <div class="mask-icon">
                                                            <ul>
                                                                <li><a href="/shopDetail/{{$val->id}}"
                                                                       data-toggle="tooltip" data-placement="right"
                                                                       title="Детально"><i
                                                                            class="fas fa-eye"></i></a></li>
                                                            </ul>
                                                            <a class="cart" href="/user/addInBasket/{{$val->id}}">В
                                                                корзину</a>
                                                        </div>
                                                    </div>
                                                    <div class="why-text">
                                                        <h4>{{$val->title}}<br>
                                                            <span
                                                                style="float: right;font-size: 0.8em">в наличии: {{$val->countInStock}}</span>
                                                        </h4>
                                                        <h5>{{$val->price}}</h5>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    @else
                                        <h2 style="margin: 50px auto">Нечего не найденно</h2>
                                    @endif


                                </div>
                                <div class="d-flex justify-content-center shopPagination">
                                    <div class="pagination ">
                                        @php
                                            if(!isset($_GET['page'])){
                                                $_GET['page'] = 1;
    }
                                        @endphp
{{--                                       shop?page= --}}
                                        <a href="<?php if($filtr == false){echo 'shop?page=';} elseif($filtr == true) {echo '?page=';}; ?><?php echo $_GET['page'] - 1; ?>">&laquo;</a>
                                        @for($i=0;$i<$pageCount;$i++)
                                            <a href="<?php if($filtr == false){echo 'shop?page=';} elseif($filtr == true) {echo '?page=';}; ?>{{$i+1}}" class="<?php if ($_GET['page'] == ($i + 1)) {
                                                echo 'active';
                                            }  ?>">{{$i+1}}</a>
                                        @endfor

                                        <a href="<?php if($filtr == false){echo 'shop?page=';} elseif($filtr == true) {echo '?page=';}; ?><?php echo $_GET['page'] + 1; ?>">&raquo;</a>
                                    </div>
                                </div>

                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="list-view">
                                <div class="list-view-box">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="new">New</p>
                                                    </div>
                                                    <img src="images/img-pro-01.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                   title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                   title="Compare"><i class="fas fa-sync-alt"></i></a>
                                                            </li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                   title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                            <div class="why-text full-width">
                                                <h4>Lorem ipsum dolor sit amet</h4>
                                                <h5>
                                                    <del>$ 60.00</del>
                                                    $40.79
                                                </h5>
                                                <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien,
                                                    imperdiet quis magna nec, iaculis ultrices ante. Integer vitae
                                                    suscipit nisi. Morbi dignissim risus sit amet orci porta, eget
                                                    aliquam purus
                                                    sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in
                                                    blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis
                                                    euismod ex volutpat in. Vestibulum eleifend eros ac lobortis
                                                    aliquet.
                                                    Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin
                                                    quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut
                                                    placerat lectus.</p>
                                                <a class="btn hvr-hover" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-view-box">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-02.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                   title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                   title="Compare"><i class="fas fa-sync-alt"></i></a>
                                                            </li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                   title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">
                                            <div class="why-text full-width">
                                                <h4>Lorem ipsum dolor sit amet</h4>
                                                <h5>
                                                    <del>$ 60.00</del>
                                                    $40.79
                                                </h5>
                                                <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien,
                                                    imperdiet quis magna nec, iaculis ultrices ante. Integer vitae
                                                    suscipit nisi. Morbi dignissim risus sit amet orci porta, eget
                                                    aliquam purus
                                                    sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in
                                                    blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis
                                                    euismod ex volutpat in. Vestibulum eleifend eros ac lobortis
                                                    aliquet.
                                                    Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin
                                                    quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut
                                                    placerat lectus.</p>
                                                <a class="btn hvr-hover" href="#">Add to Cart</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="list-view-box">
                                    <div class="row">
                                        <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                                            <div class="products-single fix">
                                                <div class="box-img-hover">
                                                    <div class="type-lb">
                                                        <p class="sale">Sale</p>
                                                    </div>
                                                    <img src="images/img-pro-03.jpg" class="img-fluid" alt="Image">
                                                    <div class="mask-icon">
                                                        <ul>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                   title="View"><i class="fas fa-eye"></i></a></li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                   title="Compare"><i class="fas fa-sync-alt"></i></a>
                                                            </li>
                                                            <li><a href="#" data-toggle="tooltip" data-placement="right"
                                                                   title="Add to Wishlist"><i class="far fa-heart"></i></a>
                                                            </li>
                                                        </ul>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!--                                            <div class="col-sm-6 col-md-6 col-lg-8 col-xl-8">-->
                                        <!--                                                <div class="why-text full-width">-->
                                        <!--                                                    <h4>Karen Lorem ipsum dolor sit amet</h4>-->
                                        <!--                                                    <h5> <del>$ 60.00</del> $40.79</h5>-->
                                        <!--                                                    <p>Integer tincidunt aliquet nibh vitae dictum. In turpis sapien, imperdiet quis magna nec, iaculis ultrices ante. Integer vitae suscipit nisi. Morbi dignissim risus sit amet orci porta, eget aliquam purus-->
                                        <!--                                                        sollicitudin. Cras eu metus felis. Sed arcu arcu, sagittis in blandit eu, imperdiet sit amet eros. Donec accumsan nisi purus, quis euismod ex volutpat in. Vestibulum eleifend eros ac lobortis aliquet.-->
                                        <!--                                                        Suspendisse at ipsum vel lacus vehicula blandit et sollicitudin quam. Praesent vulputate semper libero pulvinar consequat. Etiam ut placerat lectus.</p>-->
                                        <!--                                                    <a class="btn hvr-hover" href="#">Add to Cart</a>-->
                                        <!--                                                </div>-->
                                        <!--                                            </div>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-sm-12 col-xs-12 sidebar-shop-left">
                <div class="product-categori">
                    <div class="search-product">
                        <form action="{{route('getDetailShopPage2')}}" method="get">
                            <input class="form-control" name="title"
                                   placeholder="@if($searchError!=null) {{$searchError}} @else Поиск . . . @endif"
                                   type="text">
                            <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>
                    <div class="filter-sidebar-left">
                        <div class="title-left">
                            <h3>Категории</h3>
                        </div>
                        <div class="list-group list-group-collapse list-group-sm list-group-tree" id="list-group-men"
                             data-children=".sub-men">
                            @foreach($categories as $val)
                                <a href="/shop/{{$val->id}}"
                                   class="list-group-item list-group-item-action">{{$val->title}}<small
                                        class="text-muted"> ({{$val->getProductCount()}}) </small></a>
                            @endforeach
                        </div>
                        <hr>
                        <p>Филтр по цене</p>
                        <form action="{{route('shop')}}" method="get">
                            <label for="">Мин.</label><br>
                            <input type="number" name="minPrice"><br>
                            <label for="">Макс.</label><br>
                            <input type="number" name="maxPrice"><br>
                            <input type="submit" value="Найти" style="margin-top: 10px;cursor: pointer;">
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Shop Page -->

<!-- Start Instagram Feed  -->
@include('include.footer')
