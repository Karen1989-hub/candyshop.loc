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
                        <h3 class="card-title">Список сообшений</h3>
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
                                    <th scope="row">{{$n}}</th>
                                    <td>Karen Aroyan</td>
                                    <td>098905050</td>
                                    <td>Pushkin p 3 62 bnakaran</td>
                                    <td>oplata pri dostawke</td>
                                    <td>v ojidanii</td>
                                    <td>13.11.1989 654465464ww</td>
                                    <td><a href="/admin/getSingleMessage/" class="btn btn-outline-success">Прочитать</a>
                                    </td>
                                    <td><a href="/admin/deleteMessage/"
                                           class="btn btn-outline-danger">Удалить</a></td>
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
