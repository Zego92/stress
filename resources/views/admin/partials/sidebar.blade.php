<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('admin.index') }}" class="brand-link">
        <img src="{{ asset('AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span  class="d-block">Администратор</span>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">

                <li class="nav-item">
                    <a href="{{ route('admin.languages.index') }}" class="nav-link @if(request()->is('admin/languages')) active @endif">
                        <i class="fas fa-globe"></i>
                        <p class="ml-2">
                            Языки
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.header.index') }}" class="nav-link @if(request()->is('admin/header')) is-invalid @endif">
                        <i class="fas fa-desktop"></i>
                        <p class="ml-2">
                            Шапка сайта
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.banners.index') }}" class="nav-link @if(request()->is('admin/banners')) is-invalid @endif">
                        <i class="fas fa-image"></i>
                        <p class="ml-2">
                            Баннеры
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
