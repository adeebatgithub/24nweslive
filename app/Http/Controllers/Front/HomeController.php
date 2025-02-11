<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomeAdvertisement;
use App\Models\Setting;
use App\Models\Post;
use App\Models\Tag;
use App\Models\SubCategory;
use App\Models\Video;
use App\Models\LiveChannel;
use App\Models\Category;
use App\Models\Language;
use App\Helper\Helpers;

class HomeController extends Controller
{
    public function index()
    {
       
        Helpers::read_json();

        if(!session()->get('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name;
        } else {
            $current_short_name = session()->get('session_short_name');
        }    
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;
        
        $video_data = Video::where('language_id',$current_language_id)->get();
        $home_ad_data = HomeAdvertisement::where('id',1)->first();
        $setting_data = Setting::where('id',1)->first();
        $post_data = Post::with('rSubCategory')->orderBy('id','desc')->where('language_id',$current_language_id)->get();
        $sub_category_data = SubCategory::with('rPost')->orderBy('sub_category_order','asc')->where('show_on_home','Show')->where('language_id',$current_language_id)->get();
        // $post_crime_data = Post::with('rSubCategory')->orderBy('id','desc')->where('language_id',$current_language_id)->where('sub_category_id',52)->get();
        // $post_crime_data = Post::where('sub_category_id',45)->orderBy('id','desc')->get();
        $post_13days_data = Post::with('rSubCategory')->orderBy('id','desc')->where('language_id',$current_language_id)->where('sub_category_id',49)->get();
        $post_editor_data = Post::with('rSubCategory')->orderBy('id','desc')->where('language_id',$current_language_id)->where('sub_category_id',40)->get();
        $post_crime_data = Post::with('rSubCategory')->orderBy('id','desc')->where('language_id',$current_language_id)->where('sub_category_id',52)->get();
        $post_greeting_data = Post::with('rSubCategory')->orderBy('id','desc')->where('language_id',$current_language_id)->where('sub_category_id',57)->get();
        $post_prayers_data = Post::with('rSubCategory')->orderBy('id','desc')->where('language_id',$current_language_id)->where('sub_category_id',44)->get();
        $category_data = Category::orderBy('category_order','asc')->where('language_id',$current_language_id)->get();
        $live_channel_data = LiveChannel::where('language_id',$current_language_id)->get();
        // dd($post_data[0]);
        return view('front.home', compact('home_ad_data', 'setting_data', 'post_data', 'sub_category_data','video_data','category_data','post_crime_data','post_greeting_data','post_editor_data','post_prayers_data','live_channel_data','post_13days_data'));
    }

    public function get_subcategory_by_category($id)
    {
        Helpers::read_json();
        
        $sub_category_data = SubCategory::where('category_id',$id)->get();
        $response = "<option value=''>".SELECT_SUBCATEGORY."</option>";
        foreach($sub_category_data as $item) {
            $response .= '<option value="'.$item->id.'">'.$item->sub_category_name.'</option>';
        }

        return response()->json(['sub_category_data'=>$response]);
    }

    public function search1(Request $request)
    {
        Helpers::read_json();
        
        $tag_data = Tag::all();
        // $post_data = Post::with('rSubCategory')->orderBy('id','desc');
        $post_data1 = Tag::with('rPost')->orderBy('id','desc');
        if($request->text_item!=''){
            // $post_data = $post_data->where('post_title', 'like', '%'.$request->text_item.'%');
            $post_data1 = $post_data1->where('tag_name', 'like', '%'.$request->text_item.'%');
        }
        // if($request->sub_category!='') {
        //     $post_data = $post_data->where('sub_category_id', $request->sub_category);
        // }
        $post_data1 = $post_data1->paginate(12);

        return view('front.search_result', compact('post_data1'));
    }

public function search(Request $request)
{
   
    Helpers::read_json(); // Remove if not necessary

$query = Post::with('rSubCategory')->orderByDesc('id');

if ($request->filled('text_item')) {
    $query->where(function ($q) use ($request) {
        $q->where('post_title', 'like', '%'.$request->text_item.'%')
          ->orWhere('post_detail', 'like', '%'.$request->text_item.'%')
          ->orWhere('post_title_english', 'like', '%'.$request->text_item.'%');
    });
}
if ($request->filled('text_item')) {
    $query->orWhereHas('tags', function ($q) use ($request) {
        $q->where('tag_name', 'like', '%'.$request->text_item.'%');
    });
}
if ($request->filled('text_item')) {
    $query->orWhereHas('rSubCategory', function ($q) use ($request) {
        $q->where('sub_category_name', 'like', '%'.$request->text_item.'%');
    });
}

// if ($request->filled('sub_category')) {
//     $query->where('sub_category_id', $request->sub_category);
// }

$post_data1 = $query->paginate(12);
$text_item = $request->text_item;

    return view('front.search_result', compact('post_data1','text_item'));
}

}
