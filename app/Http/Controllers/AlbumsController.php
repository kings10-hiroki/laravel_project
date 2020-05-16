<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;
use App\Services\CreateAlbum;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('photos')->get();

        return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('albums.create');
    }

    public function store(Request $request, Album $album, CreateAlbum $createAlbum)
    {

        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'cover-image' => 'required|image'
        ]);

        // ストレージに保存するときのファイル名作成
        $filenameToStore = $createAlbum->createFilenameToStore($request);

        // storage/app/public/album_covers直下に保存
        $request->file('cover-image')->storeAs('public/album_covers', $filenameToStore);

        // DBに保存
        $createAlbum->storeData($request, $album, $filenameToStore);

        return redirect('/photoshow/albums')->with('success', 'アルバムを作成しました');
    }
}
