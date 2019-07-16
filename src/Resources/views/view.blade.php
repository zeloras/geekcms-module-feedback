@extends('admin.layouts.main')

@section('title', Translate::get('module_feedback::admin/main.title'))

@section('content')
    <section class="box-typical container pb-3">
        <header class="box-typical-header">
            <div class="tbl-row">
                <div class="tbl-cell tbl-cell-title">
                    <h3>{{ Translate::get('module_feedback::admin/main.title') }}</h3>
                </div>
            </div>
        </header>
        <div class="box-typical-body">
            <div class="table-responsive">
                ---
            </div>
        </div>
    </section>
@endsection
