<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\News;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function adminpage()
    {
        return view('admin.adminpage');
    }

    public function showContact()
    {
        if (Auth::check()) {
            $user = Auth::user(); // Uzimanje trenutno ulogovanog korisnika
            return view('contact', ['user' => $user]);
        } else {
            // Ako korisnik nije autentifikovan, možete preusmeriti na stranicu za prijavu ili prikazati odgovarajuću poruku.
            return redirect()->route('login')->with('error', 'Morate biti ulogovani da biste videli kontakt informacije.');
        }
    }
    public function show()
    {
      $por="načekanju";
      $poro="odobreno";
      $tipa="admin";
      $data=User::all()->where('zahtev', '=', $por);
      $datat=User::where([['zahtev', '=', $poro] ,['tip', '!=', $tipa]])->get();
      $datan=News::all();
      return view('admin.adminpage',['user'=>$data,'news'=>$datan,'users'=>$datat]);
    }

    public function AcceptR(Request $request)
    {
      $data=User::find($request->id);
      $data->zahtev='odobreno';
      $data->save();
      return redirect('/adminpage');
    }
    public function DeclineR(Request $request)
    {
      $data=User::find($request->id);
      $data->zahtev='odbijeno';
      $data->save();
      return redirect('/adminpage');
    }
    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'adress' => 'required'

        ]);

        $input = $request->all();

        $contact->update($input);

        return redirect('coontact')
                        ->with('success','Ažurirana je kontakt stranica!');
    }


    public function deleteUser(User $id)
    {
        $id->delete();

        return redirect('adminpage')
                        ->with('success','Obrisali ste Korisnika Aplikacije.');
    }
    
}
