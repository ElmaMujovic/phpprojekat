@extends('front.layouts.layoutteacher')
@section('content')

<div class="section-2">
    <div class="blog_part section_padding">
        <h1>Ankete:</h1>
        <label style="background-color: #b2ccf2; color:black" class="btn btn-default btn-primary" onclick="myFunctionCourse()" role="button">Formiraj anketu</label>
        <div class="col-md-6">
            @if (\Session::has('success'))
            <p class="alert alert-success">{{ \Session::get('success') }}</p>
            @endif
        </div>
        <div class="row">
            <div hidden id="adcourse" class="col-sm-6">
                <div style="background-color:#2530ae98;border:1px solid black;border-radius:10px;" class="card">
                    <div class="card-body">
                        <button onclick="myFunctionTest()" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <form action="{{ route('addTest') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <p>Odaberi temu</p>
                            <select class="form-control form-control-sm" name="valueid">
                                @foreach ($courses as $course)
                                @if ($course->state == 'otvoren' && Session::get('loginId') == $course->idUser)
                                <option value="{{ $course->id }}">{{ $course->course }}</option>
                                @endif
                                @endforeach
                            </select>
                            <p class="mt-1" for="nametest">Naziv teme:</p>
                            <input type="text" class="form-control form-control-sm" style="height: 38px;" name="nametest" id="nametest" required>
                            <input type="hidden" name="tipetest" value="easy">
                            <br>
                            <button type="submit" class="btn_1">Sačuvaj Anketu</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <table style="width: 100%;">
            <thead style="background-color:#b2ccf2">
                <tr>
                    <th>Naziv Testa</th>
                    <th>Kurs</th>
                    <th>Datum kreiranja</th>
                    <th>Test Pitanja</th>
                    <th>Rezultati Testova</th>
                </tr>
            </thead>
            @foreach ($tests as $ts)
            @if (Session::get('loginId') == $ts->courses[0]['idUser'])
            <tr>
                <td>{{ $ts->nameT }}</td>
                <td>{{ $ts->courses[0]['course'] }}</td>
                <td>{{ $ts->created_at }}</td>
                <td>
                    <label for="modal-switch" style="background-color:#b2ccf2" class="btn btn-default btn-primary" role="button" data-toggle="modal" onclick="Funct({{ $ts->id }})" data-target="#addTestModal">Formiraj Pitanja</label>
                </td>
                <td>
                    <form action="">
                        <a style="border:1px solid blue;margin-bottom:6px; height:35px; border-radius:6px; " href="{{ "informacije/".$ts['id'] }}" class="btn_4"><i class="fa fa-bar-chart" aria-hidden="true"></i></a>
                    </form>
                </td>
            </tr>
            @endif
            @endforeach
        </table>
    </div>
</div>

<!-- Bootstrap Modal -->
<div class="pure-css-bootstrap-modal">
    <input type="checkbox" id="modal-switch" />
    <div class="modal fade" id="addTestModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <label class="modal-backdrop fade" for="modal-switch"></label>
        <div class="modal-dialog" role="document">
            <form action="{{ route('addQA') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-content">
                    <div class="modal-header">
                        <label for="modal-switch" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </label>
                        <h4 class="modal-title" id="myModalLabel">Kreiraj pitanje</h4>
                        <input type="hidden" id="testid" name="testid" />
                    </div>
                    <div class="modal-body">
                        <label>Pitanje:</label>
                        <input type="text" placeholder="Unesite pitanje" class="form-control form-control-sm" style="height: 38px;" name="nameq" id="nameq" required>
                        <br>
                        <div class="row">
                            <div class="col-sm-6">
                                <label>Odgovor:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" id="radioA" value="da" required>
                                    <label class="form-check-label" for="radioA">
                                        Da
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="answer" id="radioB" value="ne" required>
                                    <label class="form-check-label" for="radioB">
                                        Ne
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Sačuvaj</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    // Function to update the hidden input based on radio button selection
    function updateMojOdgovor() {
        var selectedValue = document.querySelector('input[name="answer"]:checked').value;
        document.getElementById('ans').value = selectedValue;
    }

    // Add event listener to update input on change
    var radioButtons = document.querySelectorAll('input[name="answer"]');
    radioButtons.forEach(function(radio) {
        radio.addEventListener('change', updateMojOdgovor);
    });

    // Function to set the test ID in the modal form
    function Funct(testId) {
        document.getElementById('testid').value = testId;
    }
</script>
@endsection
