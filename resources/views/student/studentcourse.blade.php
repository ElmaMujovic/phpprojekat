@extends('front.layouts.layoutstudent')
@section('content')
<style>
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
        margin-right:60px;
    }

    .btn_7 {
        margin-left: 30px;
        margin-top: 20px;
        width: 140px; /* Smanjena širina dugmeta za tablete */
    }
}

/* Telefoni (ekrani sa širinom ispod 600px) */
@media (max-width: 600px) {
    .single_special_cource {
        margin-bottom: 15px;
    }

    .aktivne-teme-title {
        font-size: 36px; /* Smanjena veličina fonta za telefone */
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
        <h1 class="aktivne-teme-title">Moje teme</h1>
        <br>
        <div class="row">
    @foreach ($courses as $course)
    @if ($course->state == 'otvoren')
    <div class="col-sm-6 col-md-4 col-lg-4">
        <div class="single_special_cource">
            <img src="/images/{{$course->image}}" class="special_img" alt="">
            <div class="special_cource_text">
                <h4 style="color: black">{{$course->state}}</h4>
                <a><h3 style="color:black">{{$course->course}}</h3></a>
                <p>{{$course->infomation}}</p>
                <h5>Materijal</h5>
                @foreach ($lectures as $lecture)
                @if ($course->course == $lecture->course)
                <ul>
                    <li>{{$lecture->textlecture}}</li>
                    <h4><a style="color:black;" href="{{url('/download',$lecture->file)}}"><i class="fa fa-download" aria-hidden="true"></i></a></h4>
                    <li>- <span class="fa fa-file-text"></span> {{$lecture->file}}</li>
                    <br>
                </ul>
                @endif
                @endforeach
                <br>
                <h5 style="color:black;">Predložene ankete:</h5>
                @foreach ($tests as $ts)
                @if ($course->id == $ts->course_id)
                <form action="">
                    <a href="{{"testload/".$ts['id']}}" class="btn_4">{{$ts->nameT}}</a>
                </form>
                @endif
                @endforeach
                <br>
   


                        <!-- Komentari -->
                        <h5>Komentari:</h5>

                        <div>
                            <button class="btn btn-primary" onclick="toggleCommentForm({{ $course->id }})">Dodaj komentar</button>
                            <div id="comment-form-{{ $course->id }}" style="display: none; margin-top: 10px;">
                                <form action="{{ route('comment.store', $course) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="comment" class="form-control" rows="3" required></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sačuvaj komentar</button>
                                </form>
                            </div>
                        </div>

                        <br>

                        @foreach ($course->comments as $comment)
                        <div class="comment">
                            <strong>{{ $comment->user->name }}</strong>
                            <p>{{ $comment->comment }}</p>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            @endif
            @endforeach
        </div>
        <br>
        <br>
    </div>
</div>

<script>
function toggleCommentForm(courseId) {
    var form = document.getElementById('comment-form-' + courseId);
    if (form.style.display === "none") {
        form.style.display = "block";
    } else {
        form.style.display = "none";
    }
}
</script>

@endsection
