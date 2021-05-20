<header class="header header-info">
    <div class="container">
        <div class="header__left">
            <a href="#" class="site-logo desktop"><img src="{{ asset('img/site-logo.svg') }}" alt=""></a>
            <a href="#" class="site-logo mobile"><img src="{{ asset('img/site-logo-mob.svg') }}" alt=""></a>
        </div>
        <div class="header__right">
            <ul class="lang-lists" data-da="main-menu__inner,1,767">
                <li class="{{app()->getLocale() == 'en' ? 'active' : ''}}"><a href="#">EN</a></li>
                <li class="{{app()->getLocale() == 'ru' ? 'active' : ''}}"><a href="#">RU</a></li>
            </ul>
            <div class="header__nav">
                <div class="mob-menu-open" id="mob-menu-open"><img src="{{ asset('img/menu-icon.svg') }}" alt=""></div>
                <nav class="main-menu" id="main-menu">
                    <a href="#" class="site-logo mobile"><img src="{{ asset('img/site-logo-mob.svg') }}" alt=""></a>
                    <div class="mob-menu-close" id="mob-menu-close"><img src="{{ asset('img/menu-close-icon.svg') }}" alt=""></div>
                    <div class="main-menu__inner">
                        <ul>
                            <li class="active"><a href="#">HOME TITLE</a></li>
                            <li><a href="#">CASE STUDIES</a></li>
                            <li><a href="#">NAV LINK</a></li>
                            <li><a href="#">PROJECT DOCUMENTS</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
