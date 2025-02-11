<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Language;
use App\Models\Testimonials;
use App\Models\Post;
use App\Models\LiveChannel;
use App\Helper\Helpers;

class TestimonialsController extends Controller
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

        $trending_post_array = Post::with('rSubCategory')->orderBy('id','desc')->where('sub_category_id',51)->get();
        
        $live_channel_data = LiveChannel::where('language_id',$current_language_id)->get();

        $special_post_array = Post::with('rSubCategory')->orderBy('id','desc')->where('sub_category_id',50)->get();

        $catholic_post_array = Post::with('rSubCategory')->orderBy('id','desc')->where('sub_category_id',42)->get();
        
        $testimonials_data = Testimonials::where('show_on_page',1)->paginate(3);
        return view('front.testimonials', compact('testimonials_data','trending_post_array','special_post_array','catholic_post_array','live_channel_data'));
    }

    public function submit(Request $request)
    {
        
        // $request->validate([
            
        // ]);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'location' => 'required',
            // 'photo' => 'required',
            'title' => 'required',
            'testimony' => 'required',
            'confirmation' => 'required',
       ]);
       
    //    if ($validator->fails()) {
    //     return redirect()->back()->withErrors($validator)->withInput();
    //     } 
        
        
        // $q = DB::select("SHOW post STATUS LIKE 'posts'");
        // $ai_id = $q[0]->Auto_increment;
        // $final_name = $request->file('photo');

        // if( $request->hasFile('photo') ){
        // $now = time();
        // $ext = $request->file('photo')->extension();
        // $final_name = 'volunteer_photo_'.$now.'.'.$ext;
        // $request->file('photo')->move(public_path('uploads/'),$final_name);
        // }

        
        
        
        

        $post = new Testimonials();
        
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->location = $request->location;
        $now = time();
        if($request->file('photo') !== NULL){
          
            $ext = $request->file('photo')->extension();
            $final_photo_name = 'testimony_file_'.$now.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'),$final_photo_name);
            $post->photo = $final_photo_name;
        }
       
        if($request->file('recorded_audio') !== NULL){
            // $ext = $request->file('recorded_audio')->extension();
            $final_audio_name = $request->file('recorded_audio')->getClientOriginalName();
            $request->file('recorded_audio')->move(public_path('uploads/'),$final_audio_name);
            $post->audio = $final_audio_name;
        }
        if($request->file('audio') !== NULL){
            $ext = $request->file('audio')->extension();
            
            $final_audio_name = 'testimony_file_'.$now.'.'.$ext;
            $request->file('audio')->move(public_path('uploads/'),$final_audio_name);
            $post->audio = $final_audio_name;
        }
        
        if($request->file('video') !== NULL){
            $ext = $request->file('video')->extension();
            $final_video_name = 'testimony_file_'.$now.'.'.$ext;
            $request->file('video')->move(public_path('uploads/'),$final_video_name);
            $post->video = $final_video_name;
        }
        
        $post->title = $request->title;
        $post->testimony = $request->testimony;
        $post->confirmation = $request->confirmation;
        
        $post->save();

        


        // Sending this post to subscribers
        // if($request->subscriber_send_option == 1)
        // {
        //     $subject = 'A new post is published';
        //     $message = 'Hi, A new post is published into our website. Please go to see that post:<br>';
        //     $message .= '<a target="_blank" href="'.route('news_detail',$ai_id).'">';
        //     $message .= $request->post_title;
        //     $message .= '</a>';

        //     $subscribers = Subscriber::where('status','Active')->get();
        //     foreach($subscribers as $row) {
        //         \Mail::to($row->email)->send(new Websitemail($subject,$message));
        //     }
        // }

        return back()->with('success', 'Testimony is added successfully.');
        
    

    }
}
