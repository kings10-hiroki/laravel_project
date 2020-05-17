<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use App\Services\HttpClient;

class RequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client = new Client();

        $response = $client->get('http://192.168.99.100/api/items');

        $items = json_decode($response->getBody()->getContents());

        return view('request.index')->with('items', $items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('request.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, HttpClient $httpClient)
    {
        $this->validate($request, [
            'text' => 'required',
            'body' => 'required'
        ]);

        $client = new Client();

        try {
            $response = $client->post('http://192.168.99.100/api/items?text=' . $request->input('text') . '&body=' . $request->input('body'));
        } catch (RequestException $e) {
            if ($e->hasResponse()) {
                $msg = $e->getResponse();
            } else {
                $msg = 'アイテムの登録に失敗しました';
            }

            return redirect()->to('/request')->with('error', $msg);
        }

        return redirect()->to('/request')->with('success', 'アイテムの登録に成功しました');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = new Client();

        $response = $client->get('http://192.168.99.100/api/items/' . $id);

        $item = json_decode($response->getBody()->getContents());

        return view('request.edit')->with('item', $item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  \App\Services\HttpClient $httpClient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id, HttpClient $httpClient)
    {
        $this->validate($request, [
            'text' => 'required',
            'body' => 'required'
        ]);

        $response = $httpClient->updateData($id, $request);

        if ($response->getStatusCode() === 200) {
            return redirect()->to('/request')->with('success', 'アイテムの更新に成功しました');
        } else {
            return redirect()->to('/request')->with('error', 'アイテムの更新に失敗しました');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, HttpClient $httpClient)
    {
        $msg = $httpClient->deleteData($id);

        if ($msg) {
            return redirect()->to('/request')->with('success', 'アイテムの削除に成功しました');
        } else {
            return redirect()->to('/request')->with('error', 'アイテムの削除に失敗しました');
        }
    }
}
