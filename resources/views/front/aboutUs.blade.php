@include('include.header')
<!-- End Main Top -->

<!-- Start Main Top -->
@include('include.navbar')
<!-- End Main Top -->

<!-- Start Top Search -->
<div class="top-search">
    <div class="container">
        <div class="input-group">
            <span class="input-group-addon"><i class="fa fa-search"></i></span>
            <input type="text" class="form-control" placeholder="Поиск...">
            <span class="input-group-addon close-search"><i class="fa fa-times"></i></span>
        </div>
    </div>
</div>
<!-- End Top Search -->

<!-- Start All Title Box -->
<div class="all-title-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2>О нас</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">О компании</a></li>
                    <li class="breadcrumb-item active">О нас</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start About Page  -->
<div class="about-box-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-frame"> <img class="img-fluid" src="{{asset('images/aboutCompanyImg/'.$aboutCompany->imgName)}}" alt="" />
                </div>
            </div>
            <div class="col-lg-6">
                <h2 class="noo-sh-title-top"><span>{{$aboutCompany->title}}</span></h2>
                <p>{{$aboutCompany->text}}</p>
            </div>
        </div>
        <div class="row my-5">
        </div>
        <div class="row my-4">
            <div class="col-12">
                <h2 class="noo-sh-title">Наша команда</h2>
            </div>
            @foreach($employees as $val)
            <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                   <div class="our-team" style="background-image: url('{{asset('images/employeesImg/'.$val->imgName)}}');background-size: 100% 80%;"> {{-- <img src="{{asset('images/employeesImg/'.$val->imgName)}}" alt="" />--}}
                        <div class="team-content">
                            <h3 class="title">{{$val->name}}</h3> <span class="post">{{$val->position}}</span> </div>

                    </div>
                    <hr class="my-0"> </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End About Page -->

<!-- Start About Page Galery  -->
<div class="about-box-main">
    <div class="container">
        <div class="row my-5">
        </div>
        <div class="row my-4">
            <div class="col-12">
                <h2 class="noo-sh-title">Галерея</h2>
            </div>
            @foreach($galery as $val)
                <div class="col-sm-6 col-lg-3">
                    <div class="hover-team">
                        <div class="our-team2" style="background-image: url('{{asset('images/galery/'.$val->imgName)}}');background-size: 100% 100%;"> {{-- <img src="" alt="" />--}}
                        </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
<!-- End About Page Galery-->

<!-- Start Instagram Feed  -->
@include('include.footer')
