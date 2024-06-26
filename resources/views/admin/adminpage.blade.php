@extends('front.layouts.layoutadmin')
@section('content')
<div class="section-1" style="margin: 5px; text-align: center;">
<h1></i> Registrovani Korisnici:</h1>


    <table class="my-table" >
        <thead style="background-color:#8fbcf0">
        <tr>
          <th>ID</th>
          <th>Ime</th>
          <th>Prezime</th>
          <th>Email</th>
          <th>Kontakt</th>
          <th>ZemljaRođenja</th>
          <th>MestoRođenja</th>
          <th>DatumRođenja</th>
          <th>JMBG</th>
          <th>Tip Zahteva</th>
          <th colspan="2">Zahtev</th>
        </tr>
        </thead>
        @foreach ($user as $ur)
        <tr>
          <td>{{$ur['id']}}</td>
          <td>{{$ur['firstname']}}</td>
          <td>{{$ur['lastname']}}</td>
          <td>{{$ur['email']}}</td>
          <td>{{$ur['contact']}}</td>
          <td>{{$ur['countryofbirth']}}</td>
          <td>{{$ur['placeofbirth']}}</td>
          <td>{{$ur['dateofbirth']}}</td>
          <td>{{$ur['jmbg']}}</td>
          <td>{{$ur['tip']}}</td>
          <td>
            <form action="AcceptR" method="POST">
              <a style="color:blue;" title="Prihvati zahtev!" href="{{"adminpage/".$ur['id']}}"> <i class="fa fa-check-circle" style="font-size: 30px; padding-right:20px;" aria-hidden="true"></i></a>
              @csrf
            </form></td><td>
            <form action="{{ route('DeclineR', $ur['id']) }}" method="POST">
            @csrf
            <button type="submit" style="border:none; background:none; color:red;">
                <i class="fa fa-times-circle" style="font-size: 30px;" aria-hidden="true"></i>
            </button>
        </form>
          </td>
        @endforeach
      </table>
      <br>
      
        <h1></i> Korisnici Aplikacije:</h1>
        <div>
        <table class="my-table">
          <thead style="background-color:#7facf0">
          <tr>
            <th  >ID</th>
            <th>Ime</th>
            <th>Prezime</th>
            <th>Email</th>
            <th>Kontak</th>
            <th>ZemljaRođenja</th>
            <th>MestoRođenja</th>
            <th>DatumRođenja</th>
            <th>JMBG</th>
            <th>VrstaKorisnika</th>
            <th>Vrednost</th>
          </tr>
          </thead>
          @foreach ($users as $ur)
          <tr>
           <td>{{$ur['id']}}</td>
           <td>{{$ur['firstname']}}</td>
           <td>{{$ur['lastname']}}</td>
           <td>{{$ur['email']}}</td>
           <td>{{$ur['contact']}}</td>
           <td>{{$ur['countryofbirth']}}</td>
           <td>{{$ur['placeofbirth']}}</td>
           <td>{{$ur['dateofbirth']}}</td>
           <td>{{$ur['jmbg']}}</td>
           <td>{{$ur['tip']}}</td>
           <td>
            <form action="{{route('deleteUser',$ur->id)}}" method="POST">
              @csrf
              @method('delete')
              <button style="color:black; background-color:rgb(104, 162, 210);" title="Obrisi Korisnika!"> Obrisi
              </button>
            </form>
          </td>
          </tr>
          @endforeach
        </table>
        </div>
</div>
@endsection
