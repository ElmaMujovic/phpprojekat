@extends('front.layouts.layoutindex')
@section('content')
<section class="special_cource padding_top">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-5">
                <div class="section_tittle text-center">
                    
                    <h2>Aktivne teme</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach ($courses as $course)
            @if ($course->state=='otvoren')
            <div class="col-sm-6 col-lg-6">
                <div class="single_special_cource">
                    <img src="/images/{{$course->image}}" class="special_img" alt="">
                    <div class="special_cource_text">
                        <a href="/login" class="btn_4">Prijavi se</a>
                        <h4>{{$course->state}}</h4>
                        <a><h3 style="color:red">{{$course->course}}</a>
                        <p>{{$course->infomation}}</p>
                        <div class="author_info">
                            <div class="author_img">
                                {{-- <img src="{{asset('front/img')}}/logo.png" alt=""> --}}
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
</section>
@endsection
