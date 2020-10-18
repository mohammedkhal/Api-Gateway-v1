<?php

namespace App\Http\Controllers\V1\User;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Services\V1\User\UserService;

class IndexController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the users microservice
     * @var UserService
     */
    public $userService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->userResponse($this->userService->index());
    }

    /**
     * Obtains and show one user
     * @return Illuminate\Http\Response
     */
    public function show($user_uuid)
    {
        $data['user_uuid'] = $user_uuid;
        
        return $this->userResponse($this->userService->show($data));
    }
}
