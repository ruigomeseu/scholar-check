<?php namespace ScholarCheck\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use ScholarCheck\AcademicEmail;
use ScholarCheck\ApiCall;
use ScholarCheck\ApiKey;
use ScholarCheck\Http\Controllers\Controller;

class ApiController extends Controller {

    /**
     * Create a new controller instance.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $token = $request->input('token');

        if(!$token){
            $token = $request->header('Token');
        }

        $key = ApiKey::where('key', '=', $token)->with('user')->firstOrFail();

        $call = new ApiCall;
        $call->key()->associate($key);
        $call->ip = $request->ip();
        $call->save();
    }

    public function show($email)
    {
        $academicEmail = new AcademicEmail($email);

        return $academicEmail->jsonResponse();
    }

}
