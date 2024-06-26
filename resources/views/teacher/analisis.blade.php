@extends('front.layouts.layoutteacher')
@section('content')
<div class="section-2">
    <div class="blog_part section_padding">
        <h1 class="col-md-9">Polaznici teme</h1><br>

        @foreach ($course as $cs)
            @if(Session::get('loginId') == $cs->idUser && $cs->state == 'otvoren')
                <div style="background-color: rgba(252, 252, 255, 0.892);" class="card col-md-9">
                    <h4 style="margin-left:33%; padding-top:34px;"> Kurs: <b>{{$cs->course}}</b></h4><hr>
                    <div class="card-body">
                        <table id="tabela1">
                            <thead>
                                <tr style="background-color: #7facf0">
                                    <th>Ime</th>
                                    <th>Prezime</th>
                                    <th>Email:</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enrols as $enr)
                                    @if($enr->idCourse == $cs->id)
                                        @if(isset($enr->users[0]))
                                            <tr>
                                                <td>{{$enr->users[0]['firstname']}}</td>
                                                <td>{{$enr->users[0]['lastname']}}</td>
                                                <td>{{$enr->users[0]['email']}}</td>
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div><br>
            @endif
        @endforeach
    </div>
</div>
@endsection
