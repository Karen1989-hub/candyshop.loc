@include('include.adminInclude.adminHeader')
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('include.adminInclude.adminNavbar')
Karen
<!-- Main Content-->
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Список сообшений</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Контакты</a></li>
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
                                <th>эл. почта</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $n = 0
                            ?>
                            @foreach($message as $val)
                                <?php
                                $n++;
                                ?>
                            <tr>
                                <th scope="row">{{$n}}</th>
                                <td>{{$val->name}}</td>
                                <td>{{$val->email}}</td>
                                <td>@if($val->readState == "no readed") <span class="tag tag-orange">непрочтенное</span> @endif</td>
                                <td><a href="/admin/getSingleMessage/{{$val->id}}" class="btn btn-outline-success">Прочитать</a></td>
                                <td><a href="/admin/deleteMessage/{{$val->id}}" class="btn btn-outline-danger">Удалить</a></td>
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
