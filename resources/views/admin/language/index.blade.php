@extends('layouts.admin')

@section('title', 'Языки')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Добавленные языки</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool text-white" data-toggle="modal"
                                        data-target="#exampleModal">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-0" style="display: block;">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead class="justify-content-between">
                                    <tr>
                                        <th>ID</th>
                                        <th>Имя</th>
                                        <th>Действие</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        @foreach($languages as $key => $language)
                                            <td>{{ $key +1 }}</td>
                                            <td>{{ $language->code }}</td>
                                            <td>
                                                <a href="{{ route('admin.languages.show', $language) }}"><i
                                                        class="fas fa-info-circle"></i></a>
                                                <a href="{{ route('admin.languages.destroy', $language) }}"><i
                                                        class="fas fa-trash"></i></a>
                                            </td>
                                        @endforeach
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer clearfix" style="display: block;">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
