@extends('layouts.admin')

@section('title', 'Рассчитать стоимость')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-8 mt-4">
                    <form method="post" action="{{ route('admin.page-feedback.update', $feedback) }}"
                          enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-header border-transparent">
                                <h3 class="card-title">Информация</h3>
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
                                                    @if($feedback->language->id == $language->id) selected @endif>{{ $language->code }}</option>
                                        @endforeach
                                    </select>
                                    @error('language_id')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="headerTitle">Заголовок формы</label>
                                    <input type="text" class="form-control @error('headerTitle') is-invalid @enderror"
                                           id="headerTitle"
                                           name="headerTitle" value="{{ $feedback->headerTitle }}">
                                    @error('headerTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fioTitle">Заголовок "ФИО"</label>
                                    <input type="text" class="form-control @error('fioTitle') is-invalid @enderror"
                                           id="fioTitle"
                                           name="fioTitle" value="{{ $feedback->fioTitle }}">
                                    @error('fioTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="fioPlaceholderTitle">Подсказка "ФИО"</label>
                                    <input type="text" class="form-control @error('fioPlaceholderTitle') is-invalid @enderror"
                                           id="fioPlaceholderTitle"
                                           name="fioPlaceholderTitle" value="{{ $feedback->fioPlaceholderTitle }}">
                                    @error('fioPlaceholderTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="emailTitle">Заголовок "EMAIL"</label>
                                    <input type="text" class="form-control @error('emailTitle') is-invalid @enderror"
                                           id="emailTitle"
                                           name="emailTitle" value="{{ $feedback->emailTitle }}">
                                    @error('emailTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="emailPlaceholderTitle">Подсказка "EMAIL"</label>
                                    <input type="text" class="form-control @error('emailPlaceholderTitle') is-invalid @enderror"
                                           id="emailPlaceholderTitle"
                                           name="emailPlaceholderTitle" value="{{ $feedback->emailPlaceholderTitle }}">
                                    @error('emailPlaceholderTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phoneTitle">Заголовок "Телефон"</label>
                                    <input type="text" class="form-control @error('phoneTitle') is-invalid @enderror"
                                           id="phoneTitle"
                                           name="phoneTitle" value="{{ $feedback->phoneTitle }}">
                                    @error('phoneTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="phonePlaceholderTitle">Подсказка "Телефон"</label>
                                    <input type="text" class="form-control @error('phonePlaceholderTitle') is-invalid @enderror"
                                           id="phonePlaceholderTitle"
                                           name="phonePlaceholderTitle" value="{{ $feedback->phonePlaceholderTitle }}">
                                    @error('phonePlaceholderTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="messageTitle">Заголовок "Тема"</label>
                                    <input type="text" class="form-control @error('messageTitle') is-invalid @enderror"
                                           id="messageTitle"
                                           name="messageTitle" value="{{ $feedback->messageTitle }}">
                                    @error('messageTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="messagePlaceholderTitle">Подсказка "Тема"</label>
                                    <input type="text" class="form-control @error('messagePlaceholderTitle') is-invalid @enderror"
                                           id="messagePlaceholderTitle"
                                           name="messagePlaceholderTitle" value="{{ $feedback->messagePlaceholderTitle }}">
                                    @error('messagePlaceholderTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="messageDescriptionTitle">Заголовок "Описание"</label>
                                    <input type="text" class="form-control @error('messageDescriptionTitle') is-invalid @enderror"
                                           id="messageDescriptionTitle"
                                           name="messageDescriptionTitle" value="{{ $feedback->messageDescriptionTitle }}">
                                    @error('messageDescriptionTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="messageDescriptionPlaceholderTitle">Подсказка "Описание"</label>
                                    <input type="text" class="form-control @error('messageDescriptionPlaceholderTitle') is-invalid @enderror"
                                           id="messageDescriptionPlaceholderTitle"
                                           name="messageDescriptionPlaceholderTitle" value="{{ $feedback->messageDescriptionPlaceholderTitle }}">
                                    @error('messageDescriptionPlaceholderTitle')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                                <div class="row w-100 mt-5">
                                    <div class="col-md-6">
                                        <a href="{{ route('admin.page-feedback.index') }}"
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
