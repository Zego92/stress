@extends('layouts.admin')

@section('title', 'Наши работы')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Информация</h3>
                        </div>
                        <form action="{{ route('admin.posts.update', $post) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="language_id">Язык</label>
                                    <select title="" class="form-control @error('language_id') is-invalid @enderror"
                                            name="language_id">
                                        @foreach($languages as $language)
                                            <option value="{{ $language->id }}"
                                                    @if($post->language->id == $language->id) selected @endif>{{ $language->code }}</option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Категория</label>
                                    <select title="" class="form-control @error('category_id') is-invalid @enderror"
                                            name="category_id">
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}"
                                                    @if($post->category->id == $category->id) selected @endif>{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="customFile">Основное изображение</label>
                                    <div class="custom-file">
                                        <input type="file" accept="image/*" name="image" value="{{ old('image') }}"
                                               class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                                        <label class="custom-file-label" for="customFile">{{ $post->image }}</label>
                                        @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="title">Заголовок</label>
                                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title"
                                           name="title" value="{{ $post->title }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="description">Описание</label>
                                    <textarea name="description"
                                              class="form-control post-description @error('description') is-invalid @enderror"
                                              id="description">{{ $post->description }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row w-100">
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.posts.index') }}" class="btn btn-outline-danger btn-block" >
                                            Назад
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-outline-success btn-block">Обновить</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 mt-4">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Галерея</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-toggle="modal"
                                        data-target="#galleryModal">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row w-100 m-0 justify-content-center align-items-center">
                                @if(!$post->galleries->count())
                                    <h4>Изображения отсутствуют</h4>
                                @else
                                    @foreach($post->galleries as $gallery)
                                        <div class="col-md-5 mb-3">
                                            <div class="card mb-0">
                                                <img class="card-img-top" src="{{ asset($gallery->image) }}" alt="{{ $gallery->image }}">
                                            </div>
                                            <div class="card-footer">
                                                <form method="POST" class="deleteGalleryForm"
                                                      action="{{ route('admin.gallery.destroy', $gallery) }}">
                                                    @csrf
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <button type="submit"
                                                            class="btn btn-outline-danger btn-block deleteGallery deleteForm">
                                                        Удалить
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Добавить изображения</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.gallery.store') }}" class="addNewPostForm" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <div class="form-group">
                            <input type="hidden" name="postGalleries" id="postGalleries" value="" multiple>
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="actions" class="row">
                                        <div class="col-md-12">
                                            <div class="btn-group w-100">
                                                <span class="btn btn-success col fileinput-button">
                                                    <i class="fas fa-plus"></i>
                                                    <span>Добавить изображения</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="table table-striped files" id="previews">
                                        <div id="template" class="row mt-2">
                                            <div class="col-auto">
                                                <span class="preview"><img src="data:," alt="" data-dz-thumbnail/></span>
                                            </div>
                                            <div class="col d-flex align-items-center">
                                                <p class="mb-0">
                                                    <span class="lead" data-dz-name></span>
                                                    (<span data-dz-size></span>)
                                                </p>
                                                <strong class="error text-danger" data-dz-errormessage></strong>
                                            </div>
                                            <div class="col-auto d-flex align-items-center">
                                                <div class="btn-group">
                                                    <button data-dz-remove class="btn btn-danger delete">
                                                        <i class="fas fa-trash"></i>
                                                        <span>Удалить</span>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger btn-block" data-dismiss="modal">
                                    Закрыть
                                </button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-outline-success btn-block addNewPost">Добавить</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('js/dropZone.js') }}"></script>
    <script>
        toastr.options.closeButton = true;
        @if(session('success'))
        toastr.success( "{{session()->get('success')}}", {timeOut: 2000})
        @elseif(session('error'))
        toastr.error( "{{session()->get('error')}}", {timeOut: 2000})
        @endif
    </script>
@endpush
