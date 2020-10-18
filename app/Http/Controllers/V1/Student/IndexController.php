<?php

namespace App\Http\Controllers\V1\Student;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Services\V1\Student\StudentService;

class IndexController extends Controller
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
     * Return the list of students
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->studentService->obtainStudents());
    }

    /**
     * Obtains and show one student
     * @return Illuminate\Http\Response
     */
    public function show($student_uuid)
    {
        return $this->successResponse($this->studentService->obtainStudent($student_uuid));
    }
}
