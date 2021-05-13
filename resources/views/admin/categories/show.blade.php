@extends('layouts.admin')

@section('title', 'Категории')

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
                        <div class="card-body p-0">
                            <form method="post" action="{{ route('admin.banners.update') }}" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label for="homeTitle">Язык</label>
                                    <select title="" class="form-control @error('language_id') is-invalid @enderror" name="language_id">
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
                                    <label for="name">Название</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                           id="name"
                                           name="name" value="{{ $category->name }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="row w-100">
                                    <div class="col-md-6 col-sm-12">
                                        <a href="{{ route('admin.categories.index') }}" class="btn btn-outline-danger btn-block">Назад</a>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <button type="submit" class="btn btn-outline-success btn-block">Добавить</button>
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
