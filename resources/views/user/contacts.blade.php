@extends('layouts.app')

@section('title', 'Контакты')

@push('css')

@endpush

@section('content')
    <section class="s-post">
        <div class="container post-container">
            <div class="post-content">
                <div class="post-content__narrow">
                    <h4>Телефоны</h4>
                    @if($language->contact->firstPhone)
                        <p>{{ $language->contact->firstPhone }}</p>
                    @endif
                    @if($language->contact->secondPhone)
                        <p>{{ $language->contact->secondPhone }}</p>
                    @endif
                    @if($language->contact->thirdPhone)
                        <p>{{ $language->contact->thirdPhone }}</p>
                    @endif

                    <h4>График работы</h4>
                    @if($language->contact->startTimeWork && $language->contact->endTimeWork)
                        <p>Понедельник - Пятница, С {{ \Illuminate\Support\Carbon::parse($language->contact->startTimeWork)->format('H:i') }} до {{ \Illuminate\Support\Carbon::parse($language->contact->endTimeWork)->format('H:i') }}</p>
                    @endif
                    <h4>Email</h4>
                    @if($language->contact->email)
                        <p>{{ $language->contact->email }}</p>
                    @endif
                    <h4>Адрес</h4>
                    @if($language->contact->address)
                        <p>{{ $language->contact->address }}</p>
                    @endif
                    <div>{!! $language->contact->gMapLink !!}</div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush
