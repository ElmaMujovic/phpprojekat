@extends('front.layouts.layoutteacher')
@section('content')
    <div class="section-2">
        <div class="blog_part section_padding">
            <h1>Tačna pitanja za odgovor: {{ $answer }}</h1>
            <br>
            <table id="tabela">
                <thead>
                <tr style="background-color: rgb(0, 204, 255)">
                    <th>Redni broj</th>
                    <th>Pitanje</th>
                    <th>Odgovor A</th>
                    <th>Odgovor B</th>
                    <th>Odgovor C</th>
                    <th>Odgovor D</th>
                    <th>Tačan odgovor</th>
                </tr>
                </thead>
                <tbody>
                @foreach($questions as $key => $question)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $question->question }}</td>
                        <td>{{ $question->a }}</td>
                        <td>{{ $question->b }}</td>
                        <td>{{ $question->c }}</td>
                        <td>{{ $question->d }}</td>
                        <td>{{ $question->answer }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
