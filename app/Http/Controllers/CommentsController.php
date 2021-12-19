<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Comment;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CommentsValidationRequest;
use Illuminate\Support\Facades\Log;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd("aaaa");
        $ad = Comment::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'userID' => $request->input('userID'),
            'adID' => $request->input('adID'),
        ]);

        Log::info('saving a comment for user: '. Auth::user()->id);

        return redirect('ads/list');
    }
    public function store2(Request $request)
    {
        // dd("aaaa");
        $ad = Comment::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'userID' => $request->input('userID'),
            'adID' => $request->input('adID'),
        ]);

        Log::info('saving a comment for user: '. Auth::user()->id);

        return redirect('/home');
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
    public function edit(Request $request, $id)
    {
        $comment = Comment::where('id', $id)->update([
            'title' => $request->input('newAdCommentTitle'),
            'description' => $request->input('newAdCommentDescription'),
        ]);
        return redirect('ads/list');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
