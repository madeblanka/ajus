<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Auth;
use App\User;

// use Hash;
class LoginController extends Controller
{
    //
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Define username as login field.
     *
     * @return string
     */
    public function username () {
        return 'username';
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function attemptLogin(Request $request)
    {                
        return $this->guard('web')->attempt(
            $request->only('username', 'password'),
            1
        );
    }

    // Gk mau jalan. Gk tau kenapa
    // /**
    //  * Handle an authentication attempt.
    //  *
    //  * @param  \Illuminate\Http\Request $request
    //  *
    //  * @return Response
    //  */
    //     public function authenticate(Request $request)
    //     {
    //         $user = User::where('username', $request->username)
    //             ->first();

    //         return !is_null($user) && \Hash::check($request->password, $user->password);
    //     }
    }
