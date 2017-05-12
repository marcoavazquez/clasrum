<?php

namespace App\Services\User;

use App\User;
use App\Contracts\User\UserServiceContract;

class UserService implements UserServiceContract
{
    /**
    * @var array
    */
    protected $validationCreateRules = [
        'name' => 'required',
        'email' => 'required|unique:user,email',
        'password' => 'require|min:6|confirmed'
    ];

    /**
    * @var array
    */
    protected $validationUpdateRules = [
        'name' => 'sometimes|required',
        'email' => 'sometimes|required|unique:user,email'
    ];

    /**
    * @var array
    */
    protected $validationMessages = [];

    /**
    * @var User
    */
    protected $model;

    /**
    * UserService contructor
    * @param User $model
    */
    public function __contruct(User $model)
    {
        $this->model = $model;
    }

    /**
    * @param int $id
    * @return User
    */
    public function find($id)
    {
        return $this->model->findOrFail($id);
    }

    /**
    * @param array $atributes
    * @return User
    */
    public function create(array $atributes = [])
    {
        $atributes['password'] = bcrypt($atributes['password']);
        $model = $this->model->create($atributes);
    }

    /**
    * @param int $id
    * @param array $atributes
    * @return User
    */

}