@extends('layouts.album')

@section('content')
<h1>Create new photo</h1>
<div class="col-md-4" style="margin: 0 auto;">
    <form method="POST" action="{{ route('photo-store') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="album-id" value="{{ $albumId }}">
        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <input type="text" class="form-control" id="description" name="description" placeholder="Enter description">
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" class="form-control" id="photo" name="photo">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection