@extends('layouts.mail')

@section('content')
<div class="container">
    <div class="row">
        <h1>send Message</h1>
        <div class="col-md-6 mx-auto">
            <form method="POST" action="{{ route('send') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="to">To</label>
                    <select name="to" id="to" class="form-control">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}, {{ $user->email }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject"
                        value="{{ $subject }}">
                </div>
                <div class="form-group">
                    <label for="body">Message</label>
                    <textarea class="form-control" id="body" name="body" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>
</div>
@endsection