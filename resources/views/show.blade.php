@extends('layouts.html')

@include('includes.messages')

@section('content')
<h1>{{ $todo->title }}</h1>
<p>{{ $todo->content }}</p>
<div class="badge badge-danger">{{ $todo->due }}</div>
<br>
<a href="/todo/{{ $todo->id }}/edit" class="btn btn-outline-success mt-2">編集</a>
<button type="button" class="btn btn-outline-danger ml-4 mt-2" data-toggle="modal" data-target="#deleteModal">
    削除
</button>

<!-- Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Todoを削除しますか？</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Todoを削除するとTodoを再び開くことはできなくなります。この操作を元に戻すことはできません。
            </div>
            <div class="modal-footer">
                <form action="/todo/{{ $todo->id }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
            </div>
        </div>
    </div>
</div>

<hr>

<a href="/todo" class="btn btn-outline-dark">戻る</a>
@endsection

@section('sidebar')
@parent
<p>This is appended to the sidebar</p>
@endsection