<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

        
    // 0 =ProjectManager; 1 = ProductOwner; 2 = ScrumMaster;3 = Developpers


    public function login(Request $request)
    {
        $input = $request->all();
        $this->validate($request,[
            'email'=>'required|email',
            'password'=>'required'
        ]);
        
        if(auth()->attempt(['email'=>$input["email"], 'password'=>$input['password']]))
        {
            if(auth()->user()->role == 'ProjectManager')
            {
                return redirect()->route('home.PM');
            }
            else if(auth()->user()->role == 'ProductOwner')
            {
                return redirect()->route('home.PO');
            }
            else if(auth()->user()->role == 'ScrumMaster')
            {
                return redirect()->route('home.SM');
            }
            else
            {
                return redirect()->route('home.Dev');
            }
        }
        else
        {
            return redirect()
            ->route("login")
            ->with("error",'Incorrect email or password');
        }
    }
}
