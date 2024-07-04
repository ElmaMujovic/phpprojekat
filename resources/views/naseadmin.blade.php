@extends('front.layouts.layoutadmin')

@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF
    -8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dobrodošli</title>
    <link rel="stylesheet" href="{{ asset('css/pocetna.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

<section>
    <div class="mySlides">
        <img src="{{ asset('images/pocetn1.jpg') }}" style="width: 100%" />
    </div>
</section>

<div class="tekst">
    <p class="poruka">Dobrodošli na mesto gde se svako dete razvija, uči i raste kroz bezbedno, podržavajuće i kreativno okruženje.</p>
</div>

<div class="ikonice-container">
    <div class="ikonica">
        <i class="fas fa-gem ikon"></i>
        <h3>Profesionalni vaspitači</h3>
        <p>Naš tim čine iskusni profesionalci sa relevantnim obrazovanjem i stručnim kvalifikacijama.</p>
    </div>
    <div class="ikonica">
        <i class="fas fa-star ikon"></i>
        <h3>Naš pristup</h3>
        <p>Posvećeni smo pružanju sveobuhvatnog i individualizovanog pristupa razvoju svakog deteta.</p>
    </div>
    <div class="ikonica">
        <i class="fas fa-heart ikon"></i>
        <h3>Edukativni program</h3>
        <p>Posvećeni smo pružanju izuzetnog edukativnog iskustva koje inspiriše, motiviše i podstiče rast vaše dece.</p>
    </div>
</div>

<div class="article-section">
    <div class="naslov-div">
        <h3><a href="{{ route('sta_je_stem') }}">Šta je to STEM?</a></h3>
        <p><a class="last-div" href="#">Pogledaj video</a></p>
    </div>

    <div class="naslov-div">
        <h3><a href="{{ route('zasto_stem') }}">Zašto STEM?</a></h3>
        <p><a class="last-div" href="#">Pogledaj video</a></p>
    </div>

    <div class="naslov-div">
        <h3><a href="{{ route('kako_stem') }}">Kako STEM?</a></h3>
        <p><a class="last-div" href="#">Pogledaj video</a></p>
    </div>

    <div class="naslov-div">
        <h3><a href="{{ route('vezbe_i_aktivnosti') }}">Vežbe i aktivnosti</a></h3>
        <p><a class="last-div" href="#">Pogledaj video</a></p>
    </div>
</div>

<section class="blog_part section_padding" >
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-2">
                    <div class="section_tittle text-center">
                        <h2 class="h22">NOVOSTI</h2>
                        
                    </div>
                </div>
            </div>
            <div class="row2">
    @foreach ($news as $new)
    <div class="col-sm-4 col-lg-4 col-xl-4">
        <div class="single-home-blog">
            <div class="card">
                @if($new->image)
                <img src="{{ asset('storage/' . $new->image) }}" class="card-img-top" alt="blog">
                @else
                <img src="{{ asset('front/img/loginsl.jpg') }}" class="card-img-top" style="height: 200px; object-fit: cover;" alt="blog">
                @endif
                <div class="card-body">
                    <a href="/login">
                        <h5 class="card-title">{{ $new->name }}</h5>
                    </a>
                    <p>{{ $new->detail }}</p>
                    <ul>
                        <li>datum: {{ $new->created_at }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>


    </section>

<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>

@endsection
