<?php


namespace App\Repositories;


use App\Repositories\Interfaces\UserRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    protected $model;  //Ok

public function __construct(User $user)
{
    $this->model = $user;
}

    public function all()
    {
        // TODO: Implement all() method.

        return $this->model->all();
    }

    public function get($id)
    {
        // TODO: Implement get() method.
        $user = $this->model->findOrFail($id);
        return $user;
    }

    public function delete($id)
    {
        // TODO: Implement delete() method.
        $this->model->destroy('id','=', $id);
        return back();
    }

    public function update(array $input,$id)
    {
        // TODO: Implement update() method.
        $user=$this->model->findOrFail($id);
            $user->update($input);
            return $user;
    }

    public function avatar($request,$id)
    {
        $user = $this->model->findOrFail($id);
        $user->update([$user->avatar = $request->file('avatar')->store('public')]);
        $user->save();

    }

    public function update_password(array $input, $id)
    {
        $user=$this->model->findOrFail($id);
        $input['password']=Hash::make($input['password']);
        $user->update($input);
        $user->save();
    }

}
