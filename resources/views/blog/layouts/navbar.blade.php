
<header id="header" class="header-v1">
    <div class="header-top">
        <div class="container container-40">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="logo-mobile hidden-lg hidden-md">
                        <a href="" title="home-logo"><img src="{{ asset('assets/blog/img/cosre.png') }}" alt="logo" class="img-reponsive"></a>
                    </div>
                    <!--end logo-->
                    <button type="button" class="navbar-toggle icon-mobile" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-menu"></span>
                    </button>
                    <nav class="navbar main-menu">
                        <div class="collapse navbar-collapse" id="myNavbar">
                            <ul class="nav navbar-nav js-menubar">
                                <li class="level1 active dropdown"><a href="{{ route('home') }}">Главная</a>
                                    <span class="plus js-plus-icon"></span>
                                </li>
                                @if (auth()->user())
                                <li class="level1 active dropdown">
                                    <a href="{{ route('logout') }}">Выйти</a>
                                    <span class="plus js-plus-icon"></span>
                                </li>
                                <li class="level1 active dropdown">
                                    <a href="{{ route('profile') }}">{{ auth()->user()->name }}</a>
                                    <span class="plus js-plus-icon"></span>
                                </li>
                                @else
                                <li class="level1 active dropdown">
                                    <a href="{{ route('login.create') }}">Войти</a>
                                    <span class="plus js-plus-icon"></span>
                                </li>
                                @endif
                                <li class="level1 active dropdown"><a href="{{ route('test') }}">Тестовое</a>

                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>