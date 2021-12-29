<?php

namespace App\Http\Controllers;

use App\Models\Favourite;
use Illuminate\Http\Request;

class FavouritesController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $fav = Favourite::updateOrCreate(
            ['user_id' => $request->input('userID'), 'advertisement_id' => $request->input('adID')],
            ['favourite' => $request->input('favourite')]
        );

        return back()->withInput();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        // dd("aaaa");
        $ad = Favourite::where('id', $id)->update([
            'favourite' => $request->input('favourite'),
            'user_id' => $request->input('userID'),
            'advertisement_id' => $request->input('adID'),
        ]);

        return back()->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
}
