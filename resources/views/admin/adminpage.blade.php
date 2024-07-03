@extends('front.layouts.layoutadmin')
@section('content')
<div class="section-1" style="margin: 5px; text-align: center; padding-bottom: 100px;">
<h1 style="margin-left:-140px;"></i> Registrovani Korisnici:</h1>

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.section-1 {
    text-align: center;
    margin-bottom: 50px;
}

.my-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    margin-left: -40px; 

}

.my-table th,
.my-table td {
    padding: 10px;
    border: 1px solid #ddd;
    text-align: center;
}

.my-table thead {
    background-color: #333;
    color: white;
}

.my-table tbody tr:nth-child(even) {
    background-color: #f2f2f2;
}

.my-table tbody tr:hover {
    background-color: #ddd;
}

.my-table a {
    color: green;
}

.my-table a:hover {
    color: darkgreen;
}
@media screen and (max-width: 768px) {
  .my-table-wrapper {
    overflow-x: auto;
  }

  .my-table, .my-table thead, .my-table tbody, .my-table th, .my-table td, .my-table tr {
    display: block;
  }

  .my-table {
    min-width: 0;
  }

  .my-table thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }

  .my-table tr {
    border: 1px solid #ccc;
    margin-bottom: 10px;
    padding: 10px;
  }

  .my-table td {
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50%;
    text-align: left;
    margin-bottom: 10px; /* Dodajte malo prostora između ćelija */
  }

  .my-table td::before {
    content: attr(data-label);
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    left: 10px;
    top: 0;
    width: 45%; /* Prilagodite širinu labeli */
    padding-right: 10px;
    white-space: nowrap;
  }

  .my-table td:last-child {
    border-bottom: 0;
  }
}
@media screen and (max-width: 900px) {
  .my-table-wrapper {
    overflow-x: auto;
  }

  .my-table, .my-table thead, .my-table tbody, .my-table th, .my-table td, .my-table tr {
    display: block;
  }

  .my-table {
    min-width: 0;
  }

  .my-table thead tr {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }

  .my-table tr {
    border: 1px solid #ccc;
    margin-bottom: 10px;
    padding: 10px;
  }

  .my-table td {
    border: none;
    border-bottom: 1px solid #eee;
    position: relative;
    padding-left: 50%;
    text-align: left;
    margin-bottom: 10px; /* Dodajte malo prostora između ćelija */
  }

  .my-table td::before {
    content: attr(data-label);
    font-weight: bold;
    text-transform: uppercase;
    position: absolute;
    left: 10px;
    top: 0;
    width: 45%; /* Prilagodite širinu labeli */
    padding-right: 10px;
    white-space: nowrap;
  }

  .my-table td:last-child {
    border-bottom: 0;
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
              <button style="color:black; background-color:silver" title="Obriši Korisnika!"> Obriši
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
