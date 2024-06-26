@extends('front.layouts.layoutstudent')
@section('content')
<div class="section-2">
<div class="special_cource padding_top">
    <h1> Aktivne teme</h1>
    <br>
    <div class="col-md-6">
        @if (\Session::has('success'))
          <p class="alert alert-danger" style="background-color:  rgb(101, 179, 213); ">{{\Session::get('success')}}</p>
        @endif
    </div>
    <div class="row">
            @foreach ($courses as $course)
            @if ($course->state=='otvoren')
            <div class="col-sm-6 col-lg-6">
                <div class="single_special_cource">
                    <img src="/images/{{$course->image}}" class="special_img" alt="">
                    <div class="special_cource_text">
                        <form action="{{route('enrolledCourse')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="text" id="userid" name="userid" hidden value="{{Session::get('loginId')}}"/>
                            <input type="text"  name="courseid" id="courseid" hidden value="{{$course->id}}" />
                        <button type="submit" class="btn_4" style="color:black">Prijavi se</button>
                        </form>
                        <h4>{{$course->state}}</h4>
                        <a><h3 style="color:black">{{$course->course}}</a>
                        <p>{{$course->infomation}}</p>
                        <div class="author_info">
                           <div class="author_img">
                                {{-- <img src="{{asset('front/img')}}/onlinett.png" alt=""> --}}
                                <div class="author_info_text">
                                    <p>Predavač:</p>
                                    <h5><a href="#">{{$course->imePredavaca}}</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <br><br>
    </div>
</div>
</div>
@endsection
