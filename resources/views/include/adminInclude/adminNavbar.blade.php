<aside class="app-sidebar">

    <ul class="side-menu">
        <li class="slide">
            <a class="side-menu__item @if($pageCategory == 'a') active @endif" data-toggle="slide" href="index-2.html#"><i
                    class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Скидки</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li @if($pageNumber == 'a1')class="active"@endif><a class="slide-item" href="{{route('getDiscountsPage')}}">Добавит/удалить текст скидки</a></li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item @if($pageCategory == 'b') active @endif" data-toggle="slide" href="index-2.html#"><i
                    class="side-menu__icon fa fa-desktop"></i></i><span class="side-menu__label">Главная</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li @if($pageNumber == 'b1')class="active"@endif>
                    <a href="{{route('getEditSliderPage')}}" class="slide-item">Редактировать слайдер</a>
                </li>
                <li @if($pageNumber == 'b2')class="active"@endif>
                    <a href="{{route('getEditProduktCategory')}}" class="slide-item">Редактировать категории продуктов</a>
                </li>
                <li @if($pageNumber == 'b3')class="active"@endif>
                    <a href="{{route('getEditContactData')}}" class="slide-item">Контактные данные</a>
                </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" @if($pageCategory == 'shop') active @endif data-toggle="slide" href="index-2.html#"><i
                    class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Магазин</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li @if($pageNumber == 'shop_1')class="active"@endif>
                    <a href="{{route('getCreateProduct')}}" class="slide-item">Добавить продукт</a>
                </li>
                <li @if($pageNumber == 'shop_2')class="active"@endif>
                    <a href="{{route('getDeleteOrEditProduct')}}" class="slide-item">Удалить или редактировать продукт</a>
                </li>
            </ul>
        </li>

        <li class="slide">
            <a class="side-menu__item" @if($pageCategory == 'aboutUs') active @endif data-toggle="slide" href="index-2.html#"><i
                    class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">О нас</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li @if($pageNumber == 'aboutUs_1')class="active"@endif>
                    <a href="{{route('getEditCompanyInfo')}}" class="slide-item">Редактировать информацию о компании</a>
                </li>
                <li @if($pageNumber == 'aboutUs_2')class="active"@endif>
                    <a href="{{route('getEditPersonalInfo')}}" class="slide-item">Редактировать информацию о персонале</a>
                </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" @if($pageCategory == 'awards') active @endif data-toggle="slide" href="index-2.html#"><i
                    class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Наши награды</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li @if($pageNumber == 'awards_1')class="active"@endif>
                    <a href="{{route('getEditAwards')}}" class="slide-item">Добавить/удалит награду</a>
                </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" @if($pageCategory == 'news') active @endif data-toggle="slide" href="index-2.html#"><i
                    class="side-menu__icon fa fa-desktop"></i><span class="side-menu__label">Новости</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li @if($pageNumber == 'news_1')class="active"@endif>
                    <a href="{{route('getEditNews')}}" class="slide-item">Добавить/удалить новость</a>
                </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" @if($pageCategory == 'contacts') active @endif data-toggle="slide" href="index-2.html#"><i
                    class="side-menu__icon mdi mdi-buffer"></i><span class="side-menu__label">Контакты</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li @if($pageNumber == 'messagesList')class="active"@endif>
                    <a href="{{route('getMessagesList')}}" class="slide-item">Список сообшений</a>
                </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" @if($pageCategory == 'retailOrders') active @endif data-toggle="slide" href="index-2.html#"><i
                    class="side-menu__icon fa fa-shopping-cart"></i><span class="side-menu__label">Розничные заказы</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li @if($pageNumber == 'retailOrdersList')class="active"@endif>
                    <a href="{{route('getRetailOrdersList')}}" class="slide-item">Список заказов</a>
                </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" @if($pageCategory == 'wholesalerOrders') active @endif data-toggle="slide" href="index-2.html#"><i
                    class="side-menu__icon fa fa-shopping-cart"></i><span class="side-menu__label">Заказы оптовиков</span><i
                    class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li @if($pageNumber == 'wholesalerOrdersList')class="active"@endif>
                    <a href="{{route('getWholesalerOrdersList')}}" class="slide-item">Список заказов</a>
                </li>
                <li @if($pageNumber == 'wholesalerRestrictions')class="activ"@endif>
                    <a href="{{route('getWholesaleRestrictions')}}" class="slide-item">Ограничения для оптовиков</a>
                </li>
            </ul>
        </li>
        <li class="slide">
            <a class="side-menu__item" @if($pageCategory == 'WholesalersRegistration') active @endif data-toggle="slide" href="index-2.html#"><i
                    class="side-menu__icon fa fa-cubes"></i><span
                    class="side-menu__label">Регистрация оптовика</span><i class="angle fa fa-angle-right"></i></a>
            <ul class="slide-menu">
                <li @if($pageNumber == 'WholesalersRegistration')class="active"@endif>
                    <a href="{{route('getWholesalersRegistration')}}" class="slide-item">Добавить/удалить оптовика</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>
