@extends('layouts.admin')

@section('title', 'Шапка главной страницы')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 mt-4">
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
                        <div class="card-body p-0" style="display: block;">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">Логотип</th>
                                        <th scope="col">Главная <a href="{{ route('home') }}" target="_blank"><i class="fas fa-link"></i></a></th>
                                        <th scope="col">Наши Работы <a href="{{ route('home') }}" target="_blank"><i class="fas fa-link"></i></a></th>
                                        <th scope="col">Контакты <a href="{{ route('home') }}" target="_blank"><i class="fas fa-link"></i></a></th>
                                        <th scope="col">Калькулятор <a href="{{ route('home') }}" target="_blank"><i class="fas fa-link"></i></a></th>
                                        <th scope="col">Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($headers as $key => $header)
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <div class="btn-toolbar" role="toolbar"
                                                     aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <a class="btn btn-outline-primary mr-2"
                                                           href="{{ route('admin.header.show', $header) }}"><i
                                                                class="fas fa-info-circle text-white"></i></a>
                                                        <form method="POST"
                                                              action="{{ route('admin.header.destroy', $header) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-outline-danger">
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
                        <div class="card-footer clearfix" style="display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="mainHeaderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Новый язык</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.languages.store') }}">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="code">Введите код языка</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="code"
                                   name="code" value="{{ old('code') }}" placeholder="Например 'ru', 'en', 'ua' и т.д">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    @csrf

                    <div class="modal-footer">
                        <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Закрыть</button>
                        <button type="submit" class="btn btn-outline-success">Добавить</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('js')

@endpush
