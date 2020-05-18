@extends('layouts.mail')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Inbox</h2>
            <div class="card">
                <div class="card-header">
                    From : <strong>{{ $mail->userFrom->name }}
                        <br>
                        Email : {{ $mail->userTo->email }}</strong>
                    <br>
                    Subject : {{ $mail->subject }}
                </div>
                <div class="card-body">
                    Message:
                    <p class="card-text">{{ $mail->body }}</p>
                </div>
                <div class="card-body">
                    <a href="{{ route('mail-create', [$mail->userFrom->id, $mail->subject]) }}" class="btn btn-primary">
                        <i class="fas fa-reply"></i>
                    </a>
                    <a href="{{ route('mail-delete', $mail->id) }}" class="btn btn-danger">
                        <i class="fas fa-trash"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection