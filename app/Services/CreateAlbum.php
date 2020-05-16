<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;


class CreateAlbum
{
    private $filenameWithExtension;
    private $filename;
    private $extention;
    private $filenameToStore;

    /**
     * データベースに保存する「ファイル名 + _unixtime + 拡張子」のカラム名取得
     *
     * @param  $request->file('columnName') $columnName
     * @return $filenameToStore
     */
    public function createFilenameToStore($columnName)
    {
        // ファイル名.拡張子
        $filenameWithExtension = $columnName->getClientOriginalName();

        // ファイル名
        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        // 拡張子
        $extention = $columnName->getClientOriginalExtension();

        // ファイル名 + _unixtime + 拡張子
        // ex) 1_1589594334.jpg
        $filenameToStore = $filename . '_' . time() . '.' . $extention;

        return $filenameToStore;
    }

    public function storeAlbumData($request, $model, $filename)
    {
        $model->name = $request->input('name');
        $model->description = $request->input('description');
        $model->cover_image = $filename;
        $model->save();
    }

    public function storePhotoData($request, $model, $filename)
    {
        $model->title = $request->input('title');
        $model->description = $request->input('description');
        $model->photo = $filename;
        $model->size = $request->file('photo')->getSize();
        $model->album_id = $request->input('album-id');
        $model->save();
    }
}
