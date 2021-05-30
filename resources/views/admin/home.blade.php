@extends('layouts.admin')
@section('title', 'Панель Управления')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Панель Управления</h1>
                </div>
            </div>
        </div>
    </div>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $categories }}</h3>
                            <p>Категории</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-list-ul"></i>
                        </div>
                        <a href="{{ route('admin.categories.index') }}" class="small-box-footer">Подробней <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $posts }}</h3>
                            <p>Наши проекты</p>
                        </div>
                        <div class="icon">
                            <i class="fab fa-product-hunt"></i>
                        </div>
                        <a href="{{ route('admin.posts.index') }}" class="small-box-footer">Подробней <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $feedbacks }}</h3>
                            <p>Запросы на расчет</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-comments-dollar"></i>
                        </div>
                        <a href="{{ route('admin.feedbacks.index') }}" class="small-box-footer">Подробней <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{ $users }}</h3>
                            <p>Пользователи</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('admin.users.index') }}" class="small-box-footer">Подробней <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <div class="clearfix hidden-md-up"></div>
            </div>
        </div>
    </section>
@endsection
