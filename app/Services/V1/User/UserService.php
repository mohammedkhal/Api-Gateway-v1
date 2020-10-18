<?php

namespace App\Services\V1\User;

use App\Repositories\V1\User\UserRepository;

class UserService
{
    private $userRepository;
    
    /**
     * Create a new Repository instance.
     * @return void
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Return the list of users
     * @return App\Models\V1\User
     */
    public function index()
    {
        return $this->userRepository->index();
    }

    /**
     * Update an existing user
     * @return App\Models\V1\User
     */
    public function update($data)
    {
        return $this->userRepository->update($data);
    }

    /**
     * Remove an existing user
     * @return App\Models\V1\User
     */
    public function destroy($data)
    {
        return $this->userRepository->destroy($data);
    }

    /**
     * Create one new user
     * @return App\Models\V1\User
     */
    public function store($data)
    {
        return $this->userRepository->store($data);
    }

    /**
     * Obtains and show one user
     * @return App\Models\V1\User
     */
    public function show($data)
    {
        return $this->userRepository->show($data);
    }
}
