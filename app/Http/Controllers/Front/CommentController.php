<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Course;
use Illuminate\Support\Facades\Session;

class CommentController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        Comment::create([
            'course_id' => $course->id,
            'user_id' => Session::get('loginId'),
            'comment' => $request->comment,
        ]);

        return redirect()->back()->with('success', 'Komentar je uspešno dodat.');
    }
}
