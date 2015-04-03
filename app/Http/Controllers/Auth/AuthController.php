<?php namespace ScholarCheck\Http\Controllers\Auth;

use Illuminate\Mail\Mailer;
use Illuminate\Support\Facades\Auth;
use ScholarCheck\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use ScholarCheck\Http\Requests\UpdateProfileRequest;
use ScholarCheck\Http\Requests\UserLoginRequest;
use ScholarCheck\Http\Requests\UserRegisterRequest;
use ScholarCheck\User;

class AuthController extends Controller {

    /**
     * Create a new authentication controller instance.
     *
     * @param  \Illuminate\Contracts\Auth\Guard $auth
     * @param  \Illuminate\Contracts\Auth\Registrar $registrar
     */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => ['getLogout', 'getProfile', 'postProfile']]);
	}

    public function getRegister()
    {
        return view('auth.register')->with([
            'title' => 'Signup'
        ]);
    }

    public function postRegister(UserRegisterRequest $request, Mailer $mailer)
    {
        $user = User::create($request->all());

        $user->confirmed = 0;
        $user->confirmation_token = str_random(12);

        $user->subscription($request->input('plan'))
            ->create(
                $request->input('stripeToken'),
                [
                    'email' => $user->email
                ]
            );

        $user->save();

        $data['name'] = $user->name;
        $data['token'] = $user->confirmation_token;
        $userInfo = $user->toArray();

        $mailer->send('emails.welcome', $data, function ($message) use ($userInfo)
        {
            $message->from('donotreply@scholarcheck.io', 'ScholarCheck');
            $message->to($userInfo['email'])->subject('Your new ScholarCheck account');
        });

        return redirect()->route('login')->with([
            'status' => 'Your account was created. Confirm your email to login.'
        ]);
    }

    public function getLogin()
    {
        return view('auth.login')
            ->with([
                'title' => 'Login'
            ]);
    }

    public function postLogin(UserLoginRequest $request)
    {
        $credentials = $request->only(['email', 'password']);

        $auth = Auth::attempt($credentials, $request->has('remember'));

        if($auth)
        {
            //If the user isn't confirmed, the login fails and the user is redirected back.
            if(Auth::user()->confirmed == 0)
            {
                Auth::logout();
                return redirect()->route('login')->withErrors('You must first activate your account before you can log in. Please check your email.');
            } else {
                return redirect()->intended('/');
            }
        } else {
            return redirect()->route('login')
                ->withErrors('Invalid login credentials.')
                ->withInput($request->only('email'));
        }

    }

    public function confirm($token)
    {
        $user = User::where('confirmation_token', '=', $token)->firstOrFail();

        if($user->confirmed != 0) {
            return redirect()
                ->route('login')
                ->withErrors('You have already activated your account, please log in below.');
        } else {
            $user->confirmed = 1;
            $user->save();
            return redirect()
                ->route('login')
                ->with('status', 'You have successfully activated your account, you can now sign in!');
        }
    }

    public function getProfile()
    {
        $user = Auth::user();

        return view('auth.profile')
            ->with([
                'title' => 'Manage your account',
                'user' => $user
            ]);
    }

    public function postProfile(UpdateProfileRequest $request)
    {
        $user = Auth::user();

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if(! is_null($request->input('password')))
        {
            $user->password = $request->input('password');
        }

        $user->save();

        return redirect()->route('users.profile')
            ->with('status', 'Your account has been updated.');
    }

    public function getLogout()
    {
        Auth::logout();
        return redirect('/');
    }

}
