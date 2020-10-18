<?php

namespace App\Http\Controllers\V1\Student;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Student\StudentService;

class EditController extends Controller
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
     * Update an existing author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {
        return $this->successResponse($this->studentService->editStudent($request->all(), $author));
    }

    /**
     * Remove an existing author
     * @return Illuminate\Http\Response
     */
    public function destroy($author)
    {
        return $this->successResponse($this->studentService->deleteStudent($author));
    }
}
