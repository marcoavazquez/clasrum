<?php

namespace App\Contracts\User;

interface UserServiceContract
{
    /**
    * @param int $id
    * @return User
    */
    public function find($id);

    /**
    * @param array $attributes
    * @return User
    */
    public function create(array $attributes = []);

    /**
     * @param int|string $id
     * @param array $attributes
     * @return User
     * @throws ValidationException
     */
    public function update($id, array $attributes = []);

     /**
     * @param int|string $id
     * @return bool
     */
    public function delete($id);
}