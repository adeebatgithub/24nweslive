<?php

namespace App\Http\Controllers\Front;

use App\Models\HomeAdvertisement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Language;
use App\Models\Setting;
use App\Models\Tag;
use App\Models\Admin;
use App\Models\Author;
use App\Helper\Helpers;

class PostController extends Controller
{
    public function detail($id)
    {
        
        Helpers::read_json();
        
        if(!session()->get('session_short_name')) {
            $current_short_name = Language::where('is_default','Yes')->first()->short_name;
        } else {
            $current_short_name = session()->get('session_short_name');
        }    
        $current_language_id = Language::where('short_name',$current_short_name)->first()->id;
        $setting_data = Setting::where('id',1)->first();
        $post_data = Post::with('rSubCategory')->orderBy('id','desc')->where('language_id',$current_language_id)->get();
        $tag_data = Tag::where('post_id',$id)->get();
        $home_ad_data = HomeAdvertisement::where('id',1)->first();
      
            $post_detail = Post::with('rSubCategory')->where('id',$id)
            ->orwhere('slug',$id)
            ->first();
        
        
            if ($post_detail !== null) {
                if (isset($post_detail->author_id)) {
                    if ($post_detail->author_id == 0) {
                        $user_data = Admin::where('id', $post_detail->admin_id)->first();
                    } else {
                        $user_data = Author::where('id', $post_detail->author_id)->first();
                    }
                } else {
                    $user_data = null;
                }
            } else {
                return redirect()->back()->with('error', 'Post not found');
            }

        // Update page view count
        $new_value = $post_detail->visitors+1;
        $post_detail->visitors = $new_value;
        $post_detail->update();

        $related_post_array = Post::with('rSubCategory')->orderBy('id','desc')->where('sub_category_id',$post_detail->sub_category_id)->get();

        return view('front.post_detail', compact('post_detail', 'user_data', 'tag_data','related_post_array', 'home_ad_data', 'setting_data', 'post_data'));
    }
}
