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
                        <h3 class="card-title">Сообшение от {{$message->name}}</h3>

                    </div>
                    <div class="table-responsive">
                        <p style="margin: 20px;font-size: 1.2em">{{$message->message}}</p>
                    </div>
                    <br>
                    <a href="{{route('getMessagesList')}}" class="btn btn-outline-success">Возврат обратно</a>
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
