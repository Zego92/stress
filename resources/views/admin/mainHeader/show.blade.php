@extends('layouts.admin')

@section('title', 'Шапка главной страницы')

@push('css')

@endpush

@section('content')
    <section class="content">

        <div class="container-fluid">

            <div class="row justify-content-center align-items-center">

                <div class="col-md-12 mt-4">

                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Изменение данных</h3>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('admin.header.update', $header) }}" method="post">
                                @method('PATCH')
                                @csrf
                                <div class="form-group">
                                    <label for="homeTitle">Язык</label>
                                    <select title="" class="form-control @error('language_id') is-invalid @enderror"
                                            name="language_id">
                                        @foreach($languages as $language)
                                            <option value="{{ $language->id }}"
                                                    @if($header->language->id == $language->id) selected @endif>{{ $language->code }}</option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="customFile">Логотип</label>
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" name="brandLogoImage" class="custom-file-input @error('brandLogoImage') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">Логотип сайта</label>
                                        @error('brandLogoImage')
                                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="homeTitle">Название "Главная"</label>
                                    <input type="text" class="form-control @error('homeTitle') is-invalid @enderror"
                                           id="homeTitle"
                                           name="homeTitle" value="{{ $header->homeTitle }}">
                                    @error('homeTitle')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="ourProjectsTitle">Название "Наши работы"</label>
                                    <input type="text"
                                           class="form-control @error('ourProjectsTitle') is-invalid @enderror"
                                           id="ourProjectsTitle"
                                           name="ourProjectsTitle" value="{{ $header->ourProjectsTitle }}">
                                    @error('ourProjectsTitle')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="contactTitle">Название "Контакты"</label>
                                    <input type="text" class="form-control @error('contactTitle') is-invalid @enderror"
                                           id="contactTitle"
                                           name="contactTitle" value="{{ $header->contactTitle }}">
                                    @error('contactTitle')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="feedbackTitle">Название "Рассчитать стоимость"</label>
                                    <input type="text" class="form-control @error('feedbackTitle') is-invalid @enderror"
                                           id="feedbackTitle"
                                           name="feedbackTitle" value="{{ $header->feedbackTitle }}">
                                    @error('feedbackTitle')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('admin.header.index') }}"
                                               class="btn btn-outline-danger btn-block">Назад</a>
                                        </div>
                                        <div class="col-md-6">
                                            <button type="submit" class="btn btn-outline-success btn-block">Обновить
                                            </button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>

        </div>

    </section>

@endsection

@push('js')

@endpush
