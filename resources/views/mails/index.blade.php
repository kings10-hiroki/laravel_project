@extends('layouts.mail')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Inbox</h2>
            @if (count($mails) > 0)
            <ul class="list-group">
                @foreach ($mails as $mail)
                <a href="{{ route('read', $mail->id )}}">
                    <li class="list-group-item">
                        <i class="far fa-envelope"></i> From : <strong>{{ $mail->userFrom->name }},
                            {{ $mail->userFrom->email }}</strong>
                        | Subject: {{ $mail->subject }}
                    </li>
                </a>
                @endforeach
            </ul>
            @else
            <p>No messages!</p>
            @endif
        </div>
    </div>
</div>
@endsection