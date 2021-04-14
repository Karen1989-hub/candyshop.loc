@include('include.adminInclude.adminHeader')
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@include('include.adminInclude.adminNavbar')

<!-- Main Content-->
<div class="app-content  my-3 my-md-5">
    <div class="side-app">
        <div class="page-header">
            <h4 class="page-title">Добавить продукт</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Магазин</a></li>
            </ol>
        </div>
        <!--kontent start-->
        <!--form start-->
        <div class="row row-deck">
            <div class="col-lg-8" style="margin: 0 auto">
                <form action="{{route('createProduct')}}" method="post" class="card" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Новые данные</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="form-label">Название продукта</label>
                            <input type="text" class="form-control" name="title" value=""
                                   placeholder="Текст...">
                            @if($errors->has('title')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <label class="form-label">цена</label>
                            <input type="number" class="form-control" name="price" value=""
                                   placeholder="Текст...">
                            @if($errors->has('price')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <div class="form-group">
                                <label class="form-label">Категория продукта</label>
                                <select name="category" id="select-countries" class="form-control select2 custom-select">
                                    <option value="Конфеты весовые"
                                            data-data='{"image": "https://laravel.spruko.com/adminor/Leftmenu-Icon-DarkSidebar-Dark/assets/images/flags/br.svg"}'>
                                        Конфеты весовые
                                    </option>
                                    <option value="Конфеты Фасованные"
                                            data-data='{"image": "https://laravel.spruko.com/adminor/Leftmenu-Icon-DarkSidebar-Dark/assets/images/flags/cz.svg"}'>
                                        Конфеты Фасованные
                                    </option>
                                    <option value="Новинки"
                                            data-data='{"image": "https://laravel.spruko.com/adminor/Leftmenu-Icon-DarkSidebar-Dark/assets/images/flags/de.svg"}'>
                                        Новинки
                                    </option>
                                    <option value="Хиты"
                                            data-data='{"image": "https://laravel.spruko.com/adminor/Leftmenu-Icon-DarkSidebar-Dark/assets/images/flags/pl.svg"}'
                                            selected>Хиты
                                    </option>
                                </select>
                            </div>
                            <label class="form-label">Описание продукта<span
                                    class="form-label-small ml-3"></span></label>
                            <textarea class="form-control" name="text" rows="7" placeholder="Текст..."></textarea>
                            @if($errors->has('text')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <div class="col-lg-4 col-sm-12 mt-5" style="margin: 0 auto">
                                <input type="file" name="uploadImg" class="dropify" data-height="180"/>
                                @if($errors->has('uploadImg')) <span style="color: red">{{$errors->first()}}</span> @endif
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
