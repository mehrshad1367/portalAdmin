<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.index');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {

        $user = Auth::user();
        $request->validate([

            'name' => 'required|min:2|max:20',

            'family' => 'required|min:2|max:20',

            'email' => 'required|min:2|max:50',

            'password' => 'required|min:2|max:50',

            'phone' => 'required|min:2|max:50',

            'position' => 'required|min:2|max:50',

            'office_tel' => 'required|min:2|max:50',

        ]);

        $user->name = $request->name;
        $user->family = $request->family;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->position = $request->position;
        $user->office_tel = $request->office_tel;
        $user->phone = $request->phone;

        $user->save();
        return redirect()->route('profile');
    }
}
