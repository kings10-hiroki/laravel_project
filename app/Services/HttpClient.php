<?php

namespace App\Services;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class HttpClient
{
    private $path;
    private $response;

    /**
     * フォームに入力された値をDBに更新
     *
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return $response
     */
    public function updateData($id, $request)
    {
        $client = new Client();

        $path = 'http://192.168.99.100/api/items/' . $id . '?text=' . $request->input('text') . '&body=' . $request->input('body') . '&_method=PUT';

        try {
            $response = $client->post($path);
            return $response;
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $response = $e->getResponse();
            } else {
                $response = 'アイテムの更新に失敗しました';
            }
            return $response;
        }
    }

    public function deleteData($id)
    {
        $client = new Client();

        $path = 'http://192.168.99.100/api/items/' . $id . '?_method=DELETE';

        $response = $client->post($path);
        $contents = json_decode($response->getBody()->getContents());
        $success = $contents->success;

        if ($success) {
            return true;
        } else {
            return false;
        }
    }
}
