@include('include.adminInclude.adminHeader')
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('include.adminInclude.adminNavbar')

<!-- Main Content-->
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Контактные данные</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Главная</a></li>

            </ol>
        </div>
        <!--kontent start-->
        <!--form start-->
        <div class="row row-deck">
            <div class="col-lg-8" style="margin: 0 auto">
                <form action="{{route('editContactData')}}" method="post" class="card" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Редактировать контактные данные</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="form-label">Адрес</label>
                            <input type="text" value="{{$contactData->adress}}" class="form-control" name="address" placeholder="Текст...">
                            @if($errors->has('address')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <label class="form-label">Телефон</label>
                            <input type="text" value="{{$contactData->phone}}" class="form-control" name="phone" placeholder="Текст...">
                            @if($errors->has('phone')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <label class="form-label">Эл. почта</label>
                            <input type="text" value="{{$contactData->email}}" class="form-control" name="email" placeholder="Текст...">
                            @if($errors->has('email')) <span style="color: red">{{$errors->first()}}</span> @endif
                        </div>
                    </div>
                    <div class="card-footer text-right">
                        <div class="d-flex">
                            <button type="submit" class="btn btn-primary ml-auto">Добавить</button>
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
