<?php

namespace App\Http\Controllers\V1\User;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\User\UserService;

class EditController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the students microservice
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
     * Update an existing user
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $user_uuid)
    {
        $rules = [
            'university_id' => 'required|unique:users,university_id|max:10',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
        ];

        $this->validate($request, $rules);

        return $this->userResponse($this->userService->update($request->all(), $user_uuid));
    }

    /**
     * Remove an existing user
     * @return Illuminate\Http\Response
     */
    public function destroy($user_uuid)
    {
        $data['user_uuid'] = $user_uuid;

        return $this->userResponse($this->userService->destroy($data));
    }
}
