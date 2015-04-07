<?php namespace ScholarCheck\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

    public function index()
    {

        $date = Carbon::now();
        $date = $date->startOfMonth();

        $callsUsed = Auth::user()->apiCalls()->where('api_calls.created_at', '>', $date->toDateTimeString())->count();

        $maxApiCalls = Auth::user()->plan->api_calls;

        $callsThisWeek = Auth::user()->apiCalls()->where('api_calls.created_at', '>=', Carbon::now()->startOfWeek())->get()
            ->groupBy(function($date) {
                return Carbon::parse($date->created_at)->format('N'); // grouping by months
            });

        $validEmails = count(Auth::user()->apiCalls()->where('valid_email', '=', 1)->groupBy('email')->get());

        $allTimeCalls = Auth::user()->apiCalls()->count();

        $latestApiCalls = Auth::user()->apiCalls()->orderBy('api_calls.created_at', 'desc')->limit(3)->get();

        $callsArray = [];

        foreach(range(1, 7) as $day)
        {
            $callsArray[$day] = count($callsThisWeek->get($day));
        }

        $calls = implode(', ', $callsArray);

        return view('home')->with([
            'title' => 'Dashboard',
            'callsUsed' => ($callsUsed==0) ? 1 : $callsUsed, //Gauge is bugged when the value is 0
            'maxApiCalls' => $maxApiCalls,
            'calls' => $calls,
            'allTimeCalls' => $allTimeCalls,
            'validEmails' => $validEmails,
            'latestApiCalls' => $latestApiCalls->all()
        ]);
    }

}
