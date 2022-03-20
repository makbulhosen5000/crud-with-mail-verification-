<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;



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

    // password change function_//
     public function PasswordChange()
     {
        return view("auth.passwords.password_change");
     }
      // password update function_//
      public function PasswordUpdate(Request $request)
      {
         $request->validate([
             'current_password' => 'required',
             'password' => 'required|min:3|max:10|confirmed',
             'password_confirmation'=>'required',
         ]);

         //$user =Auth::user();
         if(Hash::check($request->current_password, Auth::user()->password)){
             //_by model_//
            //$user->password = Hash::make($request->password); // hashing password form input field;
           // $user->save();

            //_by query builder//
            //    $data = array(
            //        'password'=>Hash::make($request->password),
            //    );

        //_by query builder //
           $data=array();
           $data['password']=Hash::make($request->password);
           DB::table('users')->where('id',Auth::id())->update($data);
           Auth::logout();
           return redirect()->route('login');
           //return redirect()->back()->with('success','Password Changed Successfully');
        }else{
             return redirect()->back()->with('error','Current Password Not Match');
         }
      }

    //_person details function_//
     public function PersonDetails($id)
     {
        $id = Crypt::decryptString($id);
        echo $id;
     }


}
