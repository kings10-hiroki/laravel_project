@extends('layouts.html')

@include('includes.messages')

@section('content')
<h1>{{ $todo->title }}</h1>
<p>{{ $todo->content }}</p>
<div class="badge badge-danger">{{ $todo->due }}</div>
<br>
<a href="/todo/{{ $todo->id }}/edit" class="btn btn-outline-success mt-2">編集</a>

<hr>

<a href="/todo" class="btn btn-outline-dark">戻る</a>
@endsection

@section('sidebar')
@parent
<p>This is appended to the sidebar</p>
@endsection