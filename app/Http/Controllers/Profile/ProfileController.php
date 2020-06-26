<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Http\Models\Service;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Http\Models\User;
use App\Http\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $user;  //UserRepository

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
//        $data=[
//            'users' => $this->user->all()
//        ];
//        return view('profile.index');
    }

    public function show($id)
    {
        $user = Auth::user()->role->service;
//        $user_service = $user_role;

        $user_service=$user[0]->service;
        dd($user_service);
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
        $this->user->avatar($request,$id);
        return redirect(url('profile',['id'=>Auth::user()->id]));
    }

    public function update_password(Request $request,$id)
    {
        $input= $request->all();
        $validation = $request->validate([
            'password' => 'required|min:3|confirmed',
            'password_confirmation' => 'required',
        ]);
        if ($validation) {
            $this->user->update_password($input, $id); //update_Password , $request->all()
            return redirect(url('profile', ['id' => Auth::user()->id]));
        }else{
            return back('profile',['id'=>Auth::user()->id])->with('passError','Something is wrong with your new password');
        }
    }
}
