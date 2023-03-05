<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function PMHome()
    {
        return view('home');
    }

    public function POHome()
    {
        $userEmail=Auth::user()->email;
        return view('home',compact('userEmail')); 
    
    }

    public function SMHome()
    {
        $userEmail=Auth::user()->email;
        return view('home',compact('userEmail')); 
    
    }
    public function DevHome()
    {
        $userEmail=Auth::user()->email;
        return view('home',compact('userEmail'));
    
    }

    public function adminDashboard(){
        return 'admin dashbord';
    }
}
