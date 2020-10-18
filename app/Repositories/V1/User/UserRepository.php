<?php

namespace App\Repositories\V1\User;

use App\Models\V1\User;
use App\Repositories\Repository;

class UserRepository extends Repository
{
    /**
     * Create a new User instance.
     * @return object
     */
    public function getModel()
    {
        return new User;
    }

    /**
     * Return the list of users
     * @return App\Models\V1\User
     */
    public function index()
    {
        $users = $this->getModel();

        $users = $users->whereStatus(User::STATUS_ACTIVE)->get();

        return $users;
    }

    /**
     * Update an existing user
     * @return App\Models\V1\User
     */
    public function update($data)
    {
        $user = $this->getModel();

        $user = $user->findOrFail($data['user_uuid'])->first();

        $user->university_id = $data['university_id'];
        $user->password = $data['password'];

        $user->save();

        return $user;
    }

    /**
     * Remove an existing user
     * @return App\Models\V1\User
     */
    public function destroy($data)
    {
        $user = $this->getModel();

        $user = $user->findOrFail($data['user_uuid'])->first();
        $user->status = User::STATUS_INACTIVE;

        $user->save();

        return $user;
    }

    /**
     * Create one new user
     * @return App\Models\V1\User
     */
    public function store($data)
    {
        $user = $this->getModel();

        $user->university_id = $data['university_id'];
        $user->password = $data['password'];

        $user->save();

        return $user;
    }

    /**
     * Obtains and show one user
     * @return App\Models\V1\User
     */
    public function show($data)
    {
        $user = $this->getModel();

        $user = $user->findOrFail($data['user_uuid'])->first();

        return $user;
    }
}
