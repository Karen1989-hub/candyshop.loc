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
                <li class="breadcrumb-item"><a href="#">Рознечные заказы</a></li>
            </ol>
        </div>
        <!--kontent start-->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Список заказов</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th>Но.</th>
                                <th>Имя</th>
                                <th>Телефон</th>
                                <th>Адрес доставки</th>
                                <th>Оплата</th>
                                <th>Статус</th>
                                <th>Дата</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n = 0
                            ?>
                            @foreach($userOrder as $val)
                                <?php
                                $n++;
                                ?>
                                <tr>
                                    <th scope="row">{{$val->id}}</th>
                                    <td>{{$val->getOrdersUser()->firstName}} {{$val->getOrdersUser()->lastName}}</td>
                                    <td>{{$val->getOrdersUser()->telephon}}</td>
                                    <td>{{$val->deliveryAddress}}</td>
                                    <td>{{$val->payment}}</td>
                                    <td>
                                    @if($val->status == 'pending')
                                        <span style="color: yellow">в ожидании</span>
                                        @else
                                        <span style="color: green">завершено</span>
                                        @endif
                                    </td>
                                    <td>{{$val->created_at}}</td>
                                    <td><a href="/admin/getSinglRetailOrdersList/{{$val->id}}" class="btn btn-outline-success">Прочитать</a>
                                    </td>
                                    <td><a href="/user/deleteUserOrder/{{$val->id}}"
                                           class="btn btn-outline-danger">Удалить</a></td>
                                    <td><a href="/user/updateUserOrderStatus/{{$val->id}}"
                                           class="btn btn-outline-warning">Завершить</a></td>
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
