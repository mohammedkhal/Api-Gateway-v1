<?php

namespace App\Http\Controllers\V1\Lecturer;

use App\Traits\ApiResponser;
use App\Http\Controllers\Controller;
use App\Services\V1\Lecturer\LecturerService;

class IndexController extends Controller
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
     * Return the list of lecturers
     * @return Illuminate\Http\Response
     */
    public function index()
    {
        return $this->successResponse($this->lecturerService->obtainLecturers());
    }

   /**
     * Obtains and show one lecturer
     * @return Illuminate\Http\Response
     */
    public function show($lecturer)
    {
        return $this->successResponse($this->lecturerService->obtainLecturer($lecturer));
    }
}
