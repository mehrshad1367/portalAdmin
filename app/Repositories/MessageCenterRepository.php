<?php


namespace App\Repositories;


use App\Http\Models\MessageCenter;
use App\Repositories\Interfaces\RepositoryInterface;

class MessageCenterRepository implements RepositoryInterface
{
    protected $model;
      public function __construct(MessageCenter $msg)
      {
        $this->model = $msg;
      }

      public function all()
      {
          // TODO: Implement all() method.
          return $this->model->all();
      }

      public function get($id)
      {
          // TODO: Implement get() method.
         $msg= $this->model->findOrFail($id);
         $msg->status = 0;
         $msg->save();

         return $msg;
      }

      public function create(array $data)
      {
          // TODO: Implement create() method.
          $msg = $this->model->create($data);
          return $msg;
      }

      public function delete($id)
      {
          // TODO: Implement delete() method.
      }

      public function update(array $data, $id)
      {
          // TODO: Implement update() method.
      }

      public function write()
      {

      }

}
