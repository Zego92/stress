@extends('layouts.admin')

@section('title', 'Контакты')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Контакты</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool text-white" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool text-white" data-toggle="modal"
                                        data-target="#contactModal">
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
                                        <th>Телефоны</th>
                                        <th>Адрес</th>
                                        <th>Время работы</th>
                                        <th>Email</th>
                                        <th>GMAP</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($contacts as $key => $contact)
                                        <tr>
                                            <td>{{ $key +1 }}</td>
                                            <td>{{ $contact->firstPhone }}, {{ $contact->secondPhone }}, {{ $contact->thirdPhone }}</td>
                                            <td>{{ $contact->address }}</td>
                                            <td>С {{ $contact->startTimeWork }} до {{ $contact->endTimeWork }}</td>
                                            <td>{{ $contact->email }}</td>
                                            <td class="gMapsLink">{!! $contact->gMapLink !!}</td>
                                            <td>
                                                <div class="btn-toolbar" role="toolbar"
                                                     aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <a class="btn btn-outline-primary mr-2"
                                                           href="{{ route('admin.contacts.show', $contact) }}"><i
                                                                class="fas fa-info-circle"></i></a>
                                                        <form method="POST" class="deleteContactForm"
                                                              action="{{ route('admin.contacts.destroy', $contact) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-outline-danger deleteContact deleteForm">
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
                            {{ $contacts->links('vendor.pagination.bootstrap-4') }}
                        </div>
                        <div class="card-footer clearfix" style="display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Новый Контакт</h5>
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
                            <label for="firstPhone">Телефон</label>
                            <input type="text" class="form-control @error('firstPhone') is-invalid @enderror" id="firstPhone"
                                   name="firstPhone" value="{{ old('firstPhone') }}">
                            @error('firstPhone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="secondPhone">Телефон</label>
                            <input type="text" class="form-control @error('secondPhone') is-invalid @enderror" id="secondPhone"
                                   name="secondPhone" value="{{ old('secondPhone') }}">
                            @error('secondPhone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="thirdPhone">Телефон</label>
                            <input type="text" class="form-control @error('thirdPhone') is-invalid @enderror" id="thirdPhone"
                                   name="thirdPhone" value="{{ old('thirdPhone') }}">
                            @error('thirdPhone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Адрес</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address"
                                   name="address" value="{{ old('address') }}">
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                                   name="email" value="{{ old('email') }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">Время работы</label>
                            <div class="row">
                                <div class="col-md-6 col-sm-12">
                                    <input title="" type="text" class="form-control startTime @error('startTimeWork') is-invalid @enderror" id="startTime"
                                   name="startTimeWork" value="{{ old('startTimeWork') }}">
                                    @error('startTimeWork')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-6 col-sm-12">
                                    <input title="" type="text" class="form-control endTime @error('endTimeWork') is-invalid @enderror" id="endTime"
                                   name="endTimeWork" value="{{ old('endTimeWork') }}">
                                    @error('endTimeWork')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

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
