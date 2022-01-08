@include('include.header')
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
                <h2>Вход</h2>
            </div>
        </div>
    </div>
</div>
<!-- End All Title Box -->

<!-- Start Cart  -->
<div class="cart-box-main">
    <div class="container">
        <div class="row new-account-login">
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Вход в акаунт</h3>
                </div>
                <h5><a data-toggle="collapse" href="#formLogin" role="button" aria-expanded="false">Нажмите сюда для
                        введения логина</a></h5>
                <form action="{{route('signIn')}}" method="post" class="mt-3 collapse review-form-box" id="formLogin">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputEmail" class="mb-0">Логин</label>
                            <input type="text" name="login" class="form-control" id="InputEmail"
                                   placeholder="Введите логин">
                            @if($errors->has('login')) <span style="color: red">{{$errors->first()}}</span> @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword" class="mb-0">Пароль</label>
                            <input type="password" name="password" class="form-control" id="InputPassword"
                                   placeholder="Введите пароль">
                            @if($errors->has('password')) <span style="color: red">{{$errors->first()}}</span> @endif
                        </div>
                    </div>
                    @if($userRegistrationError != null) <span
                        style="color: red">{{$userRegistrationError}}</span> @endif
                    <button type="submit" class="btn hvr-hover">Вход</button>
                </form>
            </div>
            <div class="col-sm-6 col-lg-6 mb-3">
                <div class="title-left">
                    <h3>Регистрация</h3>
                </div>
                <h5><a data-toggle="collapse" href="#formRegister" role="button" aria-expanded="false">Для регистрации
                        нажмите сюда</a></h5>
                <form action="{{route('createUser')}}" method="post" class="mt-3 collapse review-form-box"
                      id="formRegister">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="InputName" class="mb-0">Имя</label>
                            <input type="text" name="firstName" class="form-control" id="InputName"
                                   placeholder="Введите имя">
                            @if($errors->has('firstName')) <span style="color:red">{{$errors->first()}}</span> @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputLastname" class="mb-0">Фамилия</label>
                            <input type="text" name="lastName" class="form-control" id="InputLastname"
                                   placeholder="Введите фамилие">
                            @if($errors->has('lastName')) <span style="color:red">{{$errors->first()}}</span> @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputEmail1" class="mb-0">Эл. почта</label>
                            <input type="email" name="email" class="form-control" id="InputEmail2"
                                   placeholder="Введите эл. почту">
                            @if($errors->has('email')) <span style="color:red">{{$errors->first()}}</span> @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword1" class="mb-0">Телефон</label>
                            <input type="text" name="telephon" class="form-control" id="InputPassword1"
                                   placeholder="повторите пароль">
                            @if($errors->has('telephon')) <span style="color:red">{{$errors->first()}}</span> @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword1" class="mb-0">Пароль</label>
                            <input type="password" name="password" class="form-control" id="InputPassword2"
                                   placeholder="Введите пароль">
                            @if($errors->has('password')) <span style="color:red">{{$errors->first()}}</span> @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputEmail1" class="mb-0">Логин</label>
                            <input type="text" name="login" class="form-control" id="InputEmail1"
                                   placeholder="Введите логин">
                            @if($errors->has('login')) <span style="color:red">{{$errors->first()}}</span> @endif
                        </div>
                        <div class="form-group col-md-6">
                            <label for="InputPassword1" class="mb-0">Повтор пароля</label>
                            <input type="password" name="password_confirmation" class="form-control" id="InputPassword1"
                                   placeholder="повторите пароль">
                            @if($errors->has('password_confirmation')) <span
                                style="color:red">{{$errors->first()}}</span> @endif
                        </div>
                        <div class="form-group col-md-6">
                            <input type="hidden" name="userType" class="form-control" id="InputPassword1"
                                   value="retail">
                        </div>

                    </div>
                    <button type="submit" class="btn hvr-hover">Регистрация</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Cart -->

@include('include.footer')
