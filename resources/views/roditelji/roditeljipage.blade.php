@extends('front.layouts.layoutstudent')
@section('content')
<style>
.single_special_cource {
    margin-bottom: 30px;
    transition: box-shadow 0.3s ease, transform 0.3s ease; /* Dodana tranzicija za transformaciju */
    background-color: #f0f0f0;
    
}

.single_special_cource:hover {
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.1); /* Senka sa više nivoa */
    transform: translateY(-10px); /* Podiže karticu kada se pređe mišem */
    background-color: #e0e0e0;
}

.single_special_cource img.special_img {
    width: 100%;
    height: 200px; /* Možete prilagoditi visinu po potrebi */
    object-fit: cover; /* Održavajte razmeru slike */
}

.special_cource_text {
    padding: 20px;
}

.aktivne-teme-title {
    text-align: center; /* Centriranje teksta */
    font-size: 64px; /* Veličina fonta */
    font-weight: bold; /* Podebljan tekst */
    color: orange; /* Boja teksta */
    margin-bottom: 20px; /* Margina ispod naslova */
    text-transform: uppercase; /* Velika slova */
    letter-spacing: 2px; /* Razmak između slova */
    position: relative; /* Relativni položaj za pseudo-element */
}

.aktivne-teme-title::after {
    content: ''; /* Dodavanje pseudo-elementa */
    position: absolute; /* Apsolutni položaj */
    left: 50%; /* Centriranje horizontalno */
    bottom: -10px; /* Položaj ispod naslova */
    transform: translateX(-50%); /* Pomeranje unazad za 50% širine elementa */
    width: 70px; /* Širina linije */
    height: 4px; /* Visina linije */
    background-color: #e0e0e0; /* Promena boje linije u narandžastu */
    border-radius: 2px; /* Zaobljeni krajevi linije */
}

.btn_7 {
    background-color: #f0f0f0; /* Pozadinska boja dugmeta */
    color: black; /* Boja teksta */
    border: 2px solid #ccc; /* Boja ivice */
    padding: 10px 20px; /* Unutrašnje margine */
    text-align: center; /* Centriranje teksta */
    text-decoration: none; /* Bez podvlačenja teksta */
    display: inline-block; /* Inline-block za margine */
    font-size: 16px; /* Veličina fonta */
    margin: 4px 2px; /* Margine oko dugmeta */
    cursor: pointer; /* Kursor ruke kada se prelazi preko dugmeta */
    border-radius: 5px; /* Zaobljeni uglovi */
    transition-duration: 0.4s; /* Vreme trajanja tranzicije */
    margin-left: 60px;
    margin-top: 40px;
    width: 160px;
}

.btn_7:hover {
    background-color: #ddd; /* Promena boje pozadine kada je kursor iznad */
    border: 2px solid #aaa; /* Promena boje ivice kada je kursor iznad */
}

/* Medijski upiti za responzivni dizajn */

/* Tableti (ekrani sa širinom između 600px i 768px) */
@media (max-width: 768px) {
    .single_special_cource {
        margin-bottom: 20px;
        margin-right:90px;
    }

    .aktivne-teme-title {
        font-size: 48px; /* Smanjena veličina fonta za tablete */
    }

    .btn_7 {
        margin-left: 30px;
        margin-top: 20px;
        width: 140px; /* Smanjena širina dugmeta za tablete */
    }
}

/* Telefoni (ekrani sa širinom ispod 600px) */
@media (max-width: 900px) {
    .single_special_cource {
        margin-bottom: 15px;
    }

    .aktivne-teme-title {
        font-size: 36px; /* Smanjena veličina fonta za telefone */
        margin-right:60px;
    }

    .btn_7 {
        margin-left: 20px;
        margin-top: 10px;
        width: 120px; /* Smanjena širina dugmeta za telefone */
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
                    <button type="submit" class="btn_7" style="color:black">Prijavi se</button>
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
