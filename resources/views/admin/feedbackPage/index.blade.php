@extends('layouts.admin')

@section('title', 'Рассчитать стоимость')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Страница "Рассчитать стоимость"</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool text-white" data-toggle="modal"
                                        data-target="#feedbackPageModal">
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
                                        <th>Заголовок формы</th>
                                        <th>Заголовок "ФИО"</th>
                                        <th>Подсказка "ФИО"</th>
                                        <th>Заголовок "EMAIL"</th>
                                        <th>Подсказка "EMAIL"</th>
                                        <th>Заголовок "Телефон"</th>
                                        <th>Подсказка "Телефон"</th>
                                        <th>Заголовок "Тема"</th>
                                        <th>Подсказка "Тема"</th>
                                        <th>Заголовок "Описание"</th>
                                        <th>Подсказка "Описание"</th>
                                        <th>Язык</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($feedbacks as $key => $feedback)
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td>{{ $feedback->headerTitle }}</td>
                                            <td>{{ $feedback->fioTitle }}</td>
                                            <td>{{ $feedback->fioPlaceholderTitle }}</td>
                                            <td>{{ $feedback->emailTitle }}</td>
                                            <td>{{ $feedback->emailPlaceholderTitle }}</td>
                                            <td>{{ $feedback->phoneTitle }}</td>
                                            <td>{{ $feedback->phonePlaceholderTitle }}</td>
                                            <td>{{ $feedback->messageTitle }}</td>
                                            <td>{{ $feedback->messagePlaceholderTitle }}</td>
                                            <td>{{ $feedback->messageDescriptionTitle }}</td>
                                            <td>{{ $feedback->messageDescriptionPlaceholderTitle }}</td>
                                            <td>{{ $feedback->language->code }}</td>
                                            <td>
                                                <div class="btn-toolbar" role="toolbar"
                                                     aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <a class="btn btn-outline-primary btn-sm mr-2"
                                                           href="{{ route('admin.page-feedback.show', $feedback) }}"><i
                                                                class="fas fa-info-circle"></i></a>
                                                        <form method="POST" class="deleteHeaderForm" action="{{ route('admin.page-feedback.destroy', $feedback) }}">
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
                            {{ $feedbacks->links('vendor.pagination.bootstrap-4') }}
                        </div>
                        <div class="card-footer clearfix" style="display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="feedbackPageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Новая страница расчета</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ route('admin.page-feedback.store') }}">
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
                            <label for="headerTitle">Заголовок формы</label>
                            <input type="text" class="form-control @error('headerTitle') is-invalid @enderror" id="headerTitle"
                                   name="headerTitle" value="{{ old('headerTitle') }}">
                            @error('headerTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fioTitle">Заголовок "ФИО"</label>
                            <input type="text" class="form-control @error('fioTitle') is-invalid @enderror" id="fioTitle"
                                   name="fioTitle" value="{{ old('fioTitle') }}">
                            @error('fioTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="fioPlaceholderTitle">Подсказка "ФИО"</label>
                            <input type="text" class="form-control @error('fioPlaceholderTitle') is-invalid @enderror" id="fioPlaceholderTitle"
                                   name="fioPlaceholderTitle" value="{{ old('fioPlaceholderTitle') }}">
                            @error('fioPlaceholderTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="emailTitle">Заголовок "EMAIL"</label>
                            <input type="text" class="form-control @error('emailTitle') is-invalid @enderror" id="emailTitle"
                                   name="emailTitle" value="{{ old('emailTitle') }}">
                            @error('emailTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="emailPlaceholderTitle">Подсказка "EMAIL"</label>
                            <input type="text" class="form-control @error('emailPlaceholderTitle') is-invalid @enderror" id="emailPlaceholderTitle"
                                   name="emailPlaceholderTitle" value="{{ old('emailPlaceholderTitle') }}">
                            @error('emailPlaceholderTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phoneTitle">Заголовок "Телефон"</label>
                            <input type="text" class="form-control @error('phoneTitle') is-invalid @enderror" id="phoneTitle"
                                   name="phoneTitle" value="{{ old('phoneTitle') }}">
                            @error('phoneTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phonePlaceholderTitle">Подсказка "Телефон"</label>
                            <input type="text" class="form-control @error('phonePlaceholderTitle') is-invalid @enderror" id="phonePlaceholderTitle"
                                   name="phonePlaceholderTitle" value="{{ old('phonePlaceholderTitle') }}">
                            @error('phonePlaceholderTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="messageTitle">Заголовок "Тема"</label>
                            <input type="text" class="form-control @error('messageTitle') is-invalid @enderror" id="messageTitle"
                                   name="messageTitle" value="{{ old('messageTitle') }}">
                            @error('messageTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="messagePlaceholderTitle">Подсказка "Тема"</label>
                            <input type="text" class="form-control @error('messagePlaceholderTitle') is-invalid @enderror" id="messagePlaceholderTitle"
                                   name="messagePlaceholderTitle" value="{{ old('messagePlaceholderTitle') }}">
                            @error('messagePlaceholderTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="messageDescriptionTitle">Заголовок "Описание"</label>
                            <input type="text" class="form-control @error('messageDescriptionTitle') is-invalid @enderror" id="messageDescriptionTitle"
                                   name="messageDescriptionTitle" value="{{ old('messageDescriptionTitle') }}">
                            @error('messageDescriptionTitle')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="messageDescriptionPlaceholderTitle">Подсказка "Описание"</label>
                            <input type="text" class="form-control @error('messageDescriptionPlaceholderTitle') is-invalid @enderror" id="messageDescriptionPlaceholderTitle"
                                   name="messageDescriptionPlaceholderTitle" value="{{ old('messageDescriptionPlaceholderTitle') }}">
                            @error('messageDescriptionPlaceholderTitle')
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
