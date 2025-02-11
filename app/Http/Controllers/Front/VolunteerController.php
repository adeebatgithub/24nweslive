<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;
use App\Models\Testimonials;
use App\Models\Language;
use App\Helper\Helpers;


class VolunteerController extends Controller
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
        
        //$volunteer_data = Volunteer::where('language_id',$current_language_id)->first();
        //return view('front.volunteer', compact('volunteer_data'));
        $testimonials_data = Testimonials::where('show_on_page',1)->get();
        return view('front.volunteer', compact('testimonials_data'));
    }

    public function submit(Request $request)
    {
        // $request->validate([
            
        // ]);

        $request->validate([
            'category' => 'required',
            'name' => 'required',
            'email' => 'required',
            'status' => 'required',
            'photo' => 'required|:mimes:jpg,jpeg,png,gif,avif,webp',
            'religion' => 'required',
            'education' => 'required',
            'job' => 'required',
            'parish' => 'required',
            'parish_priest' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'state' => 'required',
            'country' => 'required',
            'comments' => 'required',
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

        
        
        $now = time();
        $ext = $request->file('photo')->extension();
        $final_name = 'volunteer_photo_'.$now.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'),$final_name);

        $post = new Volunteer();
        $categorys = $request->input('category');
        //while saving 
        $post->category = json_encode($categorys);  
        //$post['category'] = $request->input('category');
        $post->name = $request->name;
        $post->email = $request->email;
        $post->status = $request->status;
        $post->spirituality = $request->spirituality;
        $post->photo = $final_name;
        $post->religion = $request->religion;
        $post->education = $request->education;
        $post->job = $request->job;
        $post->parish = $request->parish;
        $post->parish_priest = $request->parish_priest;
        $post->address = $request->address;
        $post->phone = $request->phone;
        $post->city = $request->city;
        $post->state = $request->state;
        $post->country = $request->country;
        $post->comments = $request->comments;
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

        return back()->with('success', 'Data is added successfully.');
        
    

    }
}
