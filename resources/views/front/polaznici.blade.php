@extends('front.layouts.layoutteacher')

@section('content')
    <div class="section-2">
        <div class="blog_part section_padding">
            <h1>Polaznici na vašim kursevima</h1>
            <br>
            <table>
                <thead>
                    <tr>
                        <th>Ime</th>
                        <th>Prezime</th>
                        <th>Email</th>
                        <th>Kurs</th>
                        <!-- Dodajte dodatne kolone po potrebi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($enrols as $enrol)
                        <tr>
                            <td>{{ $enrol->users->firstname }}</td>
                            <td>{{ $enrol->users->lastname }}</td>
                            <td>{{ $enrol->users->email }}</td>
                            <td>{{ $enrol->course->course }}</td>
                            <!-- Dodajte dodatne podatke koje želite prikazati -->
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
