@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @include('includes.messages')
            <div class="card">
                <div class="card-header flex" style="justify-content: space-between;">
                    <div>Your listing</div>
                    <a href="/listings/create" class="btn btn-primary">追加</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    @if (count($listings))
                    <table class="table table-striped">
                        <tr>
                            <th>Company</th>
                        </tr>
                        @foreach ($listings as $listing)
                        <tr>
                            <td>{{ $listing->name }}</td>
                        </tr>
                        @endforeach
                    </table>
                    @else
                    <p>You don't have any listings yet.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection