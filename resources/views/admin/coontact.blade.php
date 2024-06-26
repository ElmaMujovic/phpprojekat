@extends('front.layouts.layoutadmin')
@section('content')
<div class="section-2">
<div  class="blog_part section_padding">
    <div class="col-md-6">
        @if ($message=Session::get('success'))
          <p class="alert alert-danger" style="background-color:  rgb(101, 179, 213); ">{{$message}}</p>
        @endif
    </div>
    <div class="col-md-6" id="adnews">
        <h1 style="text-align: center;">Kontakt informacije:</h1>
        <div id="cardnews" class="card">

        @foreach ($contact as $cnt)

          <div class="card-body">
          <form method="POST" action="{{ route('update',$cnt['id']) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div id="basicInfo">
                <h1> Izmenite Kontakt Formu</h1>
                <label class="card-title" for="fname">Adresa: </label>
                <input style="padding-left:5px;margin-top:20px;margin-left:20px;border-radius:10px; height:50px;" type="text" id="adress" value="{{$cnt['adress']}}" name="adress"  placeholder="Akuelna vest" >
                <br>
                <label for="detail">Email: </label>
                <input id="detail" id="email" value="{{$cnt['email']}}" name="email"  placeholder="Email" style="padding-left:5px; margin-top:20px;height:50px; margin-left:30px;border-radius:10px;"/>
                <br>
                <label for="number">Telefon: </label>
                <input type="text" style="margin-top:20px;margin-bottom:20px;padding-left:5px;margin-left:20px;border-radius:10px; height:50px;"  id="phone" value="{{$cnt['phone']}}"  name="phone" placeholder="+3816..." />
                <br>
                <button class="btn_1" style="float:bottom;justify-content:right;margin-left:30px;" type="submit">Sačuvaj</button>
            </div>
          </form>
          </div>
          @endforeach
        </div>
  </div>
</div>
</div>
@endsection
