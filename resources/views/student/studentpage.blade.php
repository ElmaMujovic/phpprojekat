@extends('front.layouts.layoutstudent')
@section('content')
<style>
.single_special_cource {
    margin-bottom: 30px;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    background-color: #e0e0e0 !important;

}

.single_special_cource:hover {
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.1);
    transform: translateY(-10px);
    background-color: #e0e0e0;
}

.single_special_cource img.special_img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.special_cource_text {
    padding: 20px;
}

.aktivne-teme-title {
    text-align: center;
    font-size: 64px;
    font-weight: bold;
    color: orange;
    margin-bottom: 20px;
    text-transform: uppercase;
    letter-spacing: 2px;
    position: relative;
}

.aktivne-teme-title::after {
    content: '';
    position: absolute;
    left: 50%;
    bottom: -10px;
    transform: translateX(-50%);
    width: 70px;
    height: 4px;
    background-color: #e0e0e0;
    border-radius: 2px;
}

.btn_7 {
    background-color: #f0f0f0;
    color: black;
    border: 2px solid #ccc;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    transition-duration: 0.4s;
    margin-left: 60px;
    margin-top: 40px;
    width: 160px;
}

.btn_7:hover {
    background-color: #ddd;
    border: 2px solid #aaa;
}

@media (max-width: 768px) {
    .single_special_cource {
        margin-bottom: 20px;
        margin-right: 90px;
    }

    .aktivne-teme-title {
        font-size: 48px;
    }

    .btn_7 {
        margin-left: 30px;
        margin-top: 20px;
        width: 140px;
    }
}

@media (max-width: 900px) {
    .single_special_cource {
        margin-bottom: 15px;
    }

    .aktivne-teme-title {
        font-size: 36px;
        margin-right: 60px;
    }

    .btn_7 {
        margin-left: 20px;
        margin-top: 10px;
        width: 120px;
    }
}
</style>



<div class="section-2">
<div class="special_cource padding_top">
<h1 class="aktivne-teme-title">Aktivne teme</h1>
<br>
    <div class="col-md-6">
        @if (\Session::has('success'))
          <p class="alert alert-danger" style="background-color:  rgb(101, 179, 213); ">{{\Session::get('success')}}</p>
        @endif
    </div>
    <div class="row">
        @foreach ($courses as $course)
        @if ($course->state=='otvoren')
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="single_special_cource">
                <img src="/images/{{$course->image}}" class="special_img" alt="">
                <div class="special_cource_text">
                    <form action="{{route('enrolledCourse')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="text" id="userid" name="userid" hidden value="{{Session::get('loginId')}}"/>
                        <input type="text"  name="courseid" id="courseid" hidden value="{{$course->id}}" />
                        <button type="submit" class="btn_7" style="color:black">Prijavi se</button>

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
