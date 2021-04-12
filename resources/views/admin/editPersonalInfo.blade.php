@include('include.adminInclude.adminHeader')
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('include.adminInclude.adminNavbar')

<!-- Main Content-->
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Редактировать информацию о персонале</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">О нас</a></li>

            </ol>
        </div>
        <!--kontent start-->
        <div class="row row-deck">
            <div class="col-lg-8" style="margin: 0 auto">
                <form action="{{route('createNewEmployee')}}" method="post" class="card" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Новые данные</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="form-label">Имя фамилие</label>
                            <input type="text" class="form-control" name="name" placeholder="Текст...">
                            @if($errors->has('name')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <label class="form-label">Должнасть<span class="form-label-small ml-3"></span></label>
                            <input type="text" class="form-control" name="position" placeholder="Текст...">
                            @if($errors->has('position')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <div class="col-lg-4 col-sm-12 mt-5" style="margin: 0 auto">
                                <input type="file" name="uploadImg" class="dropify" data-height="180"/>
                                @if($errors->has('uploadImg')) <span
                                    style="color: red">{{$errors->first()}}</span> @endif
                            </div>
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
        <!--kontent end-->
    </div>
</div>


</div>
<!--footer-->
@include('include.adminInclude.adminFooter')
