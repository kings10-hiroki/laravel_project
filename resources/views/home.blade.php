@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
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
                            <td>
                                <button type="button" class="btn btn-danger" data-toggle="modal"
                                    data-target="#deleteModal">
                                    削除
                                </button>
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
<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Listを削除しますか？</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ※この操作を元に戻すことはできません。
            </div>
            <div class="modal-footer">
                <form action="/listings/{{ $listing->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>
@endsection