<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileAvatarController extends Controller
{
    public function show()
    {
        return view('profile.avatar');
    }
}
