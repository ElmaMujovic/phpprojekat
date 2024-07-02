@extends('front.layouts.layoutteacher')

@section('content')
<style>
    /* Custom CSS styles */
    #tabela {
        display: none;
    }

    #myChart {
        margin-top: 20px;
        max-width: 600px;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
</style>

<div class="section-2">
    <div class="blog_part section_padding">
        <h1>Rezultat testa: <b>{{ $tests->nameT }}</b></h1>
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
            <tbody>
                @foreach ($results as $re)
                    @if ($re->test_id == $tests->id)
                        <tr>
                            <td>{{ $re->users[0]['firstname'] }}</td>
                            <td>{{ $re->users[0]['lastname'] }}</td>
                            <td>{{ $re->yes_ans }}</td>
                            <td>{{ $re->no_ans }}</td>
                            <td>{{ $re->yes_ans + $re->no_ans }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>
        <canvas id="myChart" width="400" height="200"></canvas>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Retrieve data from the table
    var table = document.getElementById('tabela');
    var rows = table.getElementsByTagName('tr');
    var positiveCount = 0;
    var negativeCount = 0;
    var questionCount = 0;

    for (var i = 1; i < rows.length; i++) { // Skip the header row
        var cells = rows[i].getElementsByTagName('td');
        positiveCount += parseInt(cells[2].innerText);
        negativeCount += parseInt(cells[3].innerText);
        questionCount += parseInt(cells[4].innerText);
    }

    // Create chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Broj pozitivnih DA', 'Broj negativnih NE', 'Ukupno pitanja'],
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
