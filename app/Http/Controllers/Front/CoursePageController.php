<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Course;
use Illuminate\Http\Request;

class CoursePageController extends Controller
{
    public function courses()
    {
        $datac=Contact::all();
        $datacourse=Course::all();

        return view('front.courses',['contact'=>$datac,'courses'=>$datacourse]);
    }
}
