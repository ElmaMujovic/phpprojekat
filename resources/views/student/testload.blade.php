@extends('front.layouts.layoutstudent')
@section('content')
<div class="section-2">
<div class="special_cource padding_top">
    </h4>
    <a class="btn_1" style="margin-left: 40%;margin-top: 10%" onclick="funTQ()" id="testbtn"> Zapocni pitanja za anketu </a>
    <div  class="containerr">
        <div class="vertical-centter">
            <div hidden id="quid" style="margin-bottom: 10%" class="row" >
            <br>
            <div class="col-md-9">
                <form action="{{url('student/submit_question')}}" method="POST" >
                {{@csrf_field()}}
                <input type="hidden" name="test_id"  value="{{Request::segment(2)}}">
                <div style="border-radius:20px;box-shadow: 10px 22px 20px 10px rgba(134, 30, 12, 0.361);padding-left:20px; padding-top:30px; border:1px solid red; background-color:white; color:black;" class="row">
                    <br><br>
                    <div class="col-md-3">
                    </div>
                    @foreach ($questions as $key=>$question)
                    <h1 style="margin-left:30%;font-size:19px;justify-content:center;"> Naziv ankete:  {{$question->tests[0]['nameT']}}  </h1>
                    <div class="col-md-12" >
                        <br><br>
                        <h5>{{$key+1}}. {{$question->question}}</h4>
                            <input type="hidden" value="{{$question['id']}}" name="question{{$key+1}}">
                        <ul>
                            <li>
                                <input type="radio" value="{{$question->a}}" name="ans{{$key+1}}"> {{$question->a}}<br>
                            </li>
                            <li>
                                <input type="radio" id="butt2" value="{{$question->b}}" name="ans{{$key+1}}"> {{$question->b}}<br>
                            </li>
                            <li>
                                <input type="radio" value="{{$question->c}}" name="ans{{$key+1}}"> {{$question->c}}<br>
                            </li>
                            <li>
                                <input type="radio" id="butt1" value="{{$question->d}}" name="ans{{$key+1}}"> {{$question->d}}<br>
                            </li>
                            <li style="display: none">
                                <input type="radio" value="0" checked="checked" name="ans{{$key+1}}">{{$question->d}}
                            </li>
                            <li style="display: none">
                                <input type="radio" value="{{$question->answer}}" name="">{{$question->answer}}
                            </li>
                        </ul>   
                    </div>
                    @endforeach
                    <div style="float:right;yustify-content:right;" class="col-md-9">
                        <input type="hidden" name="index" value="<?php echo $key+1 ?>" >
                        <button type="submit" style="float:right;yustify-content:right;border-radius:20px; margin-bottom:20px;" class="btn_1">Pošalji </button>
                    </div>
                    <br><br><br><br>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection