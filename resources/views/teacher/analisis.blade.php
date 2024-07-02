@extends('front.layouts.layoutteacher')

@section('content')
<style>
    .section-2 {
        padding: 20px;
    }

    .blog_part {
        padding: 20px;
    }

    .card {
        background-color: #fff;
        margin-bottom: 20px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card h4 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .card hr {
        border-top: 1px solid #7facf0;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
    }

    th, td {
        padding: 12px;
        text-align: left;
        font-size: 16px;
    }

    th {
        background-color: #7facf0;
        color: white;
        font-weight: bold;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .btn-danger {
        background-color: #696969;
        border-color: #FFFAF0;
        color: white;
        font-size: 14px;
        padding: 8px 16px;
        border-radius: 4px;
        display: block;
        margin: 0 auto; /* Center button */
    }
    .btn-danger:hover {
        background-color: #4682B4;
        border-color: #FFFAF0;
    }

    /* Responsive adjustments */
    @media only screen and (max-width: 768px) {
        .card {
            padding: 10px;
        }
        .card h4 {
            font-size: 20px;
        }
        table {
            font-size: 14px;
        }
    }

    @media only screen and (max-width: 480px) {
        .card {
            padding: 5px;
        }
        .card h4 {
            font-size: 18px;
        }
        table {
            font-size: 12px;
        }
    }
</style>

<div class="section-2">
    <div class="blog_part section_padding">
        <h1>Roditelji</h1><br>

        @foreach ($course as $cs)
            @if(Session::get('loginId') == $cs->idUser && $cs->state == 'otvoren')
                <div class="card">
                    <h4>Kurs: <b>{{ $cs->course }}</b></h4>
                    <hr>
                    <div class="card-body">
                        <table>
                            <thead>
                                <tr>
                                    <th>Ime</th>
                                    <th>Prezime</th>
                                    <th>Email</th>
                                    <th></th> <!-- For "Ukloni sa kursa" button -->
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($enrols as $enr)
                                    @if ($enr->idCourse == $cs->id && isset($enr->users[0]))
                                        <tr>
                                            <td>{{ $enr->users[0]['firstname'] }}</td>
                                            <td>{{ $enr->users[0]['lastname'] }}</td>
                                            <td>{{ $enr->users[0]['email'] }}</td>
                                            <td style="text-align: center;">
                                                <form action="{{ route('removeStudent') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="enrollId" value="{{ $enr->id }}">
                                                    <button type="submit" class="btn btn-danger">Ukloni sa kursa</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>
@endsection
