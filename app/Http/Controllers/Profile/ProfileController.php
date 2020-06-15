<?php

namespace App\Http\Controllers\profile;

use App\Http\Controllers\Controller;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $user;

    public function __construct(UserRepositoryInterface $user)
    {
        $this->user = $user;
    }

    public function index()
    {
        $users = $this->user->all();
        dd($users->toArray());
//        $data=[
//            'users' => $this->user->all()
//        ];
//        return view('profile.index');
    }

    public function show($id)
    {

        $user = $this->user->get($id);

        return view('profile.index', ['user' => $user]);
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update($user_data)
    {

        $this->user->update($user_data);
        return redirect()->route('profile');
    }
}
