@extends('layouts.admin')

@section('title', 'Баннер')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-10 mt-4">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Информация</h3>
                        </div>
                        <form method="post" action="{{ route('admin.banners.update', $banner) }}" enctype="multipart/form-data">
                        <div class="card-body">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label for="homeTitle">Язык</label>
                                <select title="" class="form-control @error('language_id') is-invalid @enderror" name="language_id">
                                    @foreach($languages as $language)
                                        <option value="{{ $language->id }}"
                                                @if($banner->language->id == $language->id) selected @endif>{{ $language->code }}</option>
                                    @endforeach
                                </select>
                                @error('language_id')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="customFile">Изображение</label>
                                <div class="custom-file">
                                    <input type="file" accept="image/*" name="image" class="custom-file-input
                                                @error('image') is-invalid @enderror" id="customFile">
                                    <label class="custom-file-label" for="customFile">Допускаются расширения .png .jpeg .jpeg .svg</label>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="title">Заголовок</label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                       id="title"
                                       name="title" value="{{ $banner->title }}">
                                @error('title')
                                <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>
                        </div>
                            <div class="card-footer">
                                <div class="row w-100">
                                    <div class="col-md-6 col-sm-12">
                                        <a href="{{ route('admin.banners.index') }}" class="btn btn-outline-danger btn-block">Назад</a>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <button type="submit" class="btn btn-outline-success btn-block">Обновить</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush
