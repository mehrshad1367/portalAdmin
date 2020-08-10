<?php


namespace App\Repositories;


use App\Repositories\Interfaces\RepositoryInterface;
use App\Http\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements RepositoryInterface
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

    public function create(array $data)
    {
        // TODO: Implement insert() method.
        return $this->model->create($data);
    }

}
