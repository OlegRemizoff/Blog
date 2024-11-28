
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
                                <li class="level1 active dropdown"><a href="{{ route('home') }}">Home</a>
                                    <span class="plus js-plus-icon"></span>
                                </li>
                                <li class="level1 dropdown hassub"><a href="#">Shop</a>
                                    <span class="plus js-plus-icon"></span>
                                </li>
                                <li class="level1 active dropdown">
                                    <a href="#">Pages</a>
                                    <span class="plus js-plus-icon"></span>
                                </li>
                                <li class="level1 active dropdown">
                                    <a href="#">Elements</a>
                                    <span class="plus js-plus-icon"></span>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>