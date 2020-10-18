<?php

namespace App\Services\V1\User\Auth;

use App\Traits\ConsumesExternalService;

class AuthService
{
    use ConsumesExternalService;
    /**
     * The base uri to consume the students service
     * @var string
     */
    public $baseUri;
    /**
     * The secret to consume the students service
     * @var string
     */
    public $secret;
    public function __construct()
    {
        $this->baseUri = config('services.users.base_uri');
    }
    /**
     * Check the user credinatial and obtian token
     * @return string
     */
    public function obtainToken($data)
    {
        $data['grant_type'] = "password";
        $data['client_id'] = "4";
        $data['client_secret'] = "jYeSTNLpidP2dFKsK1q6I8JhxX1drhVPzOWDjrEs";
        $data['scope'] = "";

        return json_decode($this->performRequest('POST', 'oauth/token', $data));
    }
}
