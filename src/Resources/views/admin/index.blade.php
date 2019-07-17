@extends('admin.layouts.main')

@section('title', Translate::get('module_feedback::admin/main.title'))

@section('content')
    <section class="box-typical">
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
        <div class="box-typical-body pb-1">
            <section class="tabs-section tab-section__no-border">
                <div class="tabs-section-nav">
                    <div class="tbl">
                        <ul class="nav" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active show" href="#tabs-2-tab-1" role="tab" data-toggle="tab"
                                   aria-selected="true">
                                    <span class="nav-link-in">
                                        {{ Translate::get('module_feedback::admin/main.messages_list') }}
                                    </span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#tabs-2-tab-2" role="tab" data-toggle="tab"
                                   aria-selected="false">
                                    <span class="nav-link-in">
                                        {{ Translate::get('module_feedback::admin/main.message_settings') }}
                                    </span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!--.tabs-section-nav-->

                <div class="tab-content">
                    <div role="tabpanel" class="tab-pane fade in active show" id="tabs-2-tab-1">
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
                    </div><!--.tab-pane-->
                    <div role="tabpanel" class="tab-pane fade" id="tabs-2-tab-2">
                        <form action="{{ route('admin.feedback.save') }}" method="POST">
                            @csrf
                            <table class="display table table-striped table-bordered">
                                <tbody>
                                    <tr>
                                        <td>{{ Translate::get('module_feedback::admin/main.settings.from_address') }}</td>
                                        <td>
                                            <input type="text" value="{{ ConfigManager::get('mail.from.address', old('config.mail.from.address')) }}" name="config[mail.from.address]" class="form-control" placeholder="geekcms@localhost">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ Translate::get('module_feedback::admin/main.settings.from_name') }}</td>
                                        <td>
                                            <input type="text" value="{{ ConfigManager::get('mail.from.name', old('config.mail.from.name')) }}" name="config[mail.from.name]" class="form-control" placeholder="Geekcms">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ Translate::get('module_feedback::admin/main.settings.to_address') }}</td>
                                        <td>
                                            <input type="text" value="{{ ConfigManager::get('mail.to.address', old('config.mail.to.address')) }}" name="config[mail.to.address]" class="form-control" placeholder="support@localhost">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ Translate::get('module_feedback::admin/main.settings.to_name') }}</td>
                                        <td>
                                            <input type="text" value="{{ ConfigManager::get('mail.to.name', old('config.mail.to.name')) }}" name="config[mail.to.name]" class="form-control" placeholder="Support">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ Translate::get('module_feedback::admin/main.settings.from_title') }}</td>
                                        <td>
                                            <input type="text" value="{{ ConfigManager::get('mail.from.title', old('config.mail.from.title')) }}" name="config[mail.from.title]" class="form-control" placeholder="New feedback">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">{{ Translate::get('module_feedback::admin/main.settings.template') }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            @include('feedback::admin.components.wysiwyg', [
                                                'name' => 'config[mail.template]',
                                                'id' => 'mail_template',
                                                'class' => 'mail_template',
                                                'content' => ConfigManager::get('mail.template', old('config.mail.template'))
                                            ])
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-group text-center pt-3">
                                <button type="submit" class="btn btn-inline btn-success btn-lg">{{Translate::get('module_feedback::admin/main.save')}}</button>
                            </div>
                        </form>
                    </div><!--.tab-pane-->
                </div><!--.tab-content-->
            </section>
        </div>
    </section>
@endsection
