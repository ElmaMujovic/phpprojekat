@extends('front.layouts.layoutteacher')
@section('content')
<div class="section-2">
    <div class="blog_part section_padding" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
        <h1>Nova tema:</h1>
        <label for="modal-switch" class="btn btn-default btn-primary custom-button" role="button" data-toggle="modal" data-target="#addCourseModal">Formiraj novu temu</label>
        <label class="btn btn-default btn-primary custom-button" onclick="myFunctionCourse()" role="button">Postavi materijal</label>
          </div>
         <div class="row">
        <div hidden id="adcourse" class="col-sm-6">
                <div style="background-color:#2530ae98;border:1px solid black;border-radius:10px;" class="card">
                    <div class="card-body">
                        <div  class="card-body">
                            <button onclick="myFunctionTest()" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">
                                &times;
                           </span>
                           </button><br>
                        <form action="{{ route('addLectures') }}" method="POST" enctype="multipart/form-data">
                            {{@csrf_field() }}
                            <p>Odaberi temu</p>
                            <select class="form-control form-control-sm" name="course">
                                @foreach ($courses as $course)
                                @if ( $course->state=='otvoren' && Session::get('loginId')==$course->idUser)
                                   <option value="{{$course->course}}">{{$course->course}}</option>
                                @endif
                                @endforeach
                            </select>
                            <p class="mt-1" for="picturenews">Opis materijala: </p>
                        <textarea type="text" class="form-control form-control-sm"  style="height:68px;"  name="textlecture" id="textlecture"></textarea>
                        <br>
                        <p class="mt-1" for="picturenews">Materijal: </p>
                        <input type="file" class="form-control form-control-sm"  style="height: 38px;"  name="file" id="file" />
                        <br>
                        <button class="btn_1">Sačuvaj materijal</button>
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
                <div class="modal-content">
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
                    <div class="modal-body">
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
                        <button type="submit" class="btn btn-primary">Sačuvaj</button>
                    </div>
                </div>
            </form>
            </div>
        </div>
    </div>
    <br>
    <h1>Zatvorene teme:</h1>
    <br>
    <div class="row">
        @foreach ($courses as $course)
        @if ($course->state=='zatvoren' && Session::get('loginId')==$course->idUser)
          <div class="col-sm-6">
              <div class="single-home-blog">
                  <div class="card">
                      <img src="/images/{{$course->image}}" class="card-img-top" alt="blog">
                      <div class="card-body">
                          <a href="/">
                            <p hidden href="#">{{$course->id}}</p>
                            <h5 class="card-title">{{$course->course}}</h5>
                          </a>
                          <ul>
                            <li><p style="color:#7facf0">Predavač:</p></li>
                            <li> {{$course['imePredavaca']}}</li>
                          </ul><br>
                          <p >{{$course['infomation']}}</p>
                          <h4>Predavanja:</h4><br>
                          @foreach ($lectures as $lecture )
                          @if ($course->course==$lecture->course)
                          <ul>
                            <li>{{$lecture->textlecture}}</dt>
                            <li>- <span class="fa fa-file-text"></span> {{$lecture->file}}</dd>
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
    <h1>  Otvorene teme: </h1>
    <br>
    <div class="row" >
        @foreach ($courses as $course )
        @if ($course->state=='otvoren' && Session::get('loginId')==$course->idUser)
          <div class="col-sm-4" >
              <div class="single-home-blog">
                  <div class="card">
                      <img src="/images/{{$course->image}}" class="card-img-top" alt="blog" style="height:20%">
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
                          @foreach ($lectures as $lecture )
                          @if ($course->course==$lecture->course)
                          <ul>
                            <li>{{$lecture->textlecture}}</dt>
                            <li>- <span class="fa fa-file-text"></span> {{$lecture->file}}</dd>
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
