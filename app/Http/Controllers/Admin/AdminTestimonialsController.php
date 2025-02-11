<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials;

class AdminTestimonialsController extends Controller
{
    public function show()
    {
        $testimonials = Testimonials::orderBy('id','desc')->get();
        return view('admin.testimonials_show', compact('testimonials'));
    }

    public function create()
    {
        $sub_categories = SubCategory::with('rCategory')->get();        
        return view('admin.post_create', compact('sub_categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'post_title' => 'required',
            'post_detail' => 'required',
            'post_photo' => 'required|mimes:jpg,jpeg,png,avif,webp,gif'
        ]);

        $q = DB::select("SHOW TABLE STATUS LIKE 'posts'");
        $ai_id = $q[0]->Auto_increment;

        $now = time();
        $ext = $request->file('post_photo')->extension();
        $final_name = 'post_photo_'.$now.'.'.$ext;
        $request->file('post_photo')->move(public_path('uploads/'),$final_name);

        $post = new Post();
        $post->sub_category_id = $request->sub_category_id;
        $post->post_title = $request->post_title;
        $post->post_detail = $request->post_detail;
        $post->post_photo = $final_name;
        $post->visitors = 1;
        $post->author_id = 0;
        $post->admin_id = Auth::guard('admin')->user()->id;
        $post->is_share = $request->is_share;
        $post->is_comment = $request->is_comment;
        $post->language_id = $request->language_id;
        $post->save();


        if($request->tags != '') {
            $tags_array_new = [];
            $tags_array = explode(',',$request->tags);
            for($i=0;$i<count($tags_array);$i++)
            {
                $tags_array_new[] = trim($tags_array[$i]);
            }
            $tags_array_new = array_values(array_unique($tags_array_new));
            for($i=0;$i<count($tags_array_new);$i++)
            {
                $tag = new Tag();
                $tag->post_id = $ai_id;
                $tag->tag_name = trim($tags_array_new[$i]);
                $tag->save();
            }
        }


        // Sending this post to subscribers
        if($request->subscriber_send_option == 1)
        {
            $subject = 'A new post is published';
            $message = 'Hi, A new post is published into our website. Please go to see that post:<br>';
            $message .= '<a target="_blank" href="'.route('news_detail',$ai_id).'">';
            $message .= $request->post_title;
            $message .= '</a>';

            $subscribers = Subscriber::where('status','Active')->get();
            foreach($subscribers as $row) {
                \Mail::to($row->email)->send(new Websitemail($subject,$message));
            }
        }

        return redirect()->route('admin_post_show')->with('success', 'Data is added successfully.');
    }

    public function edit($id)
    {
        $test = Testimonials::where('id',$id)->count();
        if(!$test) {
            return redirect()->route('admin_home');
        }

        $testimonials_single = Testimonials::where('id',$id)->first();
        return view('admin.testimonials_edit', compact('testimonials_single'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'testimony' => 'required'
        ]);

        $testimony = Testimonials::where('id',$id)->first();

        // if($request->hasFile('post_photo')) {
        //     $request->validate([
        //         'post_photo' => 'mimes:jpg,jpeg,png,gif,avif,webp'
        //     ]);

        //     unlink(public_path('uploads/'.$post->post_photo));

        //     $now = time();
        //     $ext = $request->file('post_photo')->extension();
        //     $final_name = 'post_photo_'.$now.'.'.$ext;
        //     $request->file('post_photo')->move(public_path('uploads/'),$final_name);

        //     $post->post_photo = $final_name;
        // }
        
        $testimony->title = $request->title;
        $testimony->testimony = $request->testimony;
        $testimony->show_on_page = $request->show_on_page;
        $testimony->update();

        // if($request->tags != '') {
        //     $tags_array = explode(',',$request->tags);
        //     for($i=0;$i<count($tags_array);$i++)
        //     {
        //         $total = Tag::where('post_id',$id)->where('tag_name',trim($tags_array[$i]))->count();
                
        //         if(!$total) {
        //             $tag = new Tag();
        //             $tag->post_id = $id;
        //             $tag->tag_name = trim($tags_array[$i]);
        //             $tag->save();
        //         }
        //     }
        // }        

        return redirect()->route('admin_testimonials_show')->with('success', 'Data is updated successfully.');
    }

    public function delete_tag($id,$id1)
    {
        $tag = Tag::where('id',$id)->first();
        $tag->delete();
        return redirect()->route('admin_post_edit',$id1)->with('success', 'Data is deleted successfully.');
    }

    public function delete($id)
    {
        $test = Testimonials::where('id',$id)->count();
        if(!$test) {
            return redirect()->route('admin_home');
        }
        
        $post = Testimonials::where('id',$id)->first();
        
        $post->delete();

        return redirect()->route('admin_testimonials_show')->with('success', 'Data is deleted successfully.');
    }
}
