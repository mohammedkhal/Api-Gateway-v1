<?php
namespace App\Services\V1\Lecturer;
use App\Traits\ConsumesExternalService;

class LecturerService
{
    use ConsumesExternalService;
    /**
     * The base uri to consume the lecturers service
     * @var string
     */
    public $baseUri;

    public function __construct()
    {
        $this->baseUri = config('services.lecturers.base_uri');
    }

    /**
     * Obtain the full list of lecturer from the lecturer service
     * @return string
     */
    public function obtainLecturers()
    {
        return $this->performRequest('GET', 'lecturers');
    }

    /**
     * Create one lecturer using the lecturer service
     * @return string
     */
    public function createLecturer($data)
    {
        return $this->performRequest('POST', 'lecturers', $data);
    }

    /**
     * Obtain one single lecturer from the lecturer service
     * @return string
     */
    public function obtainLecturer($lecturer_uuid)
    {
        return $this->performRequest('GET', "lecturers/{$lecturer_uuid}");
    }

    /**
     * Update an instance of lecturer using the lecturer service
     * @return string
     */
    public function editLecturer($data, $lecturer_uuid)
    {
        return $this->performRequest('PUT', "lecturers/{$lecturer_uuid}", $data);
    }

    /**
     * Remove a single lecturer using the lecturer service
     * @return string
     */
    public function deleteLecturer($lecturer_uuid)
    {
        return $this->performRequest('DELETE', "lecturers/{$lecturer_uuid}");
    }

}