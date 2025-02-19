<?php

namespace App\Http\Controllers;

use App\Models\CFP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

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
        ]);

        return redirect()->route('cfps.completed')->with('success', 'Paper submitted, thank you!');
    }
}
