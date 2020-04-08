<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\Customer;
use Auth;
use Illuminate\Support\Facades\Hash;
use Alert;

class LoginController extends Controller
{
  public function getLogin()
  {
    return view('welcome');
  }

  public function postLogin(Request $request)
  {
    if (Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
      toast('Welcome back!','success')->position('top-end')->autoClose(1500);
     return redirect()->intended('/admin');

   } else if (Auth::guard('customer')->attempt(['username' => $request->username, 'password' => $request->password])) {
    // alert()->success('Hello',$request->username)->autoClose(1500);
    toast('Welcome back!','success')->position('top-end')->autoClose(1500);
    return redirect()->intended('/dashboard');

  } else{
   return redirect('/');
 }

}

  public function logout()
  {
    if (Auth::guard('admin')->check()) {
      Auth::guard('admin')->logout();
    } elseif (Auth::guard('customer')->check()) {
      Auth::guard('customer')->logout();
    }

    return redirect('/');

  }

  public function getRegis(){
    return view('register');
  }
  public function register(Request $request){
    $user = new Customer();

  $user->name=$request->name;
  $user->phone=$request->phone;
  $user->address=$request->address;
  $user->email=$request->email;
  $user->username=$request->username;
  $user->password=Hash::make($request->password);

  $user->save();
  // alert()->success('Success','registrasi berhasil')->autoClose(2000);
  return redirect('/')->withSuccess('Task Created Successfully!');
  }
}