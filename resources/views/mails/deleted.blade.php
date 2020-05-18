@extends('layouts.mail')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Deleted Mail</h2>
            @if (count($mails) > 0)
            @foreach ($mails as $mail)
            <div class="card">
                <div class="card-header">
                    From : <strong>{{ $mail->userFrom->name }}, {{ $mail->userFrom->email }}</strong>
                    | To : <strong>{{ $mail->userTo->name }}, {{ $mail->userTo->email }}</strong>
                    <br>
                    Subject: {{ $mail->subject }}
                </div>
                <div class="card-body">
                    <p class="card-text">{{ $mail->body }}</p>
                    <a href="{{ route('return', $mail->id) }}" class="btn btn-info btn-sm">Return message to
                        inbox</a>
                </div>
            </div>
            @endforeach
            @else
            <p>No messages!</p>
            @endif
        </div>
    </div>
</div>
@endsection