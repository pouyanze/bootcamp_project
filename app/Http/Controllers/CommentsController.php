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

        Log::info('saving a comment by user: '. Auth::user()->id);

        return back()->withInput();
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
        $comment = Comment::where('id', $id)->update([
            'title' => $request->input('newAdCommentTitle'),
            'description' => $request->input('newAdCommentDescription'),
        ]);
        return back()->withInput();
    }

}
