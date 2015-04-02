<?php namespace ScholarCheck\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use ScholarCheck\AcademicEmail;
use ScholarCheck\ApiKey;
use ScholarCheck\Http\Controllers\Controller;

class ApiController extends Controller {

    /**
     * Create a new controller instance.
     *
     */
    public function __construct(Request $request)
    {
        $token = $request->input('token');

        if(!$token){
            $token = $request->header('Authorization');
        }

        $key = ApiKey::where('key', '=', $token)->with('user')->firstOrFail();


    }

    public function show($email)
    {
        $academicEmail = new AcademicEmail($email);

        return $academicEmail->jsonResponse();
    }

}
