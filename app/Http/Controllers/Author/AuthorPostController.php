<?php

namespace App\Http\Controllers\Author;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\AuthorCategoryPermission;
use App\Models\Tag;
use App\Models\Subscriber;
use App\Mail\Websitemail;
use Auth;
use DB;

class AuthorPostController extends Controller
{
    public function show()
    {
        $posts = Post::with('rSubCategory.rCategory', 'rLanguage')->where('author_id', Auth::guard('author')->user()->id)->orderBy('id', 'desc')->get();
        return view('author.post_show', compact('posts'));
    }

    public function create()
    {
        $author_categories = AuthorCategoryPermission::where('author_id', Auth::guard('author')->user()->id)->pluck('sub_category_id');
        $sub_categories = SubCategory::whereIn('id', $author_categories)->get();
        // $sub_categories = SubCategory::with('rCategory')->get();
        return view('author.post_create', compact('sub_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
            'post_title_english' => 'required',
            'post_photo' => 'required|mimes:jpg,jpeg,png,gif,avif,webp'
        ]);

        $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $ai_id = $q[0]->Auto_increment;

        $now = time();
        $ext = $request->file('post_photo')->extension();
        $final_name = 'post_photo_' . $now . '.' . $ext;
        $request->file('post_photo')->move(public_path('uploads/'), $final_name);

        $post = new Post();
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->post_title_english = $request->post_title_english;
        $post->slug = $request->slug;
        $post->video_link = $request->video_link;
        $post->post_photo = $final_name;
        $post->visitors = 1;
        $post->author_id = Auth::guard('author')->user()->id;
        $post->admin_id = 0;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        $post->language_id = $request->language_id;
        $post->save();


        if ($request->tags != '') {
            $tags_array_new = [];
            $tags_array = explode(',', $request->tags);
            for ($i = 0; $i < count($tags_array); $i++) {
                $tags_array_new[] = trim($tags_array[$i]);
            }
            $tags_array_new = array_values(array_unique($tags_array_new));
            for ($i = 0; $i < count($tags_array_new); $i++) {
                $tag = new Tag();
                $tag->post_id = $post->id;
                $tag->tag_name = trim($tags_array_new[$i]);
                $tag->save();
            }
        }


        // Sending this post to subscribers
        if ($request->subscriber_send_option == 1) {
            $subject = 'A new post is published';
            $message = 'Hi, A new post is published into our website. Please go to see that post:<br>';
            $message .= '<a target="_blank" href="' . route('news_detail', $ai_id) . '">';
            $message .= $request->post_title;
            $message .= '</a>';

            $subscribers = Subscriber::where('status', 'Active')->get();
            foreach ($subscribers as $row) {
                \Mail::to($row->email)->send(new Websitemail($subject, $message));
            }
        }

        return redirect()->route('author_post_show')->with('success', 'Data is added successfully.');
    }



    public function edit($id)
    {

        $test = Post::where('id', $id)->where('author_id', Auth::guard('author')->user()->id)->count();
        if (!$test) {
            return redirect()->route('author_home');
        }

        $sub_categories = SubCategory::with('rCategory')->get();
        $existing_tags = Tag::where('post_id', $id)->get();
        $post_single = Post::where('id', $id)->first();
        return view('author.post_edit', compact('post_single', 'sub_categories', 'existing_tags'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required'
        ]);

        $post = Post::where('id', $id)->first();

        if ($request->hasFile('post_photo')) {
            $request->validate([
                'post_photo' => 'mimes:jpg,jpeg,png,gif,avif,webp'
            ]);

            unlink(public_path('uploads/' . $post->post_photo));

            $now = time();
            $ext = $request->file('post_photo')->extension();
            $final_name = 'post_photo_' . $now . '.' . $ext;
            $request->file('post_photo')->move(public_path('uploads/'), $final_name);

            $post->post_photo = $final_name;
        }

        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->post_title_english = $request->post_title_english;
        $post->slug = $request->slug;
        $post->video_link = $request->video_link;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        $post->language_id = $request->language_id;
        $post->update();

        if ($request->tags != '') {
            $tags_array = explode(',', $request->tags);
            for ($i = 0; $i < count($tags_array); $i++) {
                $total = Tag::where('post_id', $id)->where('tag_name', trim($tags_array[$i]))->count();

                if (!$total) {
                    $tag = new Tag();
                    $tag->post_id = $id;
                    $tag->tag_name = trim($tags_array[$i]);
                    $tag->save();
                }
            }
        }

        return redirect()->route('author_post_show')->with('success', 'Data is updated successfully.');
    }

    public function delete_tag($id, $id1)
    {
        $tag = Tag::where('id', $id)->first();
        $tag->delete();
        return redirect()->route('author_post_edit', $id1)->with('success', 'Data is deleted successfully.');
    }

    public function delete($id)
    {
        $test = Post::where('id', $id)->where('author_id', Auth::guard('author')->user()->id)->count();
        if (!$test) {
            return redirect()->route('author_home');
        }

        $post = Post::where('id', $id)->first();
        unlink(public_path('uploads/' . $post->post_photo));
        $post->delete();

        Tag::where('post_id', $id)->delete();

        return redirect()->route('author_post_show')->with('success', 'Data is deleted successfully.');
    }
}
