<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
   /**
     * Where to redirect users after login.
     *    protected $redirectTo = RouteServiceProvider::HOME;
     * @var string
     */

     use AuthenticatesUsers;

     public function showLogin()
     {
         $datac=Contact::all();
         return view('front.index',['contact'=>$datac]);
     }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function loginUser(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required',
         ]);

         $user=User::where('username', '=', $request->username)->first();
         if($user){
            if(Hash::check($request->password, $user->password)){
             if($user->tip=='admin'){
                 $request->session()->put('loginId',$user->id);
                 $request->session()->put('name',$user->firstname);
                  return redirect('adminpage');
             }elseif($user->tip=='vaspitac'){
                 if($user->zahtev=='načekanju'){
                     return back()->with('fail','Vaš zahtev za registraciju još nije prihvaćen!');
                 }elseif($user->zahtev=='odbijen'){
                     return back()->with('fail','Vaš zahtev za registraciju je odbijen!');
                 }else
                 {
                 $request->session()->put('loginId',$user->id);
                 $request->session()->put('name',$user->firstname);
                 $request->session()->put('lastname',$user->lastname);
                 return redirect('teacherpage');
                 }
             }else{
                 if($user->zahtev=='načekanju'){
                 return back()->with('fail','Vaš zahtev za registraciju još nije prihvaćen!');
             }elseif($user->zahtev=='odbijen'){
                 return back()->with('fail','Vaš zahtev za registraciju je odbijen!');
             }else{
                 $request->session()->put('loginId',$user->id);
                 $request->session()->put('name',$user->firstname);
                 $request->session()->put('lastname',$user->lastname);

                 return redirect('studentpage');
             }}
            }else{
             return back()->with('fail','Šifra nije ispravno uneta!');
            }
          }else{
             return back()->with('fail','Proverite korisničko ime i šifru da li su ispravno uneti!');
          }
    }

    public function logout()
    {
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect('login');
        }
    }

}
