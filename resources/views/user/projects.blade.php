@extends('layouts.app')

@section('title', 'Наши работы')

@push('css')

@endpush

@section('content')
    <section class="s-search">
        <div class="container">
            <div class="business-area">
                <div class="select">
                    <div class="select-input">
{{--                        <div class="select-input__value">--}}
{{--                            <img src="{{ asset('img/select-icon-1.svg') }}" alt="">--}}
{{--                            <span>{{ $category->name }}</span>--}}
{{--                        </div>--}}
                        <div class="select-input__arrow"><img src="{{ asset('img/arrow-down.svg') }}" alt=""></div>
                    </div>
                    <div class="select-options">
                        @foreach($language->categories as $item)
                            <div class="select-option">
                                <img src="{{ asset('img/select-icon-1.svg') }}" alt="">
                                <span><a href="{{ route('user.category', [$language, $item]) }}">{{ $item->name }}</a></span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="result-wrap">
                <div class="card-items">
                    @if(!$language->posts->count())
                        <h3 style="text-align: center; margin: 0 auto">Вскоре мы выставим наши работы</h3>
                    @else
                        @foreach($language->posts as $post)
                            <a href="{{ route('user.post.show', [$language,$post->category,$post]) }}" class="card-item">
                                <div class="card-item__top">
                                    <img src="{{ asset($post->image) }}" alt="">
                                </div>
                                <div class="card-item__bottom">
                                    <div class="card-item__bottom-top">
                                        <div class="card-item__label green">{{ $post->category->name }}</div>
                                        <h4 class="card-item__title">{{ $post->title }}</h4>

                                        <div class="card-item__date">{{ \Illuminate\Support\Carbon::parse($post->created_at)->locale($language->code)->diffForHumans() }}</div>
                                    </div>
                                    <div class="card-item__arrow"><img src="{{ asset('img/home-card-arrow-4.svg') }}" alt=""></div>
                                </div>
                            </a>
                        @endforeach
                    @endif

                </div>
            </div>
            <ul class="page-pagination">
                <li class="pagination-item"><a href="#">{{ $posts->links() }}</a></li>
            </ul>
        </div>
    </section>
@endsection

@push('js')
    <script type="text/javascript">
        const selectInput = document.querySelectorAll('.select-input');
        for (let i = 0; i < selectInput.length; i++) {
            selectInput[i].classList.remove('active')
            selectInput[i].addEventListener('click', function () {
                const currentSelect = selectInput[i].parentElement;
                if (currentSelect.classList.contains('active')) {
                    currentSelect.classList.remove('active');
                } else {
                    currentSelect.classList.add('active');
                }
            });
        }
    </script>
@endpush
