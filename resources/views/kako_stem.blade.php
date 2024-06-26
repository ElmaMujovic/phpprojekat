<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/pocetna.css') }}">

    <title>Document</title>

    <style>
        /* Dodatak u stajestem.css */

        body {
            font-family: 'Arial', sans-serif; /* Korišćenje Arial fonta */
            font-size: 18px; /* Povećanje veličine fonta */
            line-height: 1.6; /* Povećanje razmaka između redova */
        }

        .naslov-container {
            text-align: center; /* Poravnanje teksta u naslov-containeru */
            margin: 40px 10px; /* Dodatni prostor sa obe strane */
        }

        .naslov {
            font-size: 40px; /* Povećanje veličine fonta za naslov */
        }

        .plava-linija {
            width: 80%; /* Širina plave linije */
            height: 3px; /* Debljina plave linije */
            background-color: #3498db; /* Boja plave linije */
            margin: 10px auto; /* Automatsko centriranje i dodatni prostor */
        }

        .tekst-efekat {
            max-width: calc(100% - 60px); /* Maksimalna širina teksta - 50px sa obe strane */
            margin: 50px auto; /* Prazan prostor sa obe strane teksta, centriran */
        }

        /* Stil za efekat ulaska */
        .efekat-ulaska {
            opacity: 0; /* Tekst je inicijalno nevidljiv */
            transition: opacity 0.5s ease; /* Tranzicija za pojavljivanje teksta */
        }

        /* Dodatni stil za prikaz teksta */
        .tekst-efekat p {
            margin: 20px 0; /* Dodatni prostor između pasusa */
        }
    </style>
</head>
<body>
@include('front.inc.header')

<div class="content">
    @yield('content')
</div>
<section>
 <div class="mySlides ">
      <img src="images/pocetn1.jpg" style="width: 100%	" />
    </div>
 </section>
<div class="naslov-container">
    <h3 class="naslov">Šta je STEM?</h3>
    <div class="plava-linija"></div> <!-- Plava linija -->
</div>

<div class="tekst-efekat">
    <?php
    $pasusi = [
"Da bi se STEM približio maldima, vaspitači, nastavnici I profesori primenjuju različite pristupe istom. Neki nastavu zasnivaju na integrisanim projektnim aktivnostima, koje zahtevaju posebna znanja iz određenih STEM disciplina. Drugi pak, STEM iskustva organizuju kao vannastavne aktivnosti u obliku raznih naučnih takmičenja ili izazova. Treći pozivaju stručnjake I dokazane autoritete u odreženim STEM oblastima da deci približe svet STEM nauka. Države i obrazovni siste,mi koji su se uhvatili u koštac sa STEM izazovom, pokučavaju da raziju posebne obrazovne puteve koje će elemente STEM nauka ubaciti i one oblassti u kojima se one ne nalaze tradicionalno. Pokazalo se da rigirozni pristup proveri činjenica I metode donošenja zakljulaka na osnovu njih, onosi bolje rezultate i u oblastima društvenih nauka I zanimanja koja nisu usko vezana za STEM nauke.",        "Precizni svet STEM metodologije uvek od nas zahteva da definišemo izvor nekog podatka koji mora biti poizdan, istinit i verifikovan kao takav konsenzusom naučne zajednice. Definiciju značenja skraćenice STEM smo mogli da uzmemo sa velikog broja sajtova uključujući i Wikipediju. Međutim sa obzirom da je ova enciklopedija otvorena i da svako može dodati svoj komentar ne možemo je uzeti kao validnu već smo pojam uzeli sa zvaničnog sajta enciklopedije Britanike i ovo će bit naš prvi citat pod brojem [1]. Na kraju priručnika postavićemo pregled literature kao i link ka sajtu sa kojeg smo uzeli definiciju u obliku [1] https://www.britannica.com/topic/STEM-education/STEM-education.",
"Kroz niz STEM vežbi probaćemo da svet STEM približimo kao deci tako i njihovim vaspitačima. Na rtomputu probaćemo da se držimo nekih osnovnih koncepata. Prvi je da ćemo prilikom rada sa decom koristiti što viče egztaktnih matematičkih pojmova. Prilikom vežbi isticaćemo eci matematičke oblike u svetu koji nas oružuje, prebrojavaćemo prebrojive pojmove svaki dan, raspoređivaćemo oblike po veličini. Drugi aspekt je da ćemo zajedno sa decom obratiti posebnu pažnju na pojave u svetu oko nas. Isticaćemo deci da obrate pažn ju u svakoj aktiovnosti na ono što vide, osete, okuse ili čuju. Treći aspekt je da ćemo deci postavljati otvorena pitanja, na koja nećemo očekivati konačne i jdnoznačne odgovore.",
"Vaspitač će pratiti dete u aktivnosti, a ne obratno. STEM je istraživanje, kao rezultat istraživanja deca trebaju da donose samostalne zaključke, postavljaju hipoteze, donose pogređne zaključke i uče da ih kritičkim razmatranjem ili novim saznanjem menjaju. Time se postiže fleksibilnost u budućem razvoju i veći stepšen samopouzdanja, gubi se strah od pogrešnih odgovora. Idući bitni spekt je da mi moramo da učimo zajedno sa decom, STEM proizvodi nova pitanja na koja mi možda trenutno nemamo odgovore, tako da smo mi deo sveta STEM razvojha. I najposle korisite knjige, internet i ogromne baze STEM aktivnosti koje su razvili vaspitači širom sveta."



];

    foreach ($pasusi as $index => $pasus) {
        echo "<p class='efekat-ulaska' style='transition-delay: " . ($index + 1) . "s;'>$pasus</p>";
    }
    ?>
</div>
@include('front.inc.footer')

<script>
    window.onload = function() {
        // Funkcija za postavljanje efekta ulaska za svaki pasus
        function prikaziPasuse() {
            const pasusi = document.querySelectorAll('.tekst-efekat .efekat-ulaska'); // Selektujemo sve pasuse unutar elementa sa klasom 'tekst-efekat' i 'efekat-ulaska'

            // Iteriramo kroz sve pasuse i dodajemo im stil za efekat ulaska
            pasusi.forEach((pasus, index) => {
                setTimeout(() => {
                    pasus.style.opacity = '1'; // Postavljanje opacity na 1 (tekst postaje vidljiv)
                }, 1000 * (index + 1)); // Svaki sledeći pasus će se pojaviti nakon prethodnog, sa kašnjenjem od 1 sekunde
            });
        }

        prikaziPasuse(); // Pozivamo funkciju kada se učita stranica
    };
</script>

</body>
</html>
