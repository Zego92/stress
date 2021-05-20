@extends('layouts.admin')

@section('title', 'Пользователи')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Информация</h3>
                        </div>
                        <form method="post" action="{{ route('admin.users.update', $user) }}">
                            @csrf
                            @method('PATCH')
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="fio">ФИО</label>
                                    <input type="text" class="form-control @error('fio') is-invalid @enderror" id="fio"
                                           name="fio" value="{{ $user->fio }}">
                                    @error('fio')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="username">Псевдоним</label>
                                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                                           name="username" value="{{ $user->username }}">
                                    @error('username')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                           name="email" value="{{ $user->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phone">Телефон</label>
                                    <input type="text" class="form-control user-phone @error('phone') is-invalid @enderror" id="phone"
                                           name="phone" value="{{ $user->phone }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Пароль</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                                           name="password">
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row w-100">
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.users.index') }}" class="btn btn-outline-danger btn-block" >Назад</a>
                                    </div>
                                    <div class="col-md-6">
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
