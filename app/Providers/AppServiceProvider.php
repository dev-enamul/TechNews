<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Post;

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
        $settingShareData=Setting::get()->first();
        view()->share('settingShareData',$settingShareData);


        $categoryShareData = Category::where('type',1)->get();
        view()->share('categoryShareData',$categoryShareData);

        $popularShareData = Post::where('status',1)->with(['creator','comments'])->orderBy('view_count','desc')->limit(4)->get();
        view()->share('popularShareData',$popularShareData);

    }
}
