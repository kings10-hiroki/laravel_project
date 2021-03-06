@extends('layouts.request')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto">
            <h2>Item</h2>
            @if (count($items) > 0)
            <div class="list-group">
                @foreach ($items as $item)
                <a href="/request/{{ $item->id }}/edit" class="list-group-item list-group-item-action">
                    <div class="d-flex w-100 justify-content-between">
                        <small>#{{ $item->id }}</small>
                        <h5 class="mb-1">{{ $item->text }}</h5>
                    </div>
                    <p class="mb-1">{{ $item->body }}</p>
                    <small>Donec id elit non mi porta.</small>
                    <form action="/request/{{ $item->id }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="button" class="btn btn-danger">Delete</button>
                    </form>
                </a>
                @endforeach
            </div>
            @else
            <p>No items yet.</p>
            @endif
        </div>
    </div>
</div>
@endsection