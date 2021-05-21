<header class="header header-info">
    <div class="container">
        <div class="header__left">
            <a href="{{ route('user.home') }}" class="site-logo desktop"><img height="110px" src="{{ asset($language->mainHeader->brandLogoImage) }}" alt="{{ $language->mainHeader->brandLogoImage }}"></a>
            <a href="#" class="site-logo mobile"><img src="{{ asset('img/site-logo-mob.svg') }}" alt=""></a>
        </div>
        <div class="header__right">
            <ul class="lang-lists" data-da="main-menu__inner,1,767">
                @foreach($languages as $index => $item)
                    <li class="{{ request()->is($item->code . '/*') ? 'active' : '' }}">
                        <a href="{{ route('user.language.home', $item) }}">{{ \Illuminate\Support\Str::upper($item->code) }}</a>
                    </li>
                @endforeach
            </ul>
            <div class="header__nav">
                <div class="mob-menu-open" id="mob-menu-open"><img src="{{ asset('img/menu-icon.svg') }}" alt=""></div>
                <nav class="main-menu" id="main-menu">
                    <a href="#" class="site-logo mobile"><img src="{{ asset('img/site-logo-mob.svg') }}" alt=""></a>
                    <div class="mob-menu-close" id="mob-menu-close"><img src="{{ asset('img/menu-close-icon.svg') }}" alt=""></div>
                    <div class="main-menu__inner">
                        <ul>
                            <li class="@if(\Illuminate\Support\Facades\Route::is('user.language.home')) active @endif"><a href="{{ route($language->mainHeader->homeLink) }}">{{ $language->mainHeader->homeTitle }}</a></li>
                            <li class="@if(\Illuminate\Support\Facades\Route::is('user.our-projects')) active @endif"><a href="{{ route($language->mainHeader->ourProjectsLink, $language) }}">{{ $language->mainHeader->ourProjectsTitle }}</a></li>
                            <li class="@if(\Illuminate\Support\Facades\Route::is('user.contacts')) active @endif"><a href="{{ route($language->mainHeader->contactLink, $language) }}">{{ $language->mainHeader->contactTitle }}</a></li>
                            <li class="@if(\Illuminate\Support\Facades\Route::is('user.feedback')) active @endif"><a href="{{ route($language->mainHeader->feedbackLink, $language) }}">{{ $language->mainHeader->feedbackTitle }}</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
