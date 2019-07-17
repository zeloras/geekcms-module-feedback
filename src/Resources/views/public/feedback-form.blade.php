<div class="col-12">
    <h3>{{ Translate::get('module_feedback::public/main.title') }}</h3>
    <form method="post" action="{{ route('feedback.request') }}">
        @csrf
        <table class="display table table-striped table-bordered">
            <tbody>
            <tr>
                <td>{{ Translate::get('module_feedback::public/main.first_name') }}</td>
                <td>
                    <input type="text" value="{{ old('first_name') }}" name="first_name" class="form-control" placeholder="geekcms@localhost">
                </td>
            </tr>
            <tr>
                <td>{{ Translate::get('module_feedback::public/main.last_name') }}</td>
                <td>
                    <input type="text" value="{{ old('last_name') }}" name="last_name" class="form-control" placeholder="Geekcms">
                </td>
            </tr>
            <tr>
                <td>{{ Translate::get('module_feedback::public/main.email') }}</td>
                <td>
                    <input type="text" value="{{ old('email') }}" name="email" class="form-control" placeholder="support@localhost">
                </td>
            </tr>
            <tr>
                <td colspan="2">{{ Translate::get('module_feedback::public/main.message') }}</td>
            </tr>
            <tr>
                <td colspan="2">
                    <textarea name="message" class="form-control">{{ old('message') }}</textarea>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="form-group text-center pt-3">
            <button type="submit" class="btn btn-inline btn-success btn-lg">{{Translate::get('module_feedback::public/main.send')}}</button>
        </div>
    </form>
</div>