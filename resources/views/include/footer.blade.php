<!-- Start Instagram Feed  -->
<div class="instagram-box">
    <h3 style="color: white;text-align: center;font-size: 2em;">Наши награды</h3>
    <div class="main-instagram owl-carousel owl-theme">
        @foreach($awards as $val)
        <div class="item">
            <div class="ins-inner-box">
                <img src="{{asset('images/awardImg/'.$val->imgName)}}" alt="error" />
            </div>
        </div>
        @endforeach
    </div>
</div>
<!-- End Instagram Feed  -->


<!-- Start Footer  -->
<footer>
    <div class="footer-main">
        <div class="container">
            <hr>
            <div class="row">

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-top-box">
                        <h3>Социальные медия</h3>
                        <p>Вы можете нас найти.</p>
                        <ul>
                            <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link">
                        <h4>Меню</h4>
                        <ul>
                            <li><a href="#">Главная</a></li>
                            <li><a href="#">Магазин</a></li>
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Наши награды</a></li>
                            <li><a href="#">Новости</a></li>
                            <li><a href="#">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="footer-link-contact">
                        <h4>Контактные даннуе</h4>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>{{$contactData[0]->adress}} </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:{{$contactData[0]->phone}}">{{$contactData[0]->phone}}</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-envelope"></i>Email: <a href="mailto:{{$contactData[0]->email}}">{{$contactData[0]->email}}</a></p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer  -->

<!-- Start copyright  -->
<div class="footer-copyright">
    <p class="footer-company">Все права зашишены. &copy; 2021 <a href="#"></a>
        <a href="https://html.design/"></a></p>
</div>
<!-- End copyright  -->

<a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

<!-- ALL JS FILES -->
<script src="{{asset('js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<!-- ALL PLUGINS -->
<script src="{{asset('js/jquery.superslides.min.js')}}"></script>
<script src="{{asset('js/bootstrap-select.js')}}"></script>
<script src="{{asset('js/inewsticker.js')}}"></script>
<script src="{{asset('js/bootsnav.js')}}"></script>
<script src="{{asset('js/images-loded.min.js')}}"></script>
<script src="{{asset('js/isotope.min.js')}}"></script>
<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/baguetteBox.min.js')}}"></script>
<script src="{{asset('js/form-validator.min.js')}}"></script>
<script src="{{asset('js/contact-form-script.js')}}"></script>
<script src="{{asset('js/custom.js')}}"></script>
<script src="{{asset('updateBasket.js')}}"></script>
</body>

</html>
