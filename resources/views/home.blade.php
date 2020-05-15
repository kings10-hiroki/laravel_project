@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
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
                            <th>#</th>
                            <th>会社名</th>
                            <th>住所</th>
                            <th>URL</th>
                            <th>Eメール</th>
                            <th>電話番号</th>
                            <th>メモ</th>
                            <th></th>
                        </tr>
                        @foreach ($listings as $listing)
                        <tr>
                            {{-- 現在の繰り返し数（初期値1） --}}
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $listing->name }}</td>
                            <td>{{ $listing->address }}</td>
                            <td>{{ $listing->website }}</td>
                            <td>{{ $listing->email }}</td>
                            <td>{{ $listing->phone }}</td>
                            <td>{{ $listing->bio }}</td>
                            <td>
                                <a href="/listings/{{ $listing->id }}/edit" class="btn btn-success">編集</a>
                            </td>
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