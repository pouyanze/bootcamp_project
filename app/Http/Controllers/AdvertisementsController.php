<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Favourite;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\AdsValidationRequest;
use Illuminate\Support\Facades\Log;

class AdvertisementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
// -----------------------------------------------------------------------------------
    public function AllAds()
    {
        $ads = Advertisement::paginate(3);
        $comments = Comment::all();
        $favourites = Favourite::all();
        // $cats= Category::where('id', Advertisement::find('categoryID'))->get();
        // dd("$cats");
        return view('/home')
        ->with('ads', $ads)
        ->with('favourites', $favourites)
        ->with('comments', $comments);
        // ->with('cats', $cats);
    }

    public function AdsByOneCategory($id)
    {
        // dd("sss");
        $adsCategorized = Advertisement::where('categoryID', $id)->get(); 
        $idsOfAdsCategorized = Advertisement::where('categoryID', $id)->pluck('id')->toArray();
        // dd($ads);
        $commentsCategorized = Comment::whereIn('adID',$idsOfAdsCategorized)->get();
        $catsCategorized = Category::where('id',$id)->get();
        $favourites = Favourite::all();
        // dd($commentsCategorized);
        return view('/homeCategorized')
            ->with('ads', $adsCategorized)
            ->with('favourites', $favourites)
            ->with('comments', $commentsCategorized)
            ->with('Categories', $catsCategorized);
    }
    // --------------------------------------ads of user--------------------------------------
    public function userAdsList()
    {
        $ads = Advertisement::where('userID', Auth::user()->id)->get();
        $idsOfads=DB::table('advertisements')->where('userID', Auth::user()->id)->pluck('id')->toArray();
        $categoryIDofAds=DB::table('advertisements')->where('userID', Auth::user()->id)->pluck('categoryID')->toArray();
        // dd($idOfads);

        $comments = Comment::whereIn('adID',$idsOfads)->get();
        $cats = Category::whereIn('id',$categoryIDofAds)->get();
        // dd($comments);
        $cats = Category::whereIn('id',$categoryIDofAds)->get();
        $favourites = Favourite::all();
        return view('ads/userAdsList')
            ->with('ads', $ads)
            ->with('comments', $comments)
            ->with('favourites', $favourites)
            ->with('cats', $cats);
    }

    
    public function UserAdsByOneCategory($id)
    {
        $adsCategorized = Advertisement::where('categoryID', $id)->where('userID', Auth::user()->id)->get();     
        $idsOfAdsCategorized = Advertisement::where('categoryID', $id)->where('userID', Auth::user()->id)->pluck('id')->toArray();
        // dd($ads);
        $commentsCategorized = Comment::whereIn('adID',$idsOfAdsCategorized)->get();
        $catsCategorized = Category::where('id',$id)->get();
        $favourites = Favourite::whereIn('advertisement_id',$idsOfAdsCategorized)->get();
        // dd($commentsCategorized);
        return view('ads/UserAdsByOneCategory')
            ->with('ads', $adsCategorized)
            ->with('comments', $commentsCategorized)
            ->with('favourites', $favourites)
            ->with('cats', $catsCategorized);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('ads/create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdsValidationRequest $request)
    {
        
        $ad = Advertisement::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'price' => $request->input('price'),
            'address' => $request->input('address'),
            'phoneNumber' => $request->input('phoneNumber'),
            'userID' => $request->input('userID'),
            'categoryID' => $request->input('categoryID'),
        ]);


        Log::info('saving an ad for user with id: '. Auth::user()->id);

        return redirect('ads/userAdsList');
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
        // dd("ss");
        $ad = Advertisement::where('id', $id)->update([
            'title' => $request->input('newAdTitle'),
            'description' => $request->input('newAdDescription'),
            'price' => $request->input('newAdAdPrice'),
            'address' => $request->input('newAdAddress'),
            'phoneNumber' => $request->input('newAdPhoneNumber'),
        ]);
        // return redirect('ads/userAdsList');
        return back()->withInput();
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
        $ad = Advertisement::where('id', $id)->delete();
        return redirect('ads/userAdsList');
    }

    public function favourites()
    {
        $id= Auth::user()->id;
        // dd($id);
        $adIdsOfFavs = Favourite::where('user_id', $id)->pluck('advertisement_id')->toArray();
        $ads = Advertisement::whereIn('id', $adIdsOfFavs)->get();
        $categoryIdsOfads = Advertisement::whereIn('id', $adIdsOfFavs)->pluck('categoryID')->toArray();
        $cats = Category::whereIn('id',$categoryIdsOfads)->get();
        $favourites = Favourite::all();

        return view('ads/favourites')
            ->with('ads', $ads)
            ->with('favourites', $favourites)
            ->with('cats', $cats);
    }
    
}
