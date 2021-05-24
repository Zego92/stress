@extends('layouts.admin')

@section('title', 'Обращения')

@push('css')

@endpush

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content-center align-items-center">
                <div class="col-md-12 mt-4">
                    <div class="card">
                        <div class="card-header border-transparent">
                            <h3 class="card-title">Обращения</h3>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>ФИО</th>
                                        <th>Email</th>
                                        <th>Телефон</th>
                                        <th>Тема</th>
                                        <th>Статус</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($feedbacks as $key => $feedback)
                                        <tr @if($feedback->status == 1) class="bg-info"  @elseif($feedback->status == 2) class="bg-warning" @elseif($feedback->status == 3) class="bg-success" @endif>
                                            <td>{{ $key +1 }}</td>
                                            <td>{{ $feedback->fio }}</td>
                                            <td>{{ $feedback->email }}</td>
                                            <td>{{ $feedback->phone }}</td>
                                            <td>{{ $feedback->title }}</td>
                                            <td>{{ $feedback->status }}</td>
{{--                                            <td>@if($feedback->status == 1) Получен @elseif($feedback->status == 2) В обработке @elseif($feedback->status == 3) Обработан @endif</td>--}}
                                            <td>
                                                <div class="btn-toolbar" role="toolbar"
                                                     aria-label="Toolbar with button groups">
                                                    <div class="btn-group mr-2" role="group" aria-label="First group">
                                                        <a class="btn btn-outline-primary mr-2"
                                                           href="{{ route('admin.feedbacks.show', $feedback) }}"><i
                                                                class="fas fa-info-circle"></i></a>
                                                        <form method="POST" class="deleteFeedbackForm"
                                                              action="{{ route('admin.feedbacks.destroy', $feedback) }}">
                                                            @csrf
                                                            <input type="hidden" name="_method" value="DELETE">
                                                            <button type="submit" class="btn btn-outline-danger deleteFeedback deleteForm">
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
                            {{ $feedbacks->links('vendor.pagination.bootstrap-4') }}
                        </div>
                        <div class="card-footer clearfix" style="display: block;"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')

@endpush
