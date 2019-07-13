<div style="background: #ff7758;padding: 15px;margin:0;font-size: 18px;">
    <h2 style="text-align: center;color:#fff;font-size: 28px;text-transform: uppercase;">Новое сообщения</h2>

    <p style="background: #e0453a;color:#fff;padding: 15px;font-weight: bold;border-bottom: 3px solid #fff;">
        <span style="font-weight: normal">Имя:</span> {{ $lead->first_name }}
    </p>

    <p style="background: #e0453a;color:#fff;padding: 15px;font-weight: bold;border-bottom: 3px solid #fff;">
        <span style="font-weight: normal">Фамилия:</span> {{ $lead->last_name }}
    </p>

    <p style="background: #e0453a;color:#fff;padding: 15px;font-weight: bold;border-bottom: 3px solid #fff;">
        <span style="font-weight: normal">Email:</span> {{ $lead->email }}
    </p>

    <p style="background: #e0453a;color:#fff;padding: 15px;font-weight: bold;border-bottom: 3px solid #fff;">
        <span style="font-weight: normal">Телефон:</span> {{ $lead->phone }}
    </p>

    <p style="background: #e0453a;color:#fff;padding: 15px;font-weight: bold;border-bottom: 3px solid #fff;">
        <span style="font-weight: normal">Телефон (дополнительно):</span> {{ $lead->phone_second }}
    </p>

    <p style="background: #e0453a;color:#fff;padding: 15px;font-weight: bold;border-bottom: 3px solid #fff;">
        <span style="font-weight: normal">Сообщения:</span> <br>

        {{ $lead->message }}
    </p>

    <p style="color:#000;font-size: 18px;">
        Для быстрого перехода в панель администрирование,
        <a href="{{ route('admin.feedback') }}" style="color:#fff;font-weight: bold;font-size: 15px;">
            перейдите по ссылке
        </a>
    </p>

</div>