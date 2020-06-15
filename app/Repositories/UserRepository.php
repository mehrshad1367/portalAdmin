<?php


namespace App\Repositories;


use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

    public function all()
    {
        // TODO: Implement all() method.

        return User::all();
    }

    public function get($id)
    {
        // TODO: Implement get() method.
        $user = User::find($id);
        return $user;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        User::destroy('id','=', $id);
        return back();
    }

    public function update($id)
    {
        // TODO: Implement update() method.
        $user = User::find($id);
        $user->update(request());
        dd($user);
    }

}
