@extends('front.layouts.layoutstudent')
@section('content')
<div class="section-2">
    <div  class="blog_part section_padding">
    <h1 class="col-md-9" style="text-align: center">Istorija odradjenih testova:</h1>
    <div class="col-md-6">
        @if (\Session::has('success'))
          <p class="alert alert-danger" style="background-color:  rgb(101, 179, 213); ">{{\Session::get('success')}}</p>
        @endif
    </div>
    <div>
            @foreach ($results as $key=>$re)
            @if($re->user_id==Session::get('loginId'))
            <div class="card mt-4">
            <div class="card-body">
            <p style="text-align:center;justify-content:center;font-size:16px;"> <b>{{$key+1}}.Test:</b> {{$re->tests[0]['nameT']}}</p><br>
            <table class="table">
                <tr>
                    <td>Tačnih odgovora :</td>
                    <td>{{$re->yes_ans}}</td>
                </tr>
                <tr>
                    <td>Netačnih odgovora :</td>
                    <td>{{$re->no_ans}}</td>
                </tr>
                <tr>
                    <td>Broj poena :</td>
                    <td>{{$re->yes_ans*10}}</td>
                </tr>
            </table>
        </div></div>
        @endif
        @endforeach
    </div>
  </div>
</div>
@endsection
