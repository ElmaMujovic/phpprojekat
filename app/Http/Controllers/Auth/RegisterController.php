<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\VerificationEmail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */

    /**
     * Create a new user instance after a valid registration.Vaše korisničko ime je : '.$username!
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function create(Request $request)
    {
        $request->validate([
            'email' => 'unique:users',
            'jmbg' => 'unique:users',
        ]);

        $user= new User();
        $user->firstname=$request->name;
        $user->lastname=$request->lastname;
        $username=str_replace(' ', '', $username=strtolower($request->name.$request->lastname.rand(1,100)));
        $user->username=$username;
        $user->email=$request->email;
        $user->password=Hash::make($request->password);
        $user->gender=$request->gender;
        $user->countryofbirth=$request->birthCountry;
        $user->placeofbirth=$request->birthPlace;
        $user->contact=$request->contact;
        if ($image = $request->file('profilePicture')) {
            $destinationPath = 'images/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $user->image = "$profileImage";
        }
        $user->dateofbirth=$request->birthDate;
        $user->jmbg=$request->jmbg;
        $user->tip=$request->tip;

        if($request->tip=='roditelj')
        {
            $user->zahtev='načekanju';
        }
        elseif($request->tip=='vaspitac')
        {
            $user->zahtev='načekanju';
        }
        else
        {
            $user->zahtev='odobreno';
        }

        $res=$user->save();
        if($res==true){
         
            return redirect('login')->with('success','Registracija je uspela ! Vaše korisničko ime je : '.$username);
        }

    }

}
