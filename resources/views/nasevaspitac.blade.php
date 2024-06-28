
@extends('front.layouts.layoutteacher')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dobrodošli</title>
    <link rel="stylesheet" href="{{ asset('css/pocetna.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

</head>
<body>

 <section>
 <div class="mySlides ">
      <img src="images/pocetn1.jpg" style="width: 100%	" />
    </div>
 </section>

<!--<section class="slideshow">
    <div class="mySlides ">
      <img src="img/slika1.png" style="width: 100%" />
    </div>

    <div class="mySlides ">
      <img src="img/slika2jpg.jpg" style="width: 100%" />
    </div>

    <div class="mySlides ">
      <img src="img/slider5.jpg" style="width: 100%" />
    </div>
  </section> -->
  <div class="tekst">
    <p class="poruka">Dobrodošli na mesto gde se svako dete razvija, uči i raste kroz bezbedno, podržavajuće i kreativno okruženje.</p>
   
</div>
<div class="ikonice-container">
    <div class="ikonica">
        <i  class="fas fa-gem ikon"></i>
        <h3>Profesionalni vaspitači</h3>
        <p>Naš tim čine iskusni profesionalci sa relevantnim obrazovanjem i stručnim kvalifikacijama.</p>
    </div>
    <div class="ikonica">
        <i  class="fas fa-star ikon"></i>
        <h3>Naš pristup</h3>
        <p>Posvećeni smo pružanju sveobuhvatnog i individualizovanog pristupa razvoju svakog deteta.</p>
    </div>
    <div class="ikonica">
        <i class="fas fa-heart ikon"></i>
        <h3>Edukativni program</h3>
        <p>Posvećeni smo pružanju izuzetnog edukativnog iskustva koje inspiriše, motiviše i podstiče rast vaše dece.</p>
    </div>
</div>

<!-- Dodati novi divovi ispod ikonica -->
<div class="article-section">
<div class="naslov-div ">
    <h3><a href="{{ route('sta_je_stem') }}">Šta je to STEM?</a></h3>
    <p><a class="last-div" href="">Pogledaj video</a></p>
    
</div>

<div class="naslov-div ">
    <h3><a href="{{ route('zasto_stem') }}">Zašto STEM?</a></h3>
    <p><a class="last-div" href="">Pogledaj video</a></p>
</div>

<div class="naslov-div ">
    <h3><a href="{{ route('kako_stem') }}">Kako STEM?</a></h3>
    <p><a class="last-div" href="">Pogledaj video</a></p>
</div>

<div class="naslov-div ">
    <h3><a href="{{ route('vezbe_i_aktivnosti') }}">Vežbe i aktivnosti</a></h3>
    <p><a class="last-div" href="">Pogledaj video</a></p>
</div>

</div>
    </section>
    <section class="blog_part section_padding" >
        <div class="container">
            <div class="row justify-content-center">
                
            </div>
            <div class="row">
   
</div>

    </section>
<script src="js/app.js"></script>
<script src="js/main.js"></script>
@endsection


</body>
</html>