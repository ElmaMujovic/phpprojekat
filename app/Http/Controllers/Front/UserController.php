<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\News;
use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    public function showContact($id)
    {
        $userId = auth()->id();

        
        $user = User::findOrFail($id);
        return view('contact', compact('user'));
    }
}
