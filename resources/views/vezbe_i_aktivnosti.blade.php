
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

        /* Stil za linkove vezbi */
        .veza-vezbe {
            display: block; /* Blok element za pravilno prikazivanje linkova */
            margin-bottom: 10px; /* Dodatni prostor ispod svakog linka */
            color: #3498db; /* Boja linkova */
            cursor: pointer; /* Kursor u obliku ruke */
        }

        /* Stil za skrivanje detalja vezbi */
        .detalji-vezbe {
            display: none; /* Detalji vezbi su inicijalno skriveni */
            margin-top: 20px; /* Dodatni prostor iznad detalja */
        }

        /* Stil za prikazivanje detalja vezbi kada se aktivira */
        .vezba-aktivna .detalji-vezbe {
            display: block; /* Detalji vezbi postaju vidljivi kada je vezba aktivna */
        }
        .detalji-vezbe p {
        font-size: 14px; /* Smanjenje veličine teksta */
        margin: 10px 0; /* Smanjenje razmaka između pasusa */
    }

    /* Podebljano slova za određene delove teksta */
    .detalji-vezbe strong {
        font-weight: bold; /* Podebljano slova */
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
    <h3 class="naslov">Vežbe i aktivnosti</h3>
    <div class="plava-linija"></div> <!-- Plava linija -->
</div>

<div class="tekst-efekat">
    <a class="veza-vezbe" onclick="prikaziVezbu('vezba1')">Vežba 1 - Napravimo brod</a>
    <a class="veza-vezbe" onclick="prikaziVezbu('vezba2')">Vežba 2 - Budimo inžinjeri</a>
    <a class="veza-vezbe" onclick="prikaziVezbu('vezba3')">Vežba 3 - Igrajmo se bojama</a>

    <div class="detalji-vezbe" id="vezba1">
    <h4>Detalji vežbe</h4>
    <p><strong>Opis vežbe:</strong> Jesen donosi razne plodove, jedan od najčuvenijih su jabuke. Prvo ćemo deci pomoći da se jabuke preseču na dve jednake polovine. Možemo izdubiti jabuku da više liči na čamac, ali to neće uticati na njene plovne karakteristike.</p>
    <p><strong>Ciljevi razvoja:</strong> Razvojni ciljevi ??????????</p>
    <p><strong>Materijal:</strong> Kadice za vodu, jabuke, drvca za roštilj, papir</p>
    <p><strong>Zadaci za decu:</strong> U sredinu polovine jabuke postavimo drvce od roštilja. Isečemo parče papira prizvoljnog oblika i napravimo dve rupe u istom. Drvce provučemo kroz papir i time smo napravili jedro. Brodove od jabuke stavimo u kadice damo deci zadatak da ih pokrenu na najlakši mogući način.</p>
    <p><strong>Link igrice:</strong> Link ka igrici</p>
    <p><strong>Statistički podaci igre:</strong> Link ka statističkim podacima igre</p>
    <p><strong>Opšti statistički podaci:</strong> Link ka opštim statističkim podacima</p>
</div>




<div class="detalji-vezbe" id="vezba2">
    <h4>Detalji vežbe</h4>
    <p><strong>Opis vežbe:</strong> Kombinacijom čačkalica, drvaca za roštilj i gumenim bombnima kao vezivnim materijalom sa decom pravimo osnovne geometrijske oblike. Nakon toga proširujem izradu i oblika u trećoj dimenziji, piramida, kocki i kvadara.</p>
    <p><strong>Ciljevi razvoja:</strong> Razvojni ciljevi ??????????</p>
    <p><strong>Materijal:</strong> Čačkalice, drvca za roštilj, gumeni bomboni</p>
    <p><strong>Zadaci za decu:</strong> U sredinu polovine jabuke postavimo drvce od roštilja. Isečemo parče papira prizvoljnog oblika I napravimo dve rupe u istom. Drvce provučemo kroz papir i time smo napravili jedro. Brodove od jabuke stavimo u kadice damo deci zadatak da ih pokrenu na najlakči kogući način.</p>
    <p><strong>Link igrice:</strong> Link ka igrici 1</p>
    <p><strong>Statistički podaci igre:</strong> Link ka statistickim podacima igre</p>
    <p><strong>Opšti statistički podaci:</strong> Link ka opstim statistickim podacima</p>
</div>


<div class="detalji-vezbe" id="vezba3">
    <h4>Detalji vežbe</h4>
    <p><strong>Opis vežbe:</strong> Markerom u boji nacrtamo krug oko centra filtera za kafu. Na onom delu gde izguzvani deo sreće centralni glatki deo. Presavijmo filtar za kafu jendom na pola, pa ponovimo dok nedobijemo oblik kupe. Uzmimo čašu vode I stavvimo vrh ovako dobijene kupe u čašu. Vodimo računa da ne ovlažimo nacrtani prestem.</p>
    <p><strong>Ciljevi razvoja:</strong> Razvojni ciljevi ??????????</p>
    <p><strong>Materijal:</strong> Markeri u boji, filter za kafu, čaša vode</p>
    <p><strong>Zadaci za decu:</strong> Šta se dešava sa bojom? U kojem smeru boje idu?</p>
    <p><strong>Link igrice:</strong> Link ka igrici</p>
    <p><strong>Statistički podaci igre:</strong> Link ka statistickim podacima igre</p>
    <p><strong>Opšti statistički podaci:</strong> Link ka opstim statistickim podacima</p>
</div>

</div>
@include('front.inc.footer')


<script>
    function prikaziVezbu(vezba) {
        // Sakrij sve detalje vezbi
        document.querySelectorAll('.detalji-vezbe').forEach(element => {
            element.style.display = 'none';
        });

        // Prikazi samo detalje za odabranu vezbu
        document.getElementById(vezba).style.display = 'block';
    }
</script>

</body>
</html>
