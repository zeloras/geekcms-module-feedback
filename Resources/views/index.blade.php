@extends('admin.layouts.main')

@section('title', \Translate::get('module_feedback::admin/main.title'))

@section('content')
<table class="table table-hover">
    <thead>
        <tr>
            <th></th>
            <th>#</th>
            <th>{{ \Translate::get('module_feedback::admin/main.field_name') }}</th>
            <th>{{ \Translate::get('module_feedback::admin/main.field_email') }}</th>
            <th>{{ \Translate::get('module_feedback::admin/main.field_phone') }}</th>
            <th>{{ \Translate::get('module_feedback::admin/main.field_second_phone') }}</th>
            <th>{{ \Translate::get('module_feedback::admin/main.field_created') }}</th>
            <th>{{ \Translate::get('module_feedback::admin/main.field_message') }}</th>
        </tr>
    </thead>
    <tbody>
    @foreach($leads as $lead)
        <tr>
            <th>
                @if(!$lead->notify)
                    <span class="badge badge-secondary">{{ \Translate::get('module_feedback::admin/main.new') }}</span>
                    <?php
                    $lead->notify = 1;
                    $lead->save();
                    ?>
                @endif
            </th>
            <td>
                {{ $lead->id }}
            </td>
            <td>{{ $lead->first_name }} {{ $lead->last_name }}</td>
            <td>{{ $lead->email }}</td>
            <td>{{ $lead->phone }}</td>
            <td>{{ $lead->phone_second }}</td>
            <td> {{ $lead->created_at }}</td>
            <td> {{ $lead->message }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
{{ $leads->links() }}
@endsection
