@include('include.adminInclude.adminHeader')
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('include.adminInclude.adminNavbar')

<!-- Main Content-->
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Удалить или редактировать продукт</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Магазин</a></li>

            </ol>
        </div>
        <!--kontent start-->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title">Data Tables2</div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="example" class="table table-striped table-bordered border-top-0 border-bottom-0"
                                   style="width:100%">
                                <thead>
                                <tr class="border-bottom-0">
                                    <th class="wd-25p">ID</th>
                                    <th class="wd-5p">Название продукта</th>
                                    <th class="wd-20p">Категория</th>
                                    <th class="wd-5p">Цена</th>
                                    <th class="wd-15p"></th>
                                    <th class="wd-15p"></th>
                                    <th class="wd-10p"></th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach($products as $val)
                                    <tr class="border-top-0">
                                        <form action="{{route('editProductPrice')}}" method="post">
                                            @csrf
                                            <input type="hidden" name="productId" value="{{$val->id}}">
                                        <td>{{$val->id}}</td>
                                        <td>{{$val->title}}</td>
                                        <td>{{$val->category}}</td>
                                            <td><input type="text" class="form-control" name="price" value="{{$val->price}}"></td>
                                            <td>{{$val->calculateType}}</td>
                                            <td><button type="submit" class="btn btn-outline-warning">Сохранить</button></td>
                                        </form>
                                        <td><a href="/frontEdit/deleteProduct/{{$val->id}}" class="btn btn-outline-danger">Удалить</a></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- table-wrapper -->
                </div>
                <!-- section-wrapper -->
            </div>
        </div>
        <!--kontent end-->
    </div>
</div>


</div>
<!--footer-->
@include('include.adminInclude.adminFooter')
