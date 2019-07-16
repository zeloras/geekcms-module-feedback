@extends('admin.layouts.main')

@section('title', Translate::get('module_feedback::admin/main.title'))

@section('content')
    <section class="box-typical container pb-3">
        <header class="box-typical-header">
            <div class="tbl-row">
                <div class="tbl-cell tbl-cell-title">
                    <h3>{{ Translate::get('module_feedback::admin/main.title') }}</h3>
                </div>
                <div class="tbl-cell tbl-cell-action-bordered">
                    <button type="button" data-token="{!! csrf_token() !!}" data-inputs=".delete-item-check:checked"
                            data-toggle="tooltip" data-placement="left"
                            data-original-title="{{ Translate::get('module_feedback::admin/main.feedback_delete_selected') }}"
                            data-text="{{ Translate::get('module_feedback::admin/main.action_delete_confirm') }}"
                            data-action="{{ route('admin.feedback.delete.all') }}" class="action-btn delete-all">
                        <i class="font-icon font-icon-trash"></i>
                    </button>
                </div>
            </div>
        </header>
        <div class="box-typical-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-custom">
                    <thead>
                    <tr>
                        <th class="table-check"></th>
                        <th class="table-title">
                            {{ Translate::get('module_feedback::admin/main.field_email') }}
                        </th>
                        <th>
                            {{ Translate::get('module_feedback::admin/main.field_name') }}
                        </th>
                        <th>
                            {{ Translate::get('module_feedback::admin/main.field_created') }}
                        </th>
                        <th class="table-icon-cell table-actions"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($mails as $mail)
                        <tr>
                            <td class="table-check">
                                <div class="checkbox checkbox-only">
                                    <input type="checkbox" class="delete-item-check" id="table-check-{{ $mail->id }}"
                                           value="{{ $mail->id }}">
                                    <label for="table-check-{{ $mail->id }}"></label>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex flex-row justify-content-between">
                                    <a href="{{ route('admin.feedback.view', ['id' => $mail->id]) }}">
                                        {{ $mail->email }}
                                    </a>
                                </div>
                            </td>
                            <td class="color-blue">
                                {{ $mail->name }}
                            </td>
                            <td class="table-date">
                                {{ $mail->created_at }} <i class="font-icon font-icon-clock"></i>
                            </td>
                            <td class="table-icon-cell">
                                <a href="{{ route('admin.feedback.view', ['id' => $mail->id]) }}"
                                   data-toggle="tooltip" data-placement="left"
                                   data-original-title="{{ Translate::get('module_feedback::admin/main.view_mail') }}"
                                   class="btn-link btn btn-success-outline btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.feedback.delete', ['id' => $mail->id]) }}"
                                   data-toggle="tooltip" data-placement="left"
                                   data-original-title="{{ Translate::get('module_feedback::admin/main.action_delete') }}"
                                   class="btn-link btn btn-success-outline btn-sm"
                                   data-delete="{{ Translate::get('module_feedback::admin/main.action_delete_confirm') }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
