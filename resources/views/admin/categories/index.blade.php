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
                            <h3 class="card-title">Категории</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool text-white" data-toggle="modal"
                                        data-target="#categoryModal">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Изображение</th>
                                        <th>Название</th>
                                        <th>Кол-во Работ</th>
                                        <th>Язык</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($categories as $key => $category)
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td><img height="25px" src="{{ $category->image }}" alt="{{ $category->image }}"></td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->posts_count }}</td>
                                            <td>{{ $category->language->code }}</td>
                                            <td>
                                                <div class="btn-toolbar" role="toolbar"
                                                     aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <a class="btn btn-outline-primary mr-2"
                                                           href="{{ route('admin.categories.show', $category) }}"><i
                                                                class="fas fa-info-circle"></i></a>
                                                        <form method="POST" class="deleteCategoryForm"
                                                              action="{{ route('admin.categories.destroy', $category) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-outline-danger deleteCategory deleteForm">
                                                                <i class="fas fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{ $categories->links('vendor.pagination.bootstrap-4') }}
                        </div>
                        <div class="card-footer clearfix" style="display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="categoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Новая Категория</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.categories.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="language_id">Язык</label>
                            <select title="" id="language_id" class="form-control @error('language_id') is-invalid @enderror" name="language_id">
                                <option selected disabled>Выберите язык</option>
                                @foreach($languages as $language)
                                    <option value="{{ $language->id ?? old('language_id')}}">{{ $language->code }}</option>
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
                                <input type="file" accept="image/*" name="image" value="{{ old('image') }}" class="custom-file-input @error('image') is-invalid @enderror" id="customFile">
                                <label class="custom-file-label" for="customFile">Разрешенные форматы png, jpeg, jpg, svg</label>
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                   name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="row w-100">
                            <div class="col-md-6">
                                <button type="button" class="btn btn-outline-danger btn-block" data-dismiss="modal">Закрыть</button>
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-outline-success btn-block">Добавить</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
