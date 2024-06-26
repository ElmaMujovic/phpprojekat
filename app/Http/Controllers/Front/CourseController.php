<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lectures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function addCourse(Request $request ){
        $this->validate($request,[
            'course'=>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'infomation'=>'required',
            'imePredavaca'=>'required',
        ]);
        $cs=new Course();
        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'images';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        $cs::create($input);
        return redirect('/teacherpage')->with('success','Formirali ste kurs');
    }

}
