<?php namespace ScholarCheck\Http\Controllers\Api\v1;

use Illuminate\Http\Request;
use ScholarCheck\AcademicEmail;
use ScholarCheck\ApiCall;
use ScholarCheck\ApiKey;
use ScholarCheck\Http\Controllers\Controller;

class ApiController extends Controller {

    private $call;

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

        $this->call = new ApiCall;
        $this->call->key()->associate($key);
        $this->call->ip = $request->ip();
        $this->call->save();
    }

    public function show($email)
    {
        $academicEmail = new AcademicEmail($email);

        $this->call->email = $email;
        $this->call->valid_email = $academicEmail->isValid();
        $this->call->save();

        return $academicEmail->jsonResponse();
    }

}
