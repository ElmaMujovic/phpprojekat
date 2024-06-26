<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\News;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        
        $today=date("Y/m/d");
        $prikaz=date('Y-m-d', strtotime($today. ' - 7 days'));
        $datan=News::where([['created_at', '>', $prikaz]])->get();
        $datac=Contact::all();
        return view('front.index',['contact'=>$datac,'news'=>$datan]);
    }
}
