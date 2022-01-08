@include('include.adminInclude.adminHeader')
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('include.adminInclude.adminNavbar')
Karen
<!-- Main Content-->
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Ограничения для оптовиков</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Список заказов</a></li>
            </ol>
        </div>
        <!--kontent start-->
        <!--form start-->
        <div class="row row-deck">
            <div class="col-lg-8" style="margin: 0 auto">
                <form action="{{route('updateMinSaleCountForWholesaler')}}" method="post" class="card" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Минимальное количество заказа для оптовиков</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="form-label">Число</label>
                            <input type="number" class="form-control" name="count" value="{{$minSaleCountForWholesaler}}" >
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary ml-auto">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--form end-->
        <!--kontent end-->
    </div>
</div>

</div>
<!--footer-->
@include('include.adminInclude.adminFooter')
