<?php

namespace App\Http\Controllers;

use App\Models\CFP;
use Illuminate\Http\Request;

class CFPController extends Controller
{
    // Show the registration form
    public function create()
    {
        return view('cfp');
    }

    // Handle form submission
    public function store(Request $request)
    {

        CFP::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'title' => $request->title,
            'description' => $request->description,
            'approved' => false,
        ]);

        return redirect()->route('cfps.completed')->with('success', 'Paper submitted, thank you!');
    }
}
