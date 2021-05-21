@extends('layouts.app')

@section('title', $post->title)

@push('css')

@endpush

@section('content')
    <section class="s-top-intro full-height" style="background-image: url({{ asset($post->image) }});">
        <div class="container">
            <div class="post-tag" >{{ $post->category->name }}</div>
            <div class="main-title-wrap">
                <h1 class="main-title md-title">{{ $post->title }}</h1>
                <div class="post-date">{{ \Illuminate\Support\Carbon::parse($post->created_at)->locale($post->language->code)->diffForHumans() }}</div>
            </div>
        </div>
    </section>
    <section class="s-post">
        <div class="globe-bg" style="background-image: url('{{ asset('img/globe-bg-1.png') }}');"></div>
        <div class="container post-container">

            <div class="post-content post-with-sidebar">
                <aside class="post-sidebar">
                    @foreach($post->galleries as $key => $gallery)
                        <a href="{{ asset($gallery->image) }}" data-lightbox="example-set">
                            <img height="40px" src="{{ asset($gallery->image) }}" alt="{{ $gallery->image }}">
                        </a>
                    @endforeach
                </aside>
                <div class="post-content__right">
                    <p>
                        {!! $post->description !!}
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')

@endpush
