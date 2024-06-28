@extends('front.layouts.layoutadmin')
@section('content')
<div class="section-1" style="margin: 5px; text-align: center; padding-bottom: 100px;">
<h1 style="margin-left:-140px;"></i> Registrovani Korisnici:</h1>

<style>
  body {
    overflow-x: hidden;
  }

  .my-table {
    width: 90%;
    border-collapse: collapse;
    margin: 0 auto;
  }

  .my-table th, .my-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: left;
  }

  .my-table thead {
    background-color: #ff5c33;
  }

  .my-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  .my-table tbody tr:nth-child(odd) {
    background-color: #f2f2f2;
  }

  .my-table a {
    color: green; /* Promenjena boja linka */
  }

  .my-table a:hover {
    color: darkgreen; /* Boja linka pri hoveru */
  }

  @media screen and (max-width: 768px) {
  .my-table thead {
    display: none;
  }

  .my-table, .my-table tbody, .my-table tr, .my-table td {
    display: block;
    width: 90%;
    margin: 0 auto;
  }

  .my-table tr {
    margin-bottom: 15px;
    background-color: #f2f2f2; /* Siva boja za sve redove */
  }

  .my-table td {
    text-align: right;
    padding-left: 10px; /* Pomereno levo za tekst */
    position: relative;
    background-color: #f2f2f2; /* Siva boja za sve redove */
  }

  .my-table td::before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 40%; /* Manja širina */
    font-weight: bold;
    text-align: left;
  }
}

@media screen and (max-width: 1024px) {
  .my-table thead {
    display: none;
  }

  .my-table, .my-table tbody, .my-table tr, .my-table td {
    display: block;
    width: 90%;
    margin: 0 auto;
  }

  .my-table tr {
    margin-bottom: 15px;
    background-color: #f2f2f2; /* Siva boja za sve redove */
  }

  .my-table td {
    text-align: right;
    padding-left: 10px; /* Pomereno levo za tekst */
    position: relative;
    background-color: #f2f2f2; /* Siva boja za sve redove */
  }

  .my-table td::before {
    content: attr(data-label);
    position: absolute;
    left: 0;
    width: 45%; /* Širina za oznaku */
    font-weight: bold;
    text-align: left;
  }
}

</style>

    <table class="my-table">
        <thead>
        <tr>
          <th>ID</th>
          <th>Ime</th>
          <th>Prezime</th>
          <th>Email</th>
          <th>Kontakt</th>
          <th>Zemlja Rođenja</th>
          <th>Mesto Rođenja</th>
          <th>Datum Rođenja</th>
          <th>JMBG</th>
          <th>Tip Zahteva</th>
          <th colspan="2">Zahtev</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($user as $ur)
        <tr>
          <td data-label="ID">{{$ur['id']}}</td>
          <td data-label="Ime">{{$ur['firstname']}}</td>
          <td data-label="Prezime">{{$ur['lastname']}}</td>
          <td data-label="Email">{{$ur['email']}}</td>
          <td data-label="Kontakt">{{$ur['contact']}}</td>
          <td data-label="Zemlja Rođenja">{{$ur['countryofbirth']}}</td>
          <td data-label="Mesto Rođenja">{{$ur['placeofbirth']}}</td>
          <td data-label="Datum Rođenja">{{$ur['dateofbirth']}}</td>
          <td data-label="JMBG">{{$ur['jmbg']}}</td>
          <td data-label="Tip Zahteva">{{$ur['tip']}}</td>
          <td data-label="Prihvati">
            <form action="AcceptR" method="POST">
              <a style="color:green;" title="Prihvati zahtev!" href="{{"adminpage/".$ur['id']}}"> <i class="fa fa-check-circle" style="font-size: 30px; padding-right:20px;" aria-hidden="true"></i></a>
              @csrf
            </form>
          </td>
          <td data-label="Odbij">
            <form action="{{ route('DeclineR', $ur['id']) }}" method="POST">
            @csrf
            <button type="submit" style="border:none; background:none; color:red;">
                <i class="fa fa-times-circle" style="font-size: 30px;" aria-hidden="true"></i>
            </button>
          </form>
          </td>
        </tr>
        @endforeach
        </tbody>
      </table>
      <br>
      
        <h1 style="margin-left:-160px;"></i> Korisnici Aplikacije:</h1>
        <div>
        <table class="my-table">
          <thead>
          <tr>
            <th>ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Email</th>
            <th>Kontakt</th>
            <th>Zemlja Rođenja</th>
            <th>Mesto Rođenja</th>
            <th>Datum Rođenja</th>
            <th>JMBG</th>
            <th>Vrsta Korisnika</th>
            <th>Akcija</th>
          </tr>
          </thead>
          <tbody>
          @foreach ($users as $ur)
          <tr>
           <td data-label="ID">{{$ur['id']}}</td>
           <td data-label="Ime">{{$ur['firstname']}}</td>
           <td data-label="Prezime">{{$ur['lastname']}}</td>
           <td data-label="Email">{{$ur['email']}}</td>
           <td data-label="Kontakt">{{$ur['contact']}}</td>
           <td data-label="Zemlja Rođenja">{{$ur['countryofbirth']}}</td>
           <td data-label="Mesto Rođenja">{{$ur['placeofbirth']}}</td>
           <td data-label="Datum Rođenja">{{$ur['dateofbirth']}}</td>
           <td data-label="JMBG">{{$ur['jmbg']}}</td>
           <td data-label="Vrsta Korisnika">{{$ur['tip']}}</td>
           <td data-label="Obriši">
            <form action="{{route('deleteUser',$ur->id)}}" method="POST">
              @csrf
              @method('delete')
              <button style="color:black; background-color:#ff0000" title="Obriši Korisnika!"> Obriši
              </button>
            </form>
          </td>
          </tr>
          @endforeach
          </tbody>
        </table>
        </div>
</div>
@endsection
