@extends('front.layouts.layoutadmin')
@section('content')

<style>
    .center {
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh; /* Visina za centriranje po vertikali */
    }
    .custom-btn {
      background-color: #ff5c33;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      font-weight: bold;
      transition: background-color 0.3s, transform 0.3s;
      margin-left:190px;
    }
    .custom-btn:hover {
      background-color: #e04c2f;
      transform: scale(1.05);
    }
    .custom-btn:active {
      background-color: #c0432a;
    }
    .row2 {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    margin: 0 -15px; /* Adjust margin to create space between columns */
}

.col-sm-4, .col-lg-4, .col-xl-4 {
    flex: 1 1 calc(33.333% - 30px); /* Adjust width to fit three columns with space between */
    margin: 15px; /* Add margin to create space between cards */
}

.single-home-blog {
    margin-bottom: 20px; /* Space between cards */
}

.card {
    height: 100%;
}
.card:hover{
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.1);
    transform: translateY(-10px);
    background-color: #f5f5f5;
}

.card-img-top {
    height: 200px;
    object-fit: cover;
}

.card-body {
    background-color: #e0e0e0;
    padding: 10px;
}

.card-title {
    margin-bottom: 10px;
}

ul {
    margin-bottom: 0;
    padding-left: 0;
    list-style-type: none;
}

ul li {
    color: black;
}
  </style>

<div class="section-2">
<div  class="blog_part section_padding">
    <div class="content-wrapper" >
        <h2 class="col-md-16 text-center">Novosti skole</h2>
        <div class="button-wrapper">
          <button  style="
      background-color: #ff5c33; /* Boja pozadine dugmeta */
      color: white; /* Boja teksta dugmeta */
      padding: 10px 20px; /* Unutrašnje margine */
      border: none; /* Uklanja okvir */
      border-radius: 5px; /* Zaobljeni uglovi */
      cursor: pointer; /* Promena kursora pri hoveru */
      font-size: 16px; /* Veličina fonta */
      font-weight: bold; /* Boldovan tekst */
      transition: background-color 0.3s, transform 0.3s; /* Glatka tranzicija za hover efekte */
    "
      onclick="myFunction()">Dodaj novu vest!</button>
        </div>
        
      </div>

            <div  class="row">
              <div class="col-md-6">

                   {{-- <button class="btn_1"   onclick="myFunction()">Dodaj novu vest!</button> --}}
                     <div>
                  <br>
                  <div class="col-md-6">
                  @if ($message=Session::get('success'))
                    <p class="alert alert-danger" style="background-color:  rgb(255, 179, 213); ">{{$message}}</p>
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
            <div class="card-body" style="background-color: #85adad;" >
                <form method="POST" action="{{ route('store')}}" enctype="multipart/form-data">
                    @csrf
                    <div id="basicInfo">
                    <label style="color: black; font-weight: bold; font-size: 18px; margin-bottom: 10px; display: block; font-family: Arial, sans-serif; text-transform: uppercase; letter-spacing: 1px;" class="card-title" for="nname">Naslov novosti:</label>
                    <input type="text" id="nname" name="nname" placeholder="Aktuelna vest" class="form-control" required>
                        <br>
                        <label style="color: black; font-weight: bold; font-size: 18px; margin-bottom: 10px; display: block; font-family: Arial, sans-serif; text-transform: uppercase; letter-spacing: 1px;" for="detail">Objašnjenje Novosti:</label>
                        <textarea id="detail" name="detail" placeholder="Komentari" class="form-control" style="height: 150px;" required></textarea>
                        <br>
                        <label style="color: black; font-weight: bold; font-size: 18px; margin-bottom: 10px; display: block; font-family: Arial, sans-serif; text-transform: uppercase; letter-spacing: 1px;" for="image">Izaberite sliku:</label>
                        <input type="file" id="image" name="image" class="form-control">
                        <br>
                        <button class="custom-btn" type="submit">Sačuvaj</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>

            <br>
            <div class="row2">
              @foreach ($news as $new)
              <div class="col-sm-4 col-lg-4 col-xl-4"> <!-- Adjusted column size for three columns per row -->
              <div class="single-home-blog">
                        <div class="card">
                        @if($new->image)
                        <img src="{{ asset('storage/' . $new->image) }}" class="card-img-top"  alt="blog"> <!-- Set height and object-fit for consistent image dimensions -->
                        @else
                        <img src="{{ asset('front/img/loginsl.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="blog">
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
