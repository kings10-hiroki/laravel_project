@extends('layouts.album')

@section('content')
<div class="container">
    <h3>{{ $photo->title }}</h3>
    <p>{{ $photo->description }}</p>
    <div style="display: flex;">
        <a href="{{ route('album-show', $photo->album->id) }}" class="btn btn-info">Go Back</a>
        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal">
            Delete
        </button>
        <!-- Modal -->
        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">画像を削除しますか？</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        この操作を元に戻すことはできません。
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('photo-delete', $photo->id) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">削除</button>
                        </form>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <img src="/storage/albums/{{ $photo->album_id }}/{{ $photo->photo }}" alt="{{ $photo->photo }}">
    <br>
    <small>Size: {{ $photo->size }}</small>

</div>
@endsection