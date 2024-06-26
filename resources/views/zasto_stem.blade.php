
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
    <h3 class="naslov">Zašto STEM?</h3>
    <div class="plava-linija"></div> <!-- Plava linija -->
</div>

<div class="tekst-efekat">
    <?php
    $pasusi = [
        "Tokom druge polovine dvadestog veka, zemlje u razvoju su pokušavale da poboljšaju obrazovanje iz oblasti nauke, matematike i tehničkih nauka uopšte. Glavni razlog je bila želja da se razviju obrazovni programi koji će dovesti ne samo do boljeg razumevanja ovih oblasti, već i do stvraanja radne snage koja će se baviti inžrnjerijom i naukom. Razvoj veština u ovim oblastima ovu radnu snagu postavlja u centar modernih trendova svetske ekonomije. Uzor svima su SAD kao centar modernog naučnog i tehničkog razvoja. Samo od 2000. do 2010. broj radnih mesta koje su zahtevale STEM znanja se u SAD utrostručio u odnosu na druge ekonomske oblasti. Ovo je bio signal ostatku sveta u kom smeru treba tražiti šansu i stvoriti osnovu budućih neophodnih znanja. Ono što je sigurno da poslodavci žele što više mladih i perspektivnih kadrova koji vladaju STEM veštinama. Međutim dugogdoišnji imidž STEM aktivnosti kao klasično muških zanimanja su doveli do toga da mali broj devojaka okuča sređu u STEM poslovima, drugi bitan aspekt je dostupnost i cena tehnologije. Siromašnim društvima neke tehnologije su skupe i nedostupne, samim tim čitave društvene zajednice ostaju uskraćene za učešće u uzbudljivoj tehnološkoj revoluciji.",
        "Prethodno navedeno može da nas navede na pogrešan zaključak da je STEM jedini odgovor na izazove budućnosti. kao i u svemu ovo nije u potpunosti istinito. Prvi problem je da je STEM relativno nov pojam i postavlja se pitanje šta su to STEM poslovi. Ako pitamo ljude koji su uključeni u bilo koji od oblasti navedenih u definiciji STEM, oni će Vam reći da je odgovor na ovo pitanje veoma jednostavan. STEM poslovi su bilo koje aktivnosti i poslovi za čije uspešno sprovođenje je nephodno znanje i/ili poznavanje oblasti prirodnih nauka, matematike, tehnologije ili inženjeringa. Ovakva definicija, ako je prihvatimo bi ograničila STEM na usko stručno obrazovanje, i time bi bilo irelevantno za decu u osnovnim šlkolama, kao i za najmlađe uzraste u vrtićima i predškolskim ustanovama.",
        "Suočeni, sa ovim istovremeno uzimajući u obzir da su znanja i zanimanja koja koriste znanja iz ovih oblasti šira od uske definicije istih Privredna Komora SAD je definisala STEM poslove kao one koji zahtevaju specijalizovana znanja, ali ne zahtevaju formalnu iplomu iz istih oblasti. Dalje STEM poslovi su podeljeni na četiri posebne kategorije: računarstvo i matematika, inženjerija i nadzor, fizičke i humanističke nauke i STEM upravljanje. U ovakvoj podeli nisu obuhvaćene društveno humanističke nauke kao ni obrazovne aktivnosti."



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
