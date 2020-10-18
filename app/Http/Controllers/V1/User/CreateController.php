<?php

namespace App\Http\Controllers\V1\User;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\User\UserService;
use Illuminate\Support\Facades\Hash;

class CreateController extends Controller
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
     * Create one new user
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'university_id' => 'required|unique:users,university_id|max:10',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ];

        $this->validate($request, $rules);

        $data = $request->all();
        $data['password'] = Hash::make($request->password);

        $user = $this->userService->store($data);

        return $this->validResponse($user, Response::HTTP_CREATED);
    }
}
