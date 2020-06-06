<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        return view('profile.profile')->with('user', Auth::user());
    }

    public function edit()
    {
        return view('profile.edit')->with();
    }
}
