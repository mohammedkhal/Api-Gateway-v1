<?php

namespace App\Http\Controllers\V1\User\Auth;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use App\Services\V1\User\Auth\AuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the users microservice
     * @var AuthService
     */
    public $authService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Return the list of users
     * @return Illuminate\Http\Response
     */
    public function signIn(Request $request)
    {
        $data = $request->all();
        $response = $this->authService->obtainToken($data);
        
        return $this->successResponse([
            'token_type' => $response->token_type,
            'access_token' => $response->access_token
        ], Response::HTTP_OK);
    }
}
