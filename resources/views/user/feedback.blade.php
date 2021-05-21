@extends('layouts.app')

@section('title', 'Расчитать стоимость')

@push('css')

@endpush

@section('content')
    <section class="s-search">
        <div class="container">
            <form action="{{ route('user.feedback.store') }}" method="post">
                @csrf
                <div class="row justify-content-center align-items-center">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="fio">ФИО</label>
                            <input type="text" class="form-control @error('fio') is-invalid @enderror" id="fio"
                                   name="fio" value="{{ old('fio') }}">
                            @error('fio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="text" class="form-control user-feedback-phone @error('phone') is-invalid @enderror" id="phone"
                                   name="phone" value="{{ old('phone') }}">
                            @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="title">Тема</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                   name="title" value="{{ old('title') }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ old('title') }}</textarea>
                            {{--                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"--}}
                            {{--                                   name="title" value="{{ old('title') }}">--}}
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-block btn-outline-success bg-success">Отправить</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection

@push('js')

@endpush
