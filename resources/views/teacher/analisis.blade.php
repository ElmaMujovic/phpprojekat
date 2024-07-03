@extends('front.layouts.layoutteacher')

@section('content')
<style>
    .section-rod1 {
        padding: 20px;
    }

    .blog_part_rod1 {
        padding: 20px;
    }

    .card_rod1 {
        background-color: #fff;
        margin-bottom: 20px;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
    }

    .card_rod1 h4 {
        font-size: 24px;
        margin-bottom: 10px;
    }

    .card_rod1 hr {
        border-top: 1px solid #7facf0;
        margin-top: 10px;
        margin-bottom: 20px;
    }

    .table_rod1{
        width: 100%;
        border-collapse: collapse;
        border: 1px solid #ccc;
    }

    .table_rod1 thead_rod th, .table_rod tbody_rod td {
        padding: 12px;
        text-align: left;
        font-size: 16px;
    }

    .table_rod1 thead_rod th {
        background-color: #7facf0;
        color: white;
        font-weight: bold;
    }

    .table_rod1 tbody_rod tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    .btn-danger-rod1 {
        background-color: #696969;
        border-color: #FFFAF0;
        color: white;
        font-size: 14px;
        padding: 8px 16px;
        border-radius: 4px;
        display: block;
        margin: 0 auto; /* Center button */
    }
    .btn-danger-rod1:hover {
        background-color: #4682B4;
        border-color: #FFFAF0;
    }

    /* Responsive adjustments */
    @media only screen and (max-width: 768px) {
        .card_rod1 {
            padding: 10px;
        }
        .card_rod1 h4 {
            font-size: 20px;
        }
        .table_rod1 {
            font-size: 14px;
        }
    }

    @media only screen and (max-width: 480px) {
        .card_rod1 {
            padding: 5px;
        }
        .card_rod1 h4 {
            font-size: 18px;
        }
        .table_rod1 {
            font-size: 12px;
        }
    }
</style>

<div class="section-rod1">
    <div class="blog_part_rod section_padding1">
        <h1>Roditelji</h1><br>

        @foreach ($course as $cs)
            @if(Session::get('loginId') == $cs->idUser && $cs->state == 'otvoren')
                <div class="card_rod1">
                    <h4>Kurs: <b>{{ $cs->course }}</b></h4>
                    <hr>
                    <div class="card-body1">
                        <table class="table_rod1">
                            <thead class="thead_rod1">
                                <tr>
                                    <th>Ime</th>
                                    <th>Prezime</th>
                                    <th>Email</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody class="tbody_rod1">
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
                                                    <button type="submit" class="btn btn-danger-rod1">Ukloni sa kursa</button>
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
