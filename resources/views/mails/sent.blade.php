@extends('layouts.mail')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Sent Mail</h2>
            @if (count($mails) > 0)
            @foreach ($mails as $mail)
            <div class="card">
                <div class="card-header">
                    To : <strong>{{ $mail->userTo->name }}, {{ $mail->userTo->email }}</strong>
                    | Subject: {{ $mail->subject }}
                    @if ($mail->read)
                    <span class="badge badge-success" style="float: right;">既読</span>
                    @endif
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $mail->body }}</p>
                    <a href="#" class="btn btn-primary">詳細</a>
                </div>
            </div>
            @endforeach
            @else
            <p>No messages!</p>
            @endif
        </div>

    </div>
</div>
</div>
@endsection