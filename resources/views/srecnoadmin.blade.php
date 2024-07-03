@extends('front.layouts.layoutadmin')
<style>
      body, .content, section, .mySlides, .container-vertikalni-divovi {
    background-color: #f39c12 !important;
  
}
        .posebana {
            font-size: 12px;
            color: white;
            font-weight: bold;
            text-decoration: none;
        }
        .vertikalni-div {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 30px; 
            background-color: #c3f2fc;
            color: white;
            padding: 40px; 
            border-radius: 30px;
            width: 450px; 
            margin-right: 30px;
            position: relative; 
            margin-bottom:10px;
        }
        .slika-vertikalni-div {
            width: 127%;
            height: 300px;
            border-radius: 30px;
            margin-top: -40px;
            mask-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 500 90"><path fill-rule="evenodd" d="M0,0 H388 V70 Q300,90 258,70 Q258,90 222,70 Q222,90 186,70 Q186,90 150,70 Q150,90 114,70 Q114,90 78,70 Q78,90 42,70 Q42,90 0,70 Z"></path></svg>');
            mask-size: cover;
        }
        
        .vertikalni-div h3 {
            font-size: 22px;
    line-height: 28px;
    font-weight: bold;
    margin: 0;
    color: #02b7fc;
    text-align: center;
    position: relative;
}


        .vertikalni-div p {
        font-size: 18px;
    font-weight: 400;
    line-height: 24px;
    margin: 1em 0;
        }

        .vertikalni-div .procitaj-vise {
            position: relative;
    overflow: hidden;
    outline: none;
    text-decoration: none;
    display: inline-flex;
    padding: 4px;
    cursor: pointer;
    background-color: #fa84da;
    border-radius: 8px;
    margin: 1em auto 0;

    color: #000000;
    padding: 4px 20px;
    border: 2px dashed #fff;
    border-radius: 8px;
    font-size: 20px;
    font-weight: 500;
        }

        .vertikalni-div .procitaj-vise:hover {
            background-color: #2980b9;
            color: white;
        }

        h4{
    content: "";
    margin: 0;
    width: 100%;
    position: absolute;
    left: 0;
    bottom: 0;
    border: 2px dashed #03b9fa;
}
h3{
    
}

.container-vertikalni-divovi {
            display: flex;
            justify-content: center; 
            margin-top: 50px; 
            background-color: orange;
            margin-bottom:50px;

        }

        @media (max-width: 768px) {
    .vertikalni-div {
        width: 100%;
        margin-right: 0;
    }

    .container-vertikalni-divovi {
        flex-direction: column;
        align-items: center;
    }
}

    </style>
@section('content')
<section>
    <div class="mySlides">
        <img src="{{ asset('images/pocetn1.jpg') }}" style="width: 100%" />
    </div>
</section>


<div class="container-vertikalni-divovi">
    <div class="vertikalni-div">
        <img src="{{ asset('images/teacher.jpg') }}" alt="Opis slike 1" class="slika-vertikalni-div">
        <h3>Poučne aktivnosti za vaspitače</h3>
        <p>Vaspitači mogu pronaći korisne resurse koji olakšavaju njihov rad u učenju i razvoju dece. Sa jasnim smernicama za implementaciju učenja</p>
        <!-- <a href="{{ route('nase-srecno-mesto') }}" class="procitaj-vise">Pročitaj više</a> -->
    </div>

    <div class="vertikalni-div">
        <img src="{{ asset('images/parent.png') }}" alt="Opis slike 2" class="slika-vertikalni-div">
        <h3>Resursi za roditelje</h3>
        <p>Roditelji mogu računati na obimnu kolekciju resursa koji podržavaju njihovu ulogu u vaspitanju i edukaciji svoje dece. Saveti stručnjaka, relevantni</p>
        <!-- <a href="{{ route('nase-srecno-mesto') }}" class="procitaj-vise">Pročitaj više</a> -->
    </div>

    <div class="vertikalni-div">
        <img src="{{ asset('images/kindergarten.jpg') }}" alt="Opis slike 3" class="slika-vertikalni-div">
        <h3>Zabava kroz učenje za decu</h3>
        <p>Naš sajt pruža deci predškolskog uzrasta nezaboravno iskustvo učenja kroz igru. Interaktivne igre, šarene animacije i maštovite priče podstiču radoznalost</p>
        <!-- <a href="{{ route('nase-srecno-mesto') }}" class="procitaj-vise">Pročitaj više</a> -->
    </div>
</div>
@endsection
