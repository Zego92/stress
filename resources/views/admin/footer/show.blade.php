@extends('layouts.admin')

@section('title', 'Футер')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 mt-4">
                    <form method="post" action="{{ route('admin.contacts.update', $contact) }}">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Контакты</h3>
                            </div>
                            <div class="card-body">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="language_id">Язык</label>
                                    <select title="" class="form-control @error('language_id') is-invalid @enderror"
                                            name="language_id">
                                        @foreach($languages as $language)
                                            <option value="{{ $language->id }}"
                                                    @if($contact->language->id == $language->id) selected @endif>{{ $language->code }}</option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstPhone">Телефон</label>
                                    <input type="text" class="form-control @error('firstPhone') is-invalid @enderror"
                                           id="firstPhone"
                                           name="firstPhone" value="{{ $contact->firstPhone }}">
                                    @error('firstPhone')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="secondPhone">Телефон</label>
                                    <input type="text" class="form-control @error('secondPhone') is-invalid @enderror"
                                           id="secondPhone"
                                           name="secondPhone" value="{{ $contact->secondPhone }}">
                                    @error('secondPhone')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="thirdPhone">Телефон</label>
                                    <input type="text" class="form-control @error('thirdPhone') is-invalid @enderror"
                                           id="thirdPhone"
                                           name="thirdPhone" value="{{ $contact->thirdPhone }}">
                                    @error('thirdPhone')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="address">Адрес</label>
                                    <input type="text" class="form-control @error('address') is-invalid @enderror"
                                           id="address"
                                           name="address" value="{{ $contact->address }}">
                                    @error('address')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                           id="email"
                                           name="email" value="{{ $contact->email }}">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gMapLink">GMAP</label>
                                    <input type="text" class="form-control @error('gMapLink') is-invalid @enderror"
                                           id="gMapLink"
                                           name="gMapLink" value="{{ $contact->gMapLink }}">
                                    @error('gMapLink')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="row w-100 mt-5">
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.footer.index') }}"
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
