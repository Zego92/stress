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
                            <h3 class="card-title">Шапка главной страницы</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool text-white" data-toggle="modal"
                                        data-target="#mainHeaderModal">
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
                                        <th>Логотип</th>
                                        <th>Главная <a href="{{ route('home') }}" target="_blank"><i class="fas fa-link"></i></a></th>
                                        <th>Наши Работы <a href="{{ route('home') }}" target="_blank"><i class="fas fa-link"></i></a></th>
                                        <th>Контакты <a href="{{ route('home') }}" target="_blank"><i class="fas fa-link"></i></a></th>
                                        <th>Калькулятор <a href="{{ route('home') }}" target="_blank"><i class="fas fa-link"></i></a></th>
                                        <th>Язык</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($headers as $key => $header)
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td><img height="25px" src="{{ asset($header->brandLogoImage) }}" alt="{{ asset($header->brandLogoImage) }}"></td>
                                            <td>{{ $header->homeTitle }}</td>
                                            <td>{{ $header->ourProjectsTitle }}</td>
                                            <td>{{ $header->contactTitle }}</td>
                                            <td>{{ $header->feedbackTitle }}</td>
                                            <td>{{ $header->language->code }}</td>
                                            <td>
                                                <div class="btn-toolbar" role="toolbar"
                                                     aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <a class="btn btn-outline-primary btn-sm mr-2"
                                                           href="{{ route('admin.header.show', $header) }}"><i
                                                                class="fas fa-info-circle"></i></a>
                                                        <form method="POST" class="deleteHeaderForm" action="{{ route('admin.header.destroy', $header) }}">
                                                            @method('DELETE')
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <a class="btn btn-outline-danger btn-sm deleteHeader deleteForm">
                                                                <i class="fas fa-trash"></i>
                                                            </a>
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
                            {{ $headers->links('vendor.pagination.bootstrap-4') }}
                        </div>
                        <div class="card-footer clearfix" style="display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="mainHeaderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Новая шапка сайта</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.header.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <select title="" class="form-control @error('language_id') is-invalid @enderror" name="language_id">
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
                            <div class="custom-file">
                                <input type="file" accept="image/*" name="brandLogoImage" value="{{ old('brandLogoImage') }}" class="custom-file-input @error('brandLogoImage') is-invalid @enderror" id="customFile">
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
                            <input type="text" class="form-control @error('homeTitle') is-invalid @enderror" id="homeTitle"
                                   name="homeTitle" value="{{ old('homeTitle') }}">
                            @error('homeTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ourProjectsTitle">Название "Наши работы"</label>
                            <input type="text" class="form-control @error('ourProjectsTitle') is-invalid @enderror" id="ourProjectsTitle"
                                   name="ourProjectsTitle" value="{{ old('ourProjectsTitle') }}">
                            @error('ourProjectsTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="contactTitle">Название "Контакты"</label>
                            <input type="text" class="form-control @error('contactTitle') is-invalid @enderror" id="contactTitle"
                                   name="contactTitle" value="{{ old('contactTitle') }}" >
                            @error('contactTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="feedbackTitle">Название "Рассчитать стоимость"</label>
                            <input type="text" class="form-control @error('feedbackTitle') is-invalid @enderror" id="feedbackTitle"
                                   name="feedbackTitle" value="{{ old('feedbackTitle') }}">
                            @error('feedbackTitle')
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
    <script>
        toastr.options.closeButton = true;
        @if(session('success'))
        toastr.success( "{{session()->get('success')}}", {timeOut: 2000})
        @elseif(session('error'))
        toastr.error( "{{session()->get('error')}}", {timeOut: 2000})
        @endif
    </script>
@endpush
