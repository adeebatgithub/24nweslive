<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function handleWebhook(Request $request) {
        $data = $request->all();
        // Process message or event data here
        return response()->json(['response' => 'Message received']);
    }
    
}
