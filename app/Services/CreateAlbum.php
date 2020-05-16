<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;


class CreateAlbum
{
    private $filenameWithExtension;
    private $filename;
    private $extention;
    private $filenameToStore;

    public function createFilenameToStore($request)
    {
        // ファイル名.拡張子
        $filenameWithExtension = $request->file('cover-image')->getClientOriginalName();

        // ファイル名
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        // 拡張子
        $extention = $request->file('cover-image')->getClientOriginalExtension();

        // ファイル名 + _unixtime + 拡張子
        // ex) 1_1589594334.jpg
        $filenameToStore = $filename . '_' . time() . '.' . $extention;

        return $filenameToStore;
    }

    public function storeData($request, $model, $filename)
    {
        $model->name = $request->input('name');
        $model->description = $request->input('description');
        $model->cover_image = $filename;
        $model->save();
    }
}
