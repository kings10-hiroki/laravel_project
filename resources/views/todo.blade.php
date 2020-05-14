@extends('layouts.html')

@include('includes.messages')

@section('content')
<h1>Todo</h1>

@if (count($todos) > 0)
@foreach ($todos as $todo)
<div class="card">
    <div class="card-header flex">
        <i class="far fa-check-square icon-square"></i>
        <h2>{{ $todo->title }}</h2>
    </div>
    <div class="card-body">
        <h3>{{ $todo->content }}</h3>
        <span class="badge badge-danger">{{ $todo->due }}</span>
    </div>
</div>
@endforeach
@endif
@endsection

@section('sidebar')
@parent
<p>This is appended to the sidebar</p>
@endsection