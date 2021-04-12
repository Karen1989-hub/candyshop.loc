@include('include.adminInclude.adminHeader')
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('include.adminInclude.adminNavbar')

<!-- Main Content-->
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Редактировать информацию о компании</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">О нас</a></li>
            </ol>
        </div>
        <!--kontent start-->
        <!--form start-->
        <div class="row row-deck">
            <div class="col-lg-8" style="margin: 0 auto">
                <form action="{{route('updaetCompanyInfo')}}" method="post" class="card" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Новые данные</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="form-label">Загаловок</label>
                            <input type="text" class="form-control" name="title" value="{{$companyInfo->title}}" placeholder="Текст...">
                            @if($errors->has('title')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <label class="form-label">Текст<span class="form-label-small ml-3"></span></label>
                            <textarea class="form-control" name="text" rows="7" placeholder="Текст..."></textarea>
                            @if($errors->has('text')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <div class="col-lg-4 col-sm-12 mt-5" style="margin: 0 auto">
                                <input type="file" name="uploadImg" class="dropify" data-height="180"/>
                                @if($errors->has('uploadImg')) <span>
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
        <!--form end-->
        <!--kontent end-->
    </div>
</div>


</div>
<!--footer-->
@include('include.adminInclude.adminFooter')
