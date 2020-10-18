<?php

namespace App\Http\Controllers\V1\Student;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Student\StudentService;
use Illuminate\Support\Facades\Auth;

class CreateController extends Controller
{
    use ApiResponser;

    /**
     * The service to consume the students microservice
     * @var StudentService
     */
    public $studentService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(StudentService $studentService)
    {
        $this->studentService = $studentService;
    }

      /**
     * Create one new student
     * @return Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['user_uuid'] = Auth::user()->uuid;
     
        return $this->successResponse($this->studentService->createStudent($data, Response::HTTP_CREATED));
    }
}
