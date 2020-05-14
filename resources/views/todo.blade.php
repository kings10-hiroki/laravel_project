@extends('layouts.html')

@include('includes.messages')

@section('content')
<h1>Todo</h1>

@if (count($todos) > 0)
@foreach ($todos as $todo)
<div class="card">
    <ul class="list-group list-group-flush">
        <li class="list-group-item flex">
            <div>
                <i class="far fa-check-square icon-square"></i>
            </div>
            <div>
                <h2><a href="todo/{{ $todo->id }}">{{ $todo->title }}</a></h2>
                <span class="badge badge-danger">{{ $todo->due }}</span>
            </div>
        </li>
    </ul>
</div>
@endforeach
@endif
@endsection

@section('sidebar')
@parent
<p>This is appended to the sidebar</p>
@endsection