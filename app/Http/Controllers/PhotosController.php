<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use App\Services\CreateAlbum;

class PhotosController extends Controller
{
    public function create(int $albumId)
    {
        return view('photos.create')->with('albumId', $albumId);
    }

    public function store(Request $request, Photo $photo, CreateAlbum $createAlbum)
    {

        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'photo' => 'required|image'
        ]);

        // ストレージに保存するときのファイル名作成
        $filenameToStore = $createAlbum->createFilenameToStore($request->file('photo'));

        // storage/app/public/album_covers直下に保存
        $request->file('photo')->storeAs('public/albums/' . $request->input('album-id'), $filenameToStore);

        // DBに保存
        $createAlbum->storePhotoData($request, $photo, $filenameToStore);

        return redirect('/photoshow/albums/' . $request->input('album-id'))->with('success', '画像をアップロードしました');
    }
}
