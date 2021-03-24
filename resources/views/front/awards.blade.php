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
            <input type="text" class="form-control" placeholder="Search">
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
                <h2>Наши достижения</h2>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">О компании</a></li>
                    <li class="breadcrumb-item active">Наши достижения</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Gallery  -->
<div class="products-box">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-all text-center">
                    <h1>Галерея наград</h1>
                    <p>«АтАг» вот уже 20 лет радует покупателей своими кондитерскими изделиями. Многочисленные дипломы и награды международных конкурсов подтверждают безупречное качество продукции и высокий профессионализм наших сотрудников.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="special-menu text-center">
                    <div class="button-group filter-button-group">
                        <button class="active" data-filter="*">Все</button>
                        <button data-filter=".bulbs">Награды</button>
                        <button data-filter=".fruits">Дипломы</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row special-list">
            <div class="col-lg-3 col-md-6 special-grid bulbs">
                <img src="images2/diploms/worldfood_2016.jpg" class="img-fluid" alt="Image" style="background-size: 100% 100%;height: 300px;overflow: hidden">
            </div>

            <div class="col-lg-3 col-md-6 special-grid fruits">
                <img src="images2/diploms/img_0035.jpg" class="img-fluid" alt="Image">
            </div>

        </div>
    </div>
</div>
<!-- End Gallery  -->

<!-- Start Instagram Feed  -->
@include('include.footer')
