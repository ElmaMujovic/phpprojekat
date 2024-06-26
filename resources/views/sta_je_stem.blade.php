
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
        "Metodologija naučnog istraživanja nam sugeriše da je prvi korak da razjasnimo samo značenje ovog pojma. STEM je skraćenica od pojmova Science, Technology, Engineering, and Mathematics. Odnosno Nauka (bitno je naglasiti da se u Engleskom jezikom pod ovim terminom objedinjuju sve prirodne nauke fizika, hemija, biologija…), Inžinjering (sve forme inžinjerskih disciplina graževinarstvo, elektrtehnika, arhitektura,…),  Tehnologija i Matematika. Pošto je ovaj priručnik namenjem vaspitačima u predškolskim ustanovama, koji su većinu svog obrazivanja posvetili društvenim i humanističkim naukama moramo nekako termine koji su karakteristični za prirodne nauke približiti, da bi razumeli i olašali ulazak deci i njihovim vaspitačima u čudesni svet prirodnih nauka kojim vladaju brojevi.",
        "Precizni svet STEM metodologije uvek od nas zahteva da definišemo izvor nekog podatka koji mora biti poizdan, istinit i verifikovan kao takav konsenzusom naučne zajednice. Definiciju značenja skraćenice STEM smo mogli da uzmemo sa velikog broja sajtova uključujući i Wikipediju. Međutim sa obzirom da je ova enciklopedija otvorena i da svako može dodati svoj komentar ne možemo je uzeti kao validnu već smo pojam uzeli sa zvaničnog sajta enciklopedije Britanike i ovo će bit naš prvi citat pod brojem [1]. Na kraju priručnika postavićemo pregled literature kao i link ka sajtu sa kojeg smo uzeli definiciju u obliku [1] https://www.britannica.com/topic/STEM-education/STEM-education.",
        "STEM se definiše kao sistem učenja u oblastima nauke, tehnologije, inženjeringa i matematike koji je sastavljen od obrazovnih aktivnosti objedinjenih na svim nivoima obrazovanja od predškolskog do posle doktorskog, implementiran kroz formalne i neformalne oblike nastave."
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
