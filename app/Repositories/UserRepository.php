<?php


namespace App\Repositories;


use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;

class UserRepository implements UserRepositoryInterface
{
    protected $model;

public function __construct(User $user)
{
    $this->model = $user;
}

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

    public function update($request,$id)
    {
        // TODO: Implement update() method.
        $user = User::find($id);
        if(isset($request->password)) {
            $this->model->update([$user->name = $request->name,
                                  $user->family = $request->family,
                                  $user->password = $request->password
            ]);
            $user->save();
        }else{
            $this->model->update([$user->name = $request->name,
                                  $user->family = $request->family,
            ]);
            $user->save();
        }
    }

    public function avatar($request,$id)
    {
        $user = User::find($id);
        $this->model->update([$user->avatar = $request->file('avatar')->store('public')]);
        $user->save();

    }

}
