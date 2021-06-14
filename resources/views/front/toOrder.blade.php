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
                <h2>Корзина</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"></a>Корзина</li>
                    <li class="breadcrumb-item active">Список</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="table-main table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Имя продукта</th>
                            <th>Цена</th>
                            <th>Каличество</th>
                            <th>Всего</th>
                            <th>Удалить</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($basketProducts != null)
                            @foreach($basketProducts as $val)

                                <tr>
                                    <td class="thumbnail-img">
                                        <a href="#">
                                            <img class="img-fluid" src="images/productsImg/{{$val->imgName}}" alt=""/>
                                        </a>
                                    </td>
                                    <td class="name-pr">
                                        <a href="#">
                                            {{$val->title}}
                                        </a>
                                    </td>
                                    <td class="price-pr">
                                        <p>{{$val->price}}&#8381</p>
                                    </td>
                                    <td class="quantity-box"
                                        style="text-indent: 20px">{{$val->getProductInBasketCount()->productCount}}</td>
                                    {{--                                    <td class="quantity-box"><input name="productCount" type="number" size="4"--}}
                                    {{--                                                                    value="{{$val->getProductInBasketCount()->productCount}}"--}}
                                    {{--                                                                    min="0" step="1"--}}
                                    {{--                                                                    class="c-input-text qty text"></td>--}}
                                    <td class="total-pr">
                                        <p>@php echo $val->price * $val->getProductInBasketCount()->productCount; @endphp
                                            &#8381</p>
                                    </td>
                                    <td class="remove-pr">
                                        <a href="/user/deleteInBasket/{{$val->id}}/{{$val->getProductInBasketCount()->productCount}}">
                                            <i class="fas fa-times"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

                    {{--                    <div class="col-lg-6 col-sm-6">--}}
                    {{--                        <div class="update-box">--}}
                    {{--                            <input id="subUpdate" value="Обновить список" type="submit">--}}
                    {{--                        </div>--}}
                    {{--                    </div>--}}

                </div>
            </div>
        </div>

        <div class="row my-5">
            <div class="col-lg-8 col-sm-12"></div>
            <div class="col-lg-4 col-sm-12">
                <div class="order-box">
                    <h3>Итог заказа</h3>
                    @if($basketProducts != null)
                        @php $sum = 0; @endphp
                        @foreach($basketProducts as $val)
                            <div class="d-flex">
                                <h4>{{$val->title}} ({{$val->getProductInBasketCount()->productCount}})</h4>
                                <div
                                    class="ml-auto font-weight-bold"> @php echo $val->price * $val->getProductInBasketCount()->productCount; $sum+=$val->price * $val->getProductInBasketCount()->productCount; @endphp
                                    &#8381
                                </div>
                            </div>
                        @endforeach

                        <hr class="my-1">
                        <div class="d-flex">
                            <h4>Доставка</h4>
                            <div class="ml-auto font-weight-bold"> 0</div>
                        </div>

                        <hr>
                        <div class="d-flex gr-total">
                            <h5>Всего сумма</h5>
                            <div class="ml-auto h5">{{$sum}}&#8381</div>
                        </div>
                        <hr>
                    @endif
                </div>
            </div>
            <input class="form-control w-50 " id="address1" style="float: right"  placeholder="Введите адрес доставки" aria-label="Coupon code"
                   type="text">

{{--            <div class="col-12 d-flex shopping-box"><a href="checkout.html" class="ml-auto btn hvr-hover">Оплатить--}}
{{--                    сейчас</a></div>--}}

                <div class="col-12 shopping-box mt-1">
                    <form action="{{route('createUserOrder')}}" method="post">
                        @csrf
                        <input type="hidden" name="payment" value="оплата при доставке">
                        <input class="form-control w-50" name="address" id="address2" style="float: right"  placeholder="Введите адрес доставки" aria-label="Coupon code"
                               type="hidden">
                    <button type="submit" class=" btn hvr-hover"
                            style="color: white;font-size: 1.2em;padding: 10px 20px; float: right;">Оплата при доставке
                    </button>
                    </form>
                </div>

        </div>
    </div>
</div>
<!-- End Cart -->

<!-- Start Instagram Feed  -->
@include('include.footer')
