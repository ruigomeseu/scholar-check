<?php namespace ScholarCheck\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller {

    public function index()
    {

        $date = Carbon::now();
        $date = $date->startOfMonth();

        $callsUsed = Auth::user()->apiCalls()->where('api_calls.created_at', '>', $date->toDateTimeString())->count();

        $maxApiCalls = Auth::user()->plan->api_calls;

        return view('home')->with([
            'title' => 'Dashboard',
            'callsUsed' => 400,
            'maxApiCalls' => $maxApiCalls
        ]);
    }

}
