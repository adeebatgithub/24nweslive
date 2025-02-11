<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Volunteer;

class AdminVolunteerController extends Controller
{
    public function show()
    {
        $volunteer_data = Volunteer::get();
        return view('admin.volunteer_show', compact('volunteer_data'));
    }
}
