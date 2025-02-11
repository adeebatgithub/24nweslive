<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\TopAdvertisement;
use App\Models\SidebarAdvertisement;
use App\Models\Category;
use App\Models\Page;
use App\Models\LiveChannel;
use App\Models\Post;
use App\Models\OnlinePoll;
use App\Models\SocialItem;
use App\Models\Setting;
use App\Models\Language;

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

        Paginator::useBootstrap();

        $top_ad_data = TopAdvertisement::where('id',1)->first();
        $sidebar_top_ad = SidebarAdvertisement::where('sidebar_ad_location','Top')->get();
        $sidebar_bottom_ad = SidebarAdvertisement::where('sidebar_ad_location','Bottom')->get();
        $sidebar_ad1 = SidebarAdvertisement::where('sidebar_ad_location','Ad1')->first();
        $sidebar_ad2 = SidebarAdvertisement::where('sidebar_ad_location','Ad2')->first();
        $sidebar_ad3 = SidebarAdvertisement::where('sidebar_ad_location','Ad3')->first();
        $sidebar_ad4 = SidebarAdvertisement::where('sidebar_ad_location','Ad4')->first();
        $sidebar_StickyAd1 = SidebarAdvertisement::where('sidebar_ad_location','StickyAd1')->first();
        $sidebar_StickyAd2 = SidebarAdvertisement::where('sidebar_ad_location','StickyAd1')->first();
        $categories = Category::with('rSubCategory')->where('show_on_menu','Show')->orderBy('category_order','asc')->get();
                
        $social_item_data = SocialItem::get();
        $setting_data = Setting::where('id',1)->first();
        $language_data = Language::get();
        $default_lang_data = Language::where('is_default','Yes')->first();

        view()->share('global_top_ad_data', $top_ad_data);
        view()->share('global_sidebar_top_ad', $sidebar_top_ad);
        view()->share('global_sidebar_bottom_ad', $sidebar_bottom_ad);
        view()->share('global_sidebar_ad1', $sidebar_ad1);
        view()->share('global_sidebar_ad2', $sidebar_ad2);
        view()->share('global_sidebar_ad3', $sidebar_ad3);
        view()->share('global_sidebar_ad4', $sidebar_ad4);
        view()->share('global_sidebar_StickyAd1', $sidebar_StickyAd1);
        view()->share('global_sidebar_StickyAd2', $sidebar_StickyAd2);
        view()->share('global_categories', $categories);
        view()->share('global_social_item_data', $social_item_data);
        view()->share('global_setting_data', $setting_data);
        view()->share('global_language_data', $language_data);
        view()->share('global_short_name', $default_lang_data->short_name);
    }
}
