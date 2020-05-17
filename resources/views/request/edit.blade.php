@extends('layouts.request')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Edit new Item</h2>
            <form action="/request/{{ $item->id }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="text">Text</label>
                    <input type="text" class="form-control" id="text" name="text" placeholder="Enter text"
                        value="{{ $item->text }}">
                </div>
                <div class="form-group">
                    <label for="body">Body</label>
                    <input type="text" class="form-control" id="body" name="body" placeholder="Enter body"
                        value="{{ $item->body }}">
                </div>
                <button type="submit" name="button" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
</div>
@endsection