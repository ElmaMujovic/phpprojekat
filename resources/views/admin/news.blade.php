@extends('front.layouts.layoutadmin')
@section('content')
<div class="section-2">
<div  class="blog_part section_padding">
    <div class="content-wrapper" >
        <h2 class="col-md-16 text-center">Novosti skole</h2>
        <div class="button-wrapper">
          <button class="btn_1" onclick="myFunction()">Dodaj novu vest!</button>
        </div>
      </div>

            <div  class="row">
              <div class="col-md-6">

                   {{-- <button class="btn_1" onclick="myFunction()">Dodaj novu vest!</button> --}}
                     <div>
                  <br>
                  <div class="col-md-6">
                  @if ($message=Session::get('success'))
                    <p class="alert alert-danger" style="background-color:  rgb(101, 179, 213); ">{{$message}}</p>
                  @endif
                  </div>
                  @if ($errors->any())
                  <div class="alert alert-danger" style="color:white;background-color:#6888fa81;">
                      <strong>Ooops!</strong> Nešto nije u redu.<br><br>
                      <ul style="margin-left: 25%">
                        @foreach ($errors->all() as $error)
                            <li>Sva polja moraju biti uneta!</li>
                            <li>Pokusajte ponovo!</li>
                        @endforeach
                    </ul>
                  </div>
                  @endif
                </div>
              </div>
            </div>
            <div class="row" style="justify-content: center">
    <div class="col-md-6" hidden id="adnews">
        <div id="cardnews" class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('store')}}" enctype="multipart/form-data">
                    @csrf
                    <div id="basicInfo">
                        <label class="card-title" for="nname">Naslov Novosti:</label>
                        <input type="text" id="nname" name="nname" placeholder="Aktuelna vest" class="form-control" required>
                        <br>
                        <label for="detail">Objašnjenje Novosti:</label>
                        <textarea id="detail" name="detail" placeholder="Komentari" class="form-control" style="height: 150px;" required></textarea>
                        <br>
                        <label for="image">Izaberite sliku:</label>
                        <input type="file" id="image" name="image" class="form-control">
                        <br>
                        <button class="btn btn-primary" type="submit">Sačuvaj</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

            <br>
            <div class="row">
              @foreach ($news as $new)
                <div class="col-sm-6 col-lg-4 col-xl-4">
                    <div class="single-home-blog">
                        <div class="card">
                        @if($new->image)
                        <img src="{{ asset('storage/' . $new->image) }}" class="card-img-top" alt="blog">
                    @else
                        <img src="{{ asset('front/img/loginsl.jpg') }}" class="card-img-top" alt="blog">
                    @endif
                            <div class="card-body">
                                <a href="/login">
                                    <h5 class="card-title" style="color: black">{{$new['name']}}</h5>
                                </a>
                                <p>{{$new['detail']}}</p>
                                <form action="{{route('deleteNews',$new->id)}}" method="POST">
                                  @csrf
                                  @method('delete')
                                  <button type="submit" class="btn_1">Obriši</button>
                                </form>
                                <ul>
                                  <li style="color: black"><span class="fa fa-calendar"></span>{{$new['created_at']}}</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
              @endforeach
          </div>
      </div>
</div>
@endsection
