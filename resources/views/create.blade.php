@extends('layouts.html')

@section('content')
<h1>Create new Todo</h1>

@include('includes.messages')

<form method="POST" action="/todo">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title"
            value="{{ old('title') }}">
    </div>
    <div class="form-group">
        <label for="content">Content</label>
        <input type="text" class="form-control" id="content" name="content" placeholder="Enter content"
            value="{{ old('content') }}">
    </div>
    <div class="form-group">
        <label for="due">Due</label>
        <input type="text" class="form-control" id="due" name="due" placeholder="Enter due" value="{{ old('due') }}">
    </div>

    <button type="submit" class="btn btn-primary">登録</button>
</form>

<hr>

<a href="/todo" class="btn btn-outline-dark">戻る</a>

@endsection

@section('sidebar')
@parent
<p>This is appended to the sidebar</p>
@endsection