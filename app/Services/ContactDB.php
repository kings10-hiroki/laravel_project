<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;


class ContactDB
{
    public function storeDataToDB($request, $listing)
    {
        $listing->user_id = Auth::id();
        $listing->name = $request->input('name');
        $listing->address = $request->input('address');
        $listing->website = $request->input('website');
        $listing->email = $request->input('email');
        $listing->phone = $request->input('phone');
        $listing->bio = $request->input('bio');
        $listing->save();
    }
}
