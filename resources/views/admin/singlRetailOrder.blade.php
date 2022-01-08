@include('include.adminInclude.adminHeader')
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('include.adminInclude.adminNavbar')
Karen
<!-- Main Content-->
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Список заказов</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('getRetailOrdersList')}}">назад к списку ордеров</a></li>
            </ol>
        </div>
        <!--kontent start-->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Розничный ордер номер {{$userOrder[0]->id}} </h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th>Ном.</th>
                                <th>Название</th>
                                <th>Количество</th>
                                <th>Цена</th>
                                <th>Общая цена</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n = 0
                            ?>
                            @foreach($userOrder as $val)
                                @foreach($val->getUserOrderProduct() as $product)
                                    <?php
                                    $n++;

                                    ?>
                                    <tr>
                                        <th scope="row">{{$n}}</th>
                                        <td>{{$product->productTitle}}</td>
                                        <td>{{$product->productCount}}</td>
                                        <td>{{$product->productSinglPrice}}</td>
                                        <td>{{$product->productAllPrice}}</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th>Всего</th>
                                    <th>{{$val->getUserOrderProductSum()}}</th>
                                </tr>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                    <!-- table-responsive -->
                </div>
            </div>
        </div>
        <!--kontent end-->
    </div>
</div>

</div>
<!--footer-->
@include('include.adminInclude.adminFooter')
