<?php

namespace App\Http\Controllers\V1\Lecturer;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\V1\Lecturer\LecturerService;

class EditController extends Controller
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
     * Update an existing author
     * @return Illuminate\Http\Response
     */
    public function update(Request $request, $author)
    {
        return $this->successResponse($this->lecturerService->editLecturer($request->all(), $author));
    }

    /**
     * Remove an existing author
     * @return Illuminate\Http\Response
     */
    public function destroy($author)
    {
        return $this->successResponse($this->lecturerService->deleteLecturer($author));
    }
}
