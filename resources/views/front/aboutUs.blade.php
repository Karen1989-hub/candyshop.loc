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
            <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('images2/about_us/img-1.jpg')}}" alt="" />
                        <div class="team-content">
                            <h3 class="title">Williamson</h3> <span class="post">Web Developer</span> </div>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0"> </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('images2/about_us/img-2.jpg')}}" alt="" />
                        <div class="team-content">
                            <h3 class="title">Kristiana</h3> <span class="post">Web Developer</span> </div>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0"> </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('images2/about_us/img-3.jpg')}}" alt="" />
                        <div class="team-content">
                            <h3 class="title">Steve Thomas</h3> <span class="post">Web Developer</span> </div>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i> </div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0"> </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="hover-team">
                    <div class="our-team"> <img src="{{asset('images2/about_us/img-1.jpg')}}" alt="" />
                        <div class="team-content">
                            <h3 class="title">Williamson</h3> <span class="post">Web Developer</span> </div>
                        <div class="icon"> <i class="fa fa-plus" aria-hidden="true"></i></div>
                    </div>
                    <div class="team-description">
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent urna diam, maximus ut ullamcorper quis, placerat id eros. Duis semper justo sed condimentum rutrum. Nunc tristique purus turpis. Maecenas vulputate. </p>
                    </div>
                    <hr class="my-0"> </div>
            </div>
        </div>
    </div>
</div>
<!-- End About Page -->

<!-- Start Instagram Feed  -->
@include('include.footer')
