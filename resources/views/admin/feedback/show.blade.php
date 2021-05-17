@extends('layouts.admin')

@section('title', 'Запросы на расчет')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 mt-4">
                    <form method="post" action="{{ route('admin.feedbacks.update', $feedback) }}">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Информация</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="fio">ФИО</label>
                                    <input type="text" class="form-control @error('fio') is-invalid @enderror"
                                           id="fio"
                                           name="fio" value="{{ $feedback->fio }}">
                                    @error('fio')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           name="email" value="{{ $feedback->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" class="form-control feedback-phone @error('phone') is-invalid @enderror"
                                           id="phone"
                                           name="phone" value="{{ $feedback->phone }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="status">Статус</label>
                                    <select title="" class="form-control @error('status') is-invalid @enderror" name="status">
                                        <option value="1" @if($feedback->status == 1) selected @endif>{{ $feedback->status == 1 ?? 'Получен' }}</option>
                                        <option value="2" @if($feedback->status == 2) selected @endif>{{ $feedback->status == 2 ?? 'В обработке' }}</option>
                                        <option value="3" @if($feedback->status == 3) selected @endif>{{ $feedback->status == 3 ?? 'Обработан' }}</option>
                                    </select>
                                    @error('language_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="title">Тема</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                                           id="title"
                                           name="title" value="{{ $feedback->title }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea name="description" class="form-control feedback-description @error('description') is-invalid @enderror" id="description" cols="30" rows="10">{{ $feedback->description }}</textarea>
{{--                                    <input type="text" class="form-control feedback-description @error('description') is-invalid @enderror"--}}
{{--                                           id="description"--}}
{{--                                           name="description" value="{{ $feedback->description }}">--}}
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="row w-100 mt-5">
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.feedbacks.index') }}"
                                           class="btn btn-outline-danger btn-block">Назад</a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-outline-success btn-block">Обновить
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush
