@extends('layouts.app')

@section('title', 'Расчитать стоимость')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
@endpush

@section('content')
    <section class="s-search">
        <div class="container">
            <form action="{{ route('user.feedback.store') }}" method="post">
                @csrf
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="fio">{{ $language->feedbackPage->fioTitle }}</label>
                            <input type="text" class="form-control @error('fio') is-invalid @enderror" id="fio"
                                   name="fio" value="{{ old('fio') }}" placeholder="{{ $language->feedbackPage->fioPlaceholderTitle }}">
                            @error('fio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="email">{{ $language->feedbackPage->emailTitle }}</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" value="{{ old('email') }}" placeholder="{{ $language->feedbackPage->emailPlaceholderTitle }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="phone">{{ $language->feedbackPage->phoneTitle }}</label>
                            <input type="text" class="form-control user-feedback-phone @error('phone') is-invalid @enderror" id="phone"
                                   name="phone" value="{{ old('phone') }}" placeholder="{{ $language->feedbackPage->phonePlaceholderTitle }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">{{ $language->feedbackPage->messageTitle }}</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                   name="title" value="{{ old('title') }}" placeholder="{{ $language->feedbackPage->messagePlaceholderTitle }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="description">{{ $language->feedbackPage->messageDescriptionTitle }}</label>
                            <textarea name="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      id="description" cols="30" rows="10"
                                      placeholder="{{ $language->feedbackPage->messageDescriptionPlaceholderTitle }}">{{ old('title') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-primary" style="background-color: #2A2A86 !important; border: 1px solid #2A2A86 !important;">
                            <i class="fab fa-telegram-plane"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('js')

@endpush
