<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    //_Deposit Money Function_//
    public function DepositMoney()
    {
        return view('money_deposit');
    }

     //_Email Verification Resend Function_//

     public function VerificationResend()
     {
         return view('');
     }

}
