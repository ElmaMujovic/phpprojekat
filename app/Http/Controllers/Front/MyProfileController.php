<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyProfileController extends Controller
{
    public function getUserById()
    {
        // Preuzimanje korisničkog ID-a iz sesije
        $userId = Session::get('loginId');

        // Dohvatanje korisnika pomoću ID-a
        $user = User::find($userId);

        if ($user) {
            // Vraćanje korisničkih podataka kao JSON (ili možete vratiti view, ovisno o potrebi)
            return response()->json($user);
        } else {
            // Ako korisnik nije pronađen
            return response()->json(['error' => 'User not found'], 404);
        }
    }
}
