@extends('layouts.app')

@section('title', 'Главная')

@push('css')

@endpush

@section('content')
    <section class="s-homepage">
        <div class="container">

            <div class="card-items">
                @foreach($language->categories as $category)
                    <a href="{{ route('user.category', [$language, $category]) }}" class="card-item card-item-home">
                    <div class="card-item__top">
                        <img src="{{ asset($category->image) }}" alt="">
                    </div>
                    <div class="card-item__bottom">
                        <h4 class="card-item__title">{{ $category->name }}</h4>
                        <div class="card-item__arrow"><img src="{{ asset('img/home-card-arrow-1.svg') }}" alt=""></div>
                    </div>
                </a>
                @endforeach
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush
