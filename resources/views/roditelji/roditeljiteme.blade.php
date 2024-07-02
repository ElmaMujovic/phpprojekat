@extends('front.layouts.layoutstudent')

@section('content')
<style>
    .row {
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
    }

    .col-sm-6, .col-md-4, .col-lg-4 {
        display: flex;
        flex: 1 1 calc(33.333% - 20px); /* Adjust the width of the columns to fit in a row with some gap */
        margin: 10px;
    }

    .single_special_cource {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        margin-bottom: 30px;
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        background-color: #ffffff;
        border-radius: 10px;
        overflow: hidden;
        flex: 1;
    }

    .single_special_cource:hover {
        box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.1);
        transform: translateY(-10px);
        background-color: #f5f5f5;
    }

    .single_special_cource img.special_img {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .special_cource_text {
        padding: 20px;
        flex-grow: 1; /* Ensures the text area grows to take up space */
    }

    .aktivne-teme-title {
        text-align: center;
        font-size: 48px;
        font-weight: bold;
        color: #ff8800;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 2px;
        position: relative;
    }

    .aktivne-teme-title::after {
        content: '';
        position: absolute;
        left: 50%;
        bottom: -10px;
        transform: translateX(-50%);
        width: 70px;
        height: 4px;
        background-color: #ff8800;
        border-radius: 2px;
    }

    .btn_7 {
        background-color: #ff8800;
        color: white;
        border: none;
        padding: 10px 20px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 5px;
        transition: background-color 0.4s ease, transform 0.4s ease;
        align-self: center; /* Centers the button horizontally */
    }

    .btn_7:hover {
        background-color: #e67600;
        transform: scale(1.05);
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .col-sm-6, .col-md-4, .col-lg-4 {
            flex: 1 1 calc(50% - 20px); /* Two columns on tablets */
        }

        .aktivne-teme-title {
            font-size: 36px;
        }

        .btn_7 {
            width: 140px;
        }
    }

    @media (max-width: 600px) {
        .col-sm-6, .col-md-4, .col-lg-4 {
            flex: 1 1 calc(100% - 20px); /* One column on phones */
        }

        .aktivne-teme-title {
            font-size: 28px;
        }

        .btn_7 {
            width: 120px;
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
                                            <a href="{{"testload/".$ts['id']}}" class="btn_7">{{$ts->nameT}}</a>
                                        </form>
                                    @endif
                                @endforeach
                                <br>
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
                                        <strong>{{ $comment->user->firstname }}: {{ $comment->comment }}</strong>
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
        form.style.display = form.style.display === "none" ? "block" : "none";
    }
</script>
@endsection
