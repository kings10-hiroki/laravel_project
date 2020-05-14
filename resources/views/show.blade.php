@extends('layouts.html')

@include('includes.messages')

@section('content')
<h1>{{ $todo->title }}</h1>
<p>{{ $todo->content }}</p>
<div class="badge badge-danger">{{ $todo->due }}</div>

<hr>
<a href="/todo" class="btn btn-outline-dark">戻る</a>
@endsection

@section('sidebar')
@parent
<p>This is appended to the sidebar</p>
@endsection