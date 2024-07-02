<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Enrolled;
use App\Models\Lectures;
use App\Models\Question;
use App\Models\Result;
use App\Models\Tests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\News;

class TeacherController extends Controller
{
    public function teacherpage()
    {
        return view('teacher.teacherpage');
    }

    public function showCourses()
    {
      $lecture=DB::table('lectures')
              ->join('courses','courses.course','=','lectures.course')
              ->get();
      $course=DB::table('courses')
              ->get();
      $proverastanja="otvoren";
      $datacourse=Course::all()->where('state','=', $proverastanja);
      return view('teacher.teacherpage',['courses'=>$datacourse,'course'=>$course]);
    }
    public function showClosedCourses()
    {
    $datacourse=Course::all();
    $datalecture=Lectures::all();
    return view('teacher.teacherpage',['lectures'=>$datalecture,'courses'=>$datacourse]);
    }
    public function closeCourses(Request $request)
    {
        $data=Course::find($request->id);
        $data->state='zatvoren';
        $data->save();
      return redirect('/teacherpage')->with('success','Zatvorili ste kurs');
    }

    public function addLectures(Request $request ){
      $this->validate($request,[
          'course'=>'required',
          'textlecture'=>'required',
          'file' => 'required|mimes:pdf,xlxs,xlx,docx,doc,csv,txt,png,gif,jpg,jpeg|max:2048',
      ]);
      $lecture=new Lectures();
      $lecture->course=$request->input('course');
      $lecture->textlecture=$request->input('textlecture');
      if($file=$request->file('file'))
      {
        $file->move('images',$file->getClientOriginalName());
        $file_name=$file->getClientOriginalName();
        $lecture->file=$file_name;
      }
      $lecture->save();
 
      return redirect('/teacherpage')->with('success','Dodali ste predavanje');
  }
    public function showTest()
    {
    $datacourse=Course::all();
    $datatest=Tests::with('courses')->get();
    return view('teacher.test',['courses'=>$datacourse,'tests'=>$datatest]);
    }
    public function addTest(Request $request ){
      $this->validate($request,[
          'tipetest'=>'required',
          'nametest'=>'required',
      ]);
      $datatest=new Tests();
      $datatest->nameT=$request->nametest;
      $datatest->tipeT=$request->tipetest;
      $datatest->course_id=$request->valueid;
      $datatest->save();
      return redirect('/test')->with('success','Formirali ste novi test');
  }
  public function addQA(Request $request)
  {
      $this->validate($request, [
          'nameq' => 'required',
          'answer' => 'required',
          'testid' => 'required',
      ]);
  
      $dataq = new Question();
      $dataq->question = $request->nameq;
      $dataq->a = $request->answer === 'da' ? 'da' : '';
      $dataq->b = $request->answer === 'ne' ? 'ne' : '';
      $dataq->answer = $request->answer;
      $dataq->idTest = $request->testid;
      $dataq->save();
  
      return redirect('/test')->with('success', 'Dodali ste pitanje');
  }
  

  public function showstt()
  {
    $datacs=Course::all();
    $datac=Enrolled::with('users')->get();;
    return view('teacher.analisis', ['course'=>$datacs],['enrols'=>$datac]);
  }
  public function showinformation($id)
  {
    $dataresult=Result::with('users')->get();
    $datatest=Tests::where('id','=',$id)->first();
    return view('teacher.informacije', ['results'=>$dataresult,'tests'=>$datatest]);
  }

  public function polaznici(Request $request)
{
    // Dohvatanje trenutno prijavljenog korisnika
    $userId = Auth::id();

    // Dohvatanje kurseva na koje je korisnik upisan
    $enrols = Enrolled::where('idUser', $userId)->with('course')->get();

    return view('front.polaznici', ['enrols' => $enrols]);
}
public function removeStudent(Request $request)
{
    $enrollId = $request->input('enrollId');
    $enrollment = Enrolled::find($enrollId);

    if ($enrollment) {
        $enrollment->delete();
        return redirect()->back()->with('success', 'Korisnik uspešno uklonjen sa kursa.');
    } else {
        return redirect()->back()->with('error', 'Greška prilikom uklanjanja korisnika sa kursa.');
    }
}
public function nasevaspitac()
{
    $news = News::all(); // Fetch all news or use any specific query as needed

    return view('nasevaspitac', compact('news'));
}

}
