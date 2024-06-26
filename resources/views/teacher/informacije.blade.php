@extends('front.layouts.layoutteacher')

@section('content')
<style>
    /* Sakrivanje tabele */
    #tabela {
        display: none;
    }
</style>

<div class="section-2">
    <div class="blog_part section_padding">
        <h1>Rezultat testa: <b>{{$tests->nameT}}</b></h1>
        <br>
        <table id="tabela">
            <thead>
                <tr style="background-color: rgb(0, 204, 255)">
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>Broj pozitivnih:</th>
                    <th>Broj negativnih:</th>
                    <th>Broj pitanja:</th>
                </tr>
            </thead>
            @foreach ($results as $re)
                @if($re->test_id==$tests->id)
                <tr>
                    <td>{{$re->users[0]['firstname']}}</td>
                    <td>{{$re->users[0]['lastname']}}</td>
                    <td>{{$re->yes_ans}}</td>
                    <td>{{$re->no_ans}}</td>
                    <td>{{$re->yes_ans + $re->no_ans}}</td>
                </tr>
                @endif
            @endforeach
        </table>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Prikupljanje podataka iz tabele
    var table = document.getElementById('tabela');
    var rows = table.getElementsByTagName('tr');
    var positiveCount = 0;
    var negativeCount = 0;
    var questionCount = 0;

    for (var i = 1; i < rows.length; i++) { // Preskačemo prvi redak koji je zaglavlje
        var cells = rows[i].getElementsByTagName('td');
        positiveCount += parseInt(cells[2].innerText);
        negativeCount += parseInt(cells[3].innerText);
        questionCount += parseInt(cells[4].innerText);
    }

    // Kreiranje grafikona
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Broj pozitivnih', 'Broj negativnih', 'Ukupno pitanja'],
            datasets: [{
                label: 'Rezultati testa',
                data: [positiveCount, negativeCount, questionCount],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                    labels: {
                        font: {
                            size: 14,
                        }
                    }
                },
                title: {
                    display: true,
                    text: 'Statistika rezultata testa',
                    font: {
                        size: 18,
                        weight: 'bold'
                    }
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1
                    }
                }
            }
        }
    });
});
</script>
@endsection
