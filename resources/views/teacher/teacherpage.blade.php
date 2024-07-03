@extends('front.layouts.layoutteacher')
@section('content')

<style>
.aktivne-teme-title {
    text-align: center;
    font-size: 64px;
    font-weight: bold;
    color: orange;
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
    background-color: #e0e0e0;
    border-radius: 2px;
}

.btn_7 {
    background-color: #f0f0f0;
    color: black;
    border: 2px solid #ccc;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    transition-duration: 0.4s;
    margin-left: 120px;
    margin-top: 40px;
    width: 220px;
}

.btn_7:hover {
    background-color: #ddd;
    border: 2px solid #aaa;
}

.btn_8 {
    background-color: #f0f0f0;
    color: black;
    border: 2px solid #ccc;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    cursor: pointer;
    border-radius: 5px;
    transition-duration: 0.4s;
    margin-left: 120px;
    margin-top: 40px;
    width: 120px;
}

.btn_8:hover {
    background-color: #ddd;
    border: 2px solid #aaa;
}

.card {
    margin-bottom: 40px;
    transition: box-shadow 0.3s ease, transform 0.3s ease;
    background-color: #f0f0f0;
}

.card:hover {
    box-shadow: 0px 10px 20px rgba(0, 0, 0, 0.2), 0 6px 6px rgba(0, 0, 0, 0.1);
    transform: translateY(-10px);
    background-color: #e0e0e0;
}

.card-img-top.special_img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.card-body {
    padding: 20px;
}

.card-title {
    color: black;
}

@media (max-width: 768px) {
    .card {
        margin-bottom: 20px;
        margin-left: 10px;
    }

    .card-title {
        font-size: 18px;
    }
}

@media (max-width: 600px) {
    .card {
        margin-bottom: 15px;
    }

    .card-title {
        font-size: 16px;
    }
}

@media (max-width: 992px) {
    .card {
        margin-bottom: 20px;
    }
}

@media (max-width: 768px) {
    .card {
        margin-bottom: 15px;
    }
}

@media (max-width: 576px) {
    .card {
        margin-bottom: 10px;
    }
}
</style>





<div class="section-2">
    <div class="blog_part section_padding" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <h1 class="aktivne-teme-title">Nova tema:</h1>
        <label for="modal-switch" class="btn btn-default btn-primary custom-button" role="button" data-toggle="modal" data-target="#addCourseModal">Formiraj novu temu</label>
        <label class="btn btn-default btn-primary custom-button" onclick="myFunctionCourse()" role="button">Postavi materijal</label>
          </div>
         <div class="row">
        <div hidden id="adcourse" class="col-sm-6">
                <div style="background-color:#2530ae98;border:1px solid black;border-radius:10px;" class="card">
                    <div class="card-body" style="background-color: #85adad;  ">
                        <div   class="card-body">
                            <button onclick="myFunctionTest()" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                &times;
                           </span>
                           
                           </button><br>
                        <form action="{{ route('addLectures') }}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field() }}
                            <p  style="color: black; font-weight: bold; font-size: 18px; margin-bottom: 10px; display: block; font-family: Arial, sans-serif; text-transform: uppercase; letter-spacing: 1px;">Odaberi temu:</p>
                            <select class="form-control form-control-sm" name="course">
                                @foreach ($courses as $course)
                                @if ( $course->state=='otvoren' && Session::get('loginId')==$course->idUser)
                                   <option value="{{$course->course}}">{{$course->course}}</option>
                                @endif
                                @endforeach
                            </select>
                            <p  style="color: black; font-weight: bold; font-size: 18px; margin-bottom: 10px; display: block; font-family: Arial, sans-serif; text-transform: uppercase; letter-spacing: 1px;" class="mt-1" for="picturenews">Opis materijala: </p>
                        <textarea type="text" class="form-control form-control-sm"  style="height:68px;"  name="textlecture" id="textlecture"></textarea>
                        <br>
                        <p  style="color: black; font-weight: bold; font-size: 18px; margin-bottom: 10px; display: block; font-family: Arial, sans-serif; text-transform: uppercase; letter-spacing: 1px;" class="mt-1" for="picturenews">Materijal: </p>
                        <input type="file" class="form-control form-control-sm"  style="height: 38px;"  name="file" id="file" />
                        <br>
                        <button class="btn_7" >Sačuvaj materijal</button>
                    </form>
                    </div>
                </div>
            </div>
  </div>
</div>
    <div class="col-md-6">
        @if (\Session::has('success'))
          <p class="alert alert-danger" style="background-color:  rgb(101, 179, 213); ">{{\Session::get('success')}}</p>
        @endif
    </div>
<div class="pure-css-bootstrap-modal">
    <input type="checkbox" id="modal-switch"/>
    <div class="modal fade" id="addCourseModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <label class="modal-backdrop fade" for="modal-switch"></label>
        <div class="modal-dialog" role="document">
            <form action="{{ route('addCourse') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content" style="background-color: #85adad;">
                    <div class="modal-header">
                        <label for="modal-switch" class="close" data-dismiss="modal" aria-label="Close" style="display: flex; align-items: center;">
                            <span aria-hidden="true">
                                 &times;
                            </span>
                        </label>
                        <h4 class="modal-title" id="myModalLabel">Dodaj temu</h4>
                        <input type="text" id="idUser" name="idUser" hidden value="{{Session::get('loginId')}}"/>
                        <input type="text" id="imePredavaca" name="imePredavaca" hidden value="{{Session::get('name')}} {{Session::get('lastname')}} "/>
                    </div>
                    <div class="modal-body" >
                        <label>Tema:</label>
                        <input type="text" class="form-control form-control-sm" style="height: 38px;" name="course" id="course" placeholder="Enter course name" required>
                        <br>
                        <label>Detalji teme:</label>
                        <input type="text" class="form-control form-control-sm" style="height: 38px;" name="infomation" id="infomation" placeholder="Enter detail text" required/>
                        <label class="mt-1" for="picturenews">Slika teme: </label>
                        <input type="file" class="form-control form-control-sm"  style="height: 38px;"  name="image" id="image" />
                        <br>
                        <input type="text" class="form-control form-control-sm" hidden style="height: 38px;" name="state" id="state" value="otvoren"/>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn_8">Sačuvaj</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <br>
    <h1 style="text-align: center; margin-top: 20px;">Zatvorene teme:</h1>
    <br>
    <div class="row">
    @foreach ($courses as $course)
    @if ($course->state == 'zatvoren' && Session::get('loginId') == $course->idUser)
    <div class="col-sm-6 col-md-4">
        <div class="single-home-blog">
            <div class="card">
                <img src="/images/{{$course->image}}" class="card-img-top special_img" alt="blog">
                <div class="card-body">
                    <a href="/">
                        <p hidden href="#">{{$course->id}}</p>
                        <h5 class="card-title">{{$course->course}}</h5>
                    </a>
                    <ul>
                        <li><p style="color:#7facf0">Predavač:</p></li>
                        <li> {{$course['imePredavaca']}}</li>
                    </ul><br>
                    <p>{{$course['infomation']}}</p>
                    <h4>Predavanja:</h4><br>
                    @foreach ($lectures as $lecture )
                    @if ($course->course == $lecture->course)
                    <ul>
                        <li>{{$lecture->textlecture}}</li>
                        <li>- <span class="fa fa-file-text"></span> {{$lecture->file}}</li>
                    </ul>
                    @endif
                    @endforeach
                    <p style="color:#7facf0">{{$course->state}}</p>
                    <ul>
                        <li style="color: black"><span class="fa fa-calendar"></span>{{$course->updated_at}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>

    <h1  style="text-align: center; margin-top: 20px;">  Otvorene teme: </h1>
    <br>
    <div class="row">
    @foreach ($courses as $course)
    @if ($course->state == 'otvoren' && Session::get('loginId') == $course->idUser)
    <div class="col-sm-4 col-lg-4 col-xl-4">
        <div class="single-home-blog">
            <div class="card">
                <img src="/images/{{$course->image}}" class="card-img-top special_img" alt="blog">
                <div class="card-body">
                    <a href="/">
                        <h5 class="card-title">{{$course->course}}</h5>
                    </a>
                    <ul>
                        <li><p style="color: black">Predavač:</p></li>
                        <li style="color: black"> {{$course['imePredavaca']}}</li>
                    </ul>
                    <br>
                    <p>{{$course['infomation']}}</p>
                    <h4>Predavanja:</h4><br>
                    @foreach ($lectures as $lecture)
                    @if ($course->course == $lecture->course)
                    <ul>
                        <li>{{$lecture->textlecture}}</li>
                        <li>- <span class="fa fa-file-text"></span> {{$lecture->file}}</li>
                    </ul>
                    @endif
                    @endforeach
                    <p style="color:blue">{{$course->state}}</p>
                    <br>
                    <form action="closeCourses" method="POST">
                        <a class="btn_1" href="{{"teacherpage/".$course['id']}}">Zatvori temu </a>
                        @csrf
                    </form>
                    <ul>
                        <li style="color: black"><span class="fa fa-calendar"></span>{{$course->created_at}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif
    @endforeach
</div>

</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
@endsection
