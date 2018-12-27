<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Fauth;
use Illuminate\Http\Request;
use App\Eloquent\Office;
use App\Eloquent\User;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function redirectToProvider()
    {
        return Fauth::driver('framgia')->redirect();
    }

    /**
     * Obtain the user information from Auth-Framgia.
     *
     * @return Response
     */
    public function handleProviderCallback()
    {
        $user = Fauth::driver('framgia')->user();
        $token = $user->token;
        $userSocial = Fauth::driver('framgia')->userFromToken($token);

        $user = User::where('email', $userSocial->user['email'])->first();
        if ($user) {
            if (Auth::loginUsingId($user->id)) {
                return redirect()->back();
            }
        }

        $office = Office::where('wsm_workspace_id', '=', $userSocial->user['workspaces'])->first();
        $workspace = $userSocial->user['workspaces'][0]['name'];

        $userSignUp = User::create([
            'name' => $userSocial->user['name'],
            'email' => $userSocial->user['email'],
            'password' => bcrypt('123456'),
            'employee_code' => $userSocial->user['employee_code'],
            'position' => $userSocial->user['role'],
            'avatar' => $userSocial->user['avatar'],
            'workspace' => $workspace,
            'office_id' => $office->id,
        ]);

        if ($userSignUp) {
            if (Auth::loginUsingId($userSignUp->id)) {
                return redirect()->back();
            }
        }
    }
}
