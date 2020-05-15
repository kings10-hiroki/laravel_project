@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.messages')
            <div class="card">
                <div class="card-header">
                    <div>Edit Listing</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/listings/{{ $listing->id }}">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="name">Enter your name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ $listing->name }}">
                        </div>
                        <div class="form-group">
                            <label for="address">Enter your address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                value="{{ $listing->address }}">
                        </div>
                        <div class="form-group">
                            <label for="website">Enter your website</label>
                            <input type="text" class="form-control" id="website" name="website"
                                value="{{ $listing->website }}">
                        </div>
                        <div class="form-group">
                            <label for="email">Enter your email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $listing->email }}">
                        </div>
                        <div class="form-group">
                            <label for="phone">Enter your phone</label>
                            <input type="text" class="form-control" id="phone" name="phone"
                                value="{{ $listing->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="bio">Enter your bio</label>
                            <input type="text" class="form-control" id="bio" name="bio" value="{{ $listing->bio }}">
                        </div>
                        <a href="/home" class="btn btn-outline-dark">戻る</a>
                        <button type="submit" class="btn btn-outline-primary">更新</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection