<?php


namespace App\Repositories\Interfaces;


interface UserRepositoryInterface
{
    public function all();

    public function get($id);

    public function delete($id);

    public function update(array $data,$id);

    public function avatar(array $data,$id);
}
