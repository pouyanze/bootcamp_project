<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
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
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['layouts.app','/home', 'admin.adminDashboard'], function($view)
        {
            $view->with('Categories', Category::orderBy('name')->get());
        });

        Paginator::useBootstrap();
    }
}
