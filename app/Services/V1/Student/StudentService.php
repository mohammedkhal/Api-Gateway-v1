<?php

namespace App\Services\V1\Student;

use App\Traits\ConsumesExternalService;

class StudentService
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
        $this->baseUri = config('services.students.base_uri');
    }
    /**
     * Obtain the full list of student from the student service
     * @return string
     */
    public function obtainStudents()
    {
        return $this->performRequest('GET', 'students');
    }
    /**
     * Create one student using the student service
     * @return string
     */
    public function createStudent($data)
    {
        return $this->performRequest('POST', 'students', $data);
    }
    /**
     * Obtain one single student from the student service
     * @return string
     */
    public function obtainStudent($student_uuid)
    {
        return $this->performRequest('GET', "students/{$student_uuid}");
    }
    /**
     * Update an instance of student using the student service
     * @return string
     */
    public function editStudent($data, $student_uuid)
    {
        return $this->performRequest('PUT', "students/{$student_uuid}", $data);
    }
    /**
     * Remove a single student using the student service
     * @return string
     */
    public function deleteStudent($student_uuid)
    {
        return $this->performRequest('DELETE', "students/{$student_uuid}");
    }
}
