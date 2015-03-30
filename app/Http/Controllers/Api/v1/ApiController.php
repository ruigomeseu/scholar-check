<?php namespace ScholarCheck\Http\Controllers\Api\v1;

use ScholarCheck\AcademicEmail;
use ScholarCheck\Http\Controllers\Controller;

class ApiController extends Controller {

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
    }

    public function show($email)
    {
        $academicEmail = new AcademicEmail($email);

        return $academicEmail->jsonResponse();
    }

}
