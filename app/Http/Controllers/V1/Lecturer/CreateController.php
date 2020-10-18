<?php

namespace App\Http\Controllers\V1\Lecturer;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Lecturer\LecturerService;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the lecturers microservice
     * @var LecturerService
     */
    public $lecturerService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(LecturerService $lecturerService)
    {
        $this->lecturerService = $lecturerService;
    }

    /**
     * Create one new lecturer
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_uuid'] = Auth::user()->uuid;

        return $this->successResponse($this->lecturerService->createLecturer($data, Response::HTTP_CREATED));
    }
}
