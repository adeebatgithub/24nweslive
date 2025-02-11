<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PrayerRequests;
use App\Models\Language;
use App\Helper\Helpers;

class PrayerRequestController extends Controller
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
       
        return view('front.prayerrequest');
    }
    
    public function submit(Request $request)
    {
        // $request->validate([
            
        // ]);

        $request->validate([
            'name' => 'required',
            'email' => 'required|email:rfc,dns|unique:users',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'address' => 'required',
            'prayers' => 'required',
            'confirmation' => 'required',
       ]);
       

        $post = new Testimonials();
        
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->country = $request->country;
        $post->state = $request->state;
        $post->city = $request->city;
        $post->address = $request->address;
        $post->prayers = $request->prayers;
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

        return back()->with('success', 'Prayer Request is added successfully.');
        
    

    }
}
