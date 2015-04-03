<?php namespace ScholarCheck\Http\Middleware;

use Closure;
use ScholarCheck\ApiKey;

class ValidApiKeyMiddleware {

	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle($request, Closure $next)
	{
        $token = $request->input('token');

        if(!$token) {
            $token = $request->header('Token');
        }

        $key = ApiKey::where('key', '=', $token)->with('user')->first();

        if(!$key || $key->active == 0 || ! $key->user->subscribed())
        {
            abort(401);
        }

		return $next($request);
	}

}
