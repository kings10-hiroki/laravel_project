@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.messages')
            <div class="card">
                <div class="card-header flex">
                    <div>Create Listing</div>
                </div>
                <div class="card-body">
                    <form method="POST" action="/listings">
                        @csrf
                        <div class="form-group">
                            <label for="name">Enter your name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="address">Enter your address</label>
                            <input type="text" class="form-control" id="address" name="address"
                                placeholder="Enter address">
                        </div>
                        <div class="form-group">
                            <label for="website">Enter your website</label>
                            <input type="text" class="form-control" id="website" name="website"
                                placeholder="Enter website">
                        </div>
                        <div class="form-group">
                            <label for="email">Enter your email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="phone">Enter your phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter phone">
                        </div>
                        <div class="form-group">
                            <label for="bio">Enter your bio</label>
                            <input type="text" class="form-control" id="bio" name="bio" placeholder="Enter bio">
                        </div>
                        <a href="/home" class="btn btn-outline-dark">戻る</a>
                        <button type="submit" class="btn btn-outline-primary">登録</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection