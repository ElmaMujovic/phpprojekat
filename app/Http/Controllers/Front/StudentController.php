<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Lectures;
use App\Models\Enrolled;
use App\Models\Question;
use App\Models\Tests;
use App\Models\Result;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Nette\Utils\Arrays;
use App\Models\News;


class StudentController extends Controller
{
    public function studentpage()
    {
        $urid=Session()->get('loginId');
        $por="otvoren";
        $enr=Enrolled::select('idCourse')->where('idUser', '=', $urid)->get()->toArray();
        $datacs=Course::where([['state', '=', $por]])->whereNotIn('id', $enr)->get();
        return view('student.studentpage',['courses'=>$datacs]);
    }
    public function enrolledCourse(Request $request ){
        $data=new Enrolled();
        $data->idUser=$request->userid;
        $data->idCourse=$request->courseid;
        $res=$data->save();
        if($res==true){
        return redirect('/studentpage')->with('success','Uspešno ste se prijavili na kurs!');
        }
    }
    public function studentcourse()
    {
        $urid=Session()->get('loginId');
        $por="otvoren";
        $enr=Enrolled::select('idCourse')->where('idUser', '=', $urid)->get()->toArray();        
        $datacsm=Course::where([['state', '=', $por]])->whereIn('id',$enr)->get();
        $datalecture=Lectures::all();
        $datatest=Tests::all();
        return view('student.studentcourse',['courses'=>$datacsm,'tests'=>$datatest,'coursesm'=>$datacsm,'lectures'=>$datalecture]);
    }
    public function studenttest($id)
    {
        $dataquestions=Question::where([['idTest', '=', $id]])->with('tests')->get();
        return view('student.testload',['questions'=>$dataquestions]);
    }
    public function download($file){
        return response()->download(public_path('images/'.$file));
    }

    public function submit_question(Request $request)
    {
        $yes_ans=0;
        $no_ans=0;
        $data=$request->all();
        $result=array();
        for($i=1; $i<=$request->index; $i++)
        {
            if(isset($data['question'.$i]))
            {
                $question=Question::where('id', $data['question'.$i])->get()->first();
                if($question->answer===$data['ans'.$i])
                {
                    $result[$data['question'.$i]]='YES';
                    $yes_ans++;
                }
                else{
                    $result[$data['question'.$i]]='NO'; 
                    $no_ans++; 
                }
            }
        }
        /*echo $yes_ans,$no_ans;
        echo "<pre>";
        print_r($request->all());*/
        $datares=new Result();
        $datares->test_id=$request->test_id;
        $datares->user_id=Session::get('loginId');
        $datares->yes_ans=$yes_ans;
        $datares->no_ans=$no_ans;
        $datares->save();
        return redirect('/studentcourse')->with('success','Uspešno ste se odradili test!');;
    }
    public function showresult()
    {
        $result_info=Result::all();
        return view('student.studentresult',['results'=>$result_info]);
    }
    public function naseroditelj()
{
    $news = News::all();

    return view('naseroditelj', compact('news'));
}

}
