<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {

    $user = User::where([['name', $request->name],
    ['password', $request->password]
    ])->first();
    if (!is_null($user->name)) {

        // Authentication passed

        session(['user' => $user->name]);

        return redirect('/');
    } else {
        // Authentication failed
        return redirect()->back()->withErrors(['error' => 'Invalid name or password']);
    }
}

function logout(){
    Session::forget('user');
    return redirect('/');
}


}
// $user = User::where([
//      ['name', $request->name],
//   ['password', $request->password]
// ])->get();

// if($user[0] != null){
//     return redirect('/');
// }else{
//     return redirect("login");

