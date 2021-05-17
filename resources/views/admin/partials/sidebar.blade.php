<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <div class="sidebar mt-3">
        <a href="{{ route('admin.index') }}" class="user-panel pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('user.png') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <span class="d-block text-white">Администратор</span>
            </div>
        </a>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <li class="nav-item @if(request()->is('admin/static*')) menu-is-opening menu-open @endif" style="border-bottom: 1px solid #ffffff">
                    <a href="#" class="nav-link">
                        <i class="fas fa-copy"></i>
                        <p>
                            Статические страницы
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" @if(request()->is('admin/static*')) style="display: block;" @else style="display: none;" @endif>
                        <li class="nav-item">
                            <a href="{{ route('admin.header.index') }}" class="nav-link @if(request()->is('admin/static/main/header*')) active @endif">
                                <i class="fas fa-desktop"></i>
                                <p class="ml-2">
                                    Шапка сайта
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.banners.index') }}" class="nav-link @if(request()->is('admin/static/banners*')) active @endif">
                                <i class="fas fa-image"></i>
                                <p class="ml-2">
                                    Баннеры
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.page-feedback.index') }}" class="nav-link @if(request()->is('admin/static/page-feedback*')) active @endif">
                                <i class="fas fa-calculator"></i>
                                <p class="ml-2" style="overflow-wrap: break-word">
                                    Страница "Рассчитать стоимость"
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.footer.index') }}" class="nav-link @if(request()->is('admin/static/main/footer*')) active @endif">
                                <i class="far fa-sticky-note"></i>
                                <p class="ml-2">
                                    Футер
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin.contacts.index') }}" class="nav-link @if(request()->is('admin/static/contacts*')) active @endif">
                                <i class="fab fa-contao"></i>
                                <p class="ml-2">
                                    Контакты
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.languages.index') }}" class="nav-link @if(request()->is('admin/languages*')) active @endif">
                        <i class="fas fa-globe"></i>
                        <p class="ml-2">
                            Языки
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.categories.index') }}" class="nav-link @if(request()->is('admin/categories*')) active @endif">
                        <i class="fas fa-list-ul"></i>
                        <p class="ml-2">
                            Категории
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.posts.index') }}" class="nav-link @if(request()->is('admin/posts*')) active @endif">
                        <i class="fab fa-product-hunt"></i>
                        <p class="ml-2">
                            Наши проекты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.feedbacks.index') }}" class="nav-link @if(request()->is('admin/feedbacks*')) active @endif">
                        <i class="fas fa-comments-dollar"></i>
                        <p class="ml-2">
                            Запросы на расчет
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.users.index') }}" class="nav-link @if(request()->is('admin/users*')) active @endif">
                        <i class="fas fa-users"></i>
                        <p class="ml-2">
                            Пользователи
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>
