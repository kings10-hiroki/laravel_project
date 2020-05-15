<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ContactDB;
use App\Models\Listing;
use App\Http\Requests\ListRequest;

class ListingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listings = Listing::all();

        return view('listing');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('listing.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\ListRequest  $request
     * @param  ContactDB  $contactDB
     * @param  Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function store(ListRequest $request, ContactDB $contactDB, Listing $listing)
    {
        $contactDB->storeData($request, $listing);

        return redirect()->to('/home')->with('success', 'Listing created successfully');
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
        $listing = Listing::find($id);

        return view('listing.edit')->with('listing', $listing);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\ListRequest  $request
     * @param  int  $id
     * @param  ContactDB  $contactDB
     * @return \Illuminate\Http\Response
     */
    public function update(ListRequest $request, $id, ContactDB $contactDB)
    {
        $listing = Listing::find($id);

        $contactDB->updateData($request, $listing);

        return redirect()->to('/home')->with('success', 'Listing edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
