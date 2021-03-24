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
                <form action="{{route('createSliderPage')}}" method="post" class="card" enctype="multipart/form-data">
                    @csrf
                    <div class="card-header">
                        <h3 class="card-title">Редактировать контактные данные</h3>
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <label class="form-label">Загаловок</label>
                            <input type="text" class="form-control" name="address" placeholder="Текст...">
                            @if($errors->has('title')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <label class="form-label">Текст </label>
                            <input type="text" class="form-control" name="phone" placeholder="Текст...">
                            @if($errors->has('text')) <span style="color: red">{{$errors->first()}}</span> @endif
                            <input type="text" class="form-control" name="email" placeholder="Текст...">
                            @if($errors->has('text')) <span style="color: red">{{$errors->first()}}</span> @endif,
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
        <!--table start-->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Список слайдов</h3>
                    </div>
                    <div class="table-responsive">
                        <table class="table card-table table-vcenter text-nowrap">
                            <thead>
                            <tr>
                                <th>N.</th>
                                <th>Загаловок</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $n = 0; ?>
                            {{-- --}}        {{-- @foreach($homePageSlider as $val)
                        <tr>
                            <th scope="row"><?php $n++; echo $n; ?></th>
                            <td>{{$val->title}}</td>
                            <th><a href="/frontEdit/deleteSliderPage/{{$val->id}}" class="btn btn-outline-danger"
                                   style="float: right">Удалит</a></th>
                        </tr>
                    @endforeach --}}
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <!--table end-->
        <!--kontent end-->
    </div>
</div>



</div>
<!--footer-->
@include('include.adminInclude.adminFooter')
