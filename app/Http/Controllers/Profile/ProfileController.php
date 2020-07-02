<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Http\Models\Service;
use App\Repositories\Interfaces\RepositoryInterface;
use App\Http\Models\User;
use App\Http\Models\Role;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

    protected $user;  //$user: yek variable az class UserRepository

    public function __construct(UserRepository $user) //$user: yek object
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
    }

    public function show(Request $request,$id)
    {


//        if (str_contains(url()->current(), $user_service))
        $user = $this->user->get($id);

        return view('profile.index', ['user' => $user]);
    }

    public function edit($id)
    {
        $user = $this->user->get($id);
        return view('profile.edit',['user'=> $user]);
    }

    public function update(Request $request, $id)
    {
        $input=$request->all();
        $validation = $request->validate([
            'name' => 'required|min:2|max:50',
            'family' => 'required|min:2|max:50',
            'email' => 'required|min:2|max:50',
        ]);
        if ($validation) {
            $this->user->update($input, $id);
            return redirect()->back();
        }else{
            return back();
        }
    }

    public function avatar(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $user->update([$user->avatar = $request->file('avatar')->store('public')]);
        $user->save();
        return redirect(url('profile',['id'=>Auth::user()->id]));
    }

    public function update_password(Request $request,$id)
    {
        $user = User::findOrFail($id);
        $validation = $request->validate([
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required',
        ]);
        if ($validation) {
            $user->password  = Hash::make($request->password);
            $user->save();
            return redirect(url('profile', ['id' => Auth::user()->id]));
        }else{
            return back('profile',['id'=>Auth::user()->id])->with('passError','Something is wrong with your new password');
        }
    }
}
