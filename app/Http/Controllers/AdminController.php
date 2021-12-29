<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Models\Advertisement;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Favourite;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CategoriesValidationRequest;
use App\Http\Requests\StoreNewAdmin;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;


class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('/admin/home');
    }

    public function listAds()
    {
        $ads = Advertisement::paginate(3);
        $comments = Comment::all();
        $favourites = Favourite::all();
        $categories = Category::all();

        return view('/admin/adminListAds')
            ->with('ads', $ads)
            ->with('favourites', $favourites)
            ->with('comments', $comments)
            ->with('Categories', $categories);
    }
    
    public function destroy($id)
    {
        $ad = Advertisement::where('id', $id)->delete();
        return redirect('admin/listAds');
    }

    public function comments($id)
    {
        $ad = Advertisement::where('id', $id)->get();
        $comments = Comment::where('adID', $id)->paginate(3);
        return view('/admin/adminListComments')
            ->with('comments', $comments)
            ->with('ad', $ad);
    }

    public function commentDelete($id)
    {
        $comments = Comment::where('id', $id)->delete();
        $adID=Comment::where('id', $id)->pluck('adID');
        return back()->withInput();
    }

    public function favourites($id)
    {
        $add = Advertisement::where('id', $id)->get();
        // dd($add);
        $favourites=Favourite::where('advertisement_id', $id)->get();
        $UserIDsOfFavourites=Favourite::where('advertisement_id', $id)->pluck('user_id')->toArray();
        // dd($favourites);
        $users = User::whereIn('id', $UserIDsOfFavourites)->paginate(1);
        return view('/admin/adminListFavourites')
            ->with('add', $add)
            ->with('users', $users)
            ->with('favourites', $favourites);
    }


// ----------------------------------------------------------------------------------
    
    public function listCategories()
    {
        $categories = Category::paginate(3);
        // $adssCount = DB::table('advertisements')->select(['categoryID as categoryID', DB::raw('COUNT(categoryID) as count')])->groupBy('categoryID')->get();
        $adssCount = DB::table('advertisements')->groupBy('categoryID')->select(['categoryID', DB::raw('COUNT(categoryID) as count')])->get();
        // pishnahad ostad estefade az has many beyne category va ads
        
        // dd($categories);
        // dd($adssCount);
        return view('/admin/adminListCategories')
        ->with('adssCount', $adssCount)
        ->with('Categories', $categories);
    }

    public function editCategories(Request $request, $id)
    {
        $ad = Category::where('id', $id)->update([
            'name' => $request->input('newCatName'),
        ]);
        return redirect('admin/listCategories');
    }

    public function destroyCategories($id)
    {
        $ad = Category::where('id', $id)->delete();
        return redirect('admin/listCategories');
    }

    public function createCategories()
    {
        return view('/admin/adminCreateCategories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCategories(Request $request)
    {
        
        $ad = Category::create([
            'name' => $request->input('title'),
            'nameEn' => $request->input('description'),
        ]);


        Log::info('saving an category by admin by id: '. Auth::user()->id);

        return redirect('admin/listCategories');
    }


    public function AdminListAdsOfThisCategory($id)
    {
        
        $ads = Advertisement::where('categoryID', $id)->paginate(3);
        $comments = Comment::all();
        $favourites = Favourite::all();
        $cat = Category::where('id', $id)->get();
        return view('/admin/adminListAdsBasedOnCategory')
        ->with('cat', $cat)
        ->with('ads', $ads)
        ->with('favourites', $favourites)
        ->with('comments', $comments);
    }
    
// --------------------------------------------------------------------------
    public function listAdmins()
    {
        $admins = User::where('is_admin','yes')->paginate(3);

        return view('/admin/adminListAdmins')
            ->with('admins', $admins);
    }
    
    public function destroyAdmins($id)
    {
        $admin = User::where('id',$id)->delete();
        return redirect('admin/listAdmins');
    }
    
    public function createAdmins(StoreNewAdmin $request)
    {
        
        $user = User::create([
            'is_admin' => $request->input('isAdmin'),
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('email')),
            'email_verified_at'=> date("Y-m-d H:i:s"),
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")
        ]);

        Log::info('saving a new admin by admin by id: '. Auth::user()->id);

        return redirect('admin/listAdmins');
    }
}

