<?php namespace ScholarCheck\Http\Controllers\Api\v1;

use ScholarCheck\Commands\VerifyStudentEmailCommand;
use ScholarCheck\Http\Controllers\Controller;

class ApiController extends Controller {

    /*
    |--------------------------------------------------------------------------
    | Home Controller
    |--------------------------------------------------------------------------
    |
    | This controller renders your application's "dashboard" for users that
    | are authenticated. Of course, you are free to change or remove the
    | controller as you wish. It is just here to get your app started!
    |
    */

    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard to the user.
     *
     * @param $email
     * @return Response
     */
    public function show($email)
    {
        $this->dispatch(new VerifyStudentEmailCommand($email));
    }

}
