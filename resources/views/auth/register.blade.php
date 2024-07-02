
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css" />
    <title>Document</title>
</head>
<style>
    body {
            background-color: silver;
            background-size: cover;
            background-position: center;
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }

</style>
<body >
@extends('front.layouts.layoutregister')
<style>


</style>
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div style="background-color: silver; border:1px solid pink; box-shadow: 10px 22px 20px 10px rgba(134, 30, 12, 0.401); border-radius:20px; margin-top:140px; margin-bottom:70px;" class="col-md-8">
            <h2 class="text-center text-uppercase text-black mt-3">{{ __('Kreiranje naloga!') }}</h2>
            <form method="post" id="idforme"  action="{{ route('register-user')}}" class="mb-2 mt-1" enctype="multipart/form-data">
                @csrf
                    <div id="basicInfo">
                        <label for="name"  > Ime: </label>
                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-input size-sm" />
                        <p hidden id="nameError" class="text-danger"> Ime nije ispravno! </p>

                        <label class="mt-1" for="lastname"> Prezime: </label>
                        <input type="text" name="lastname" id="lastname" class="form-input size-sm" />
                        <p hidden id="lastnameError" class="text-danger"> Prezime nije ispravno! </p>

                        <div>
                            <p class="mt-1">Pol: </p>
                            <input type="radio" id="male" name="gender" value="male">
                            <label for="male"> M </label>
                            <input type="radio" id="female" name="gender" value="female">
                            <label for="female"> Z </label>
                        </div>
                        <p hidden id="genderError" class="text-danger"> Morate izabrati pol! </p>

                        <div class="form-col">
                        <label class="mt-1"> Datum rođenja: </label>
                        <input type="date" id="birthDate" style="height: 38px;" class="form-control form-control-sm" name="birthDate" min="1900-01-01" required/>
                        <p hidden id="birthDateError" class="text-danger"> Datum nije ispravan! </p>
                        </div>

                        <div>
                        <label class="mt-1" for="birthPlace"> Mesto rođenja: </label>
                        <input type="text" name="birthPlace" id="birthPlace" class="form-input size-sm" required />
                        <p hidden id="birthPlaceError" class="text-danger"> Mesto rodjenja nije ispravno! </p>
                        </div>

                        <div>
                        <label class="mt-1" for="birthCountry"> Drzava rođenja: </label>
                        <input type="text" name="birthCountry" id="birthCountry" class="form-input size-sm" required/>
                        <p hidden id="birthCountryError" class="text-danger"> Drzava rodjenja nije ispravna </p>
                        </div>

                        <label class="mt-1" for="JMBG"> JMBG: </label>
                        <input type="text" name="jmbg" id="jmbg" class="form-input size-sm" />
                        <p hidden id="jmbgError" class="text-danger"> JMBG nije ispravan </p>
                        <p id="erjmbg" class="text-danger">@error('jmbg'){{"Uneti JMBG već postoji!"}}@enderror</p>

                        <div class="form-col">
                            <label class="mt-1" for="profilePicture"> Profilna slika: </label>
                            <input type="file" accept="image/*"  style="height: 38px;"  name="profilePicture" id="profilePicture" class="form-control form-control-sm" />
                            <p hidden id="profilePictureError" class="text-danger"> Izaberite profilnu sliku! </p>
                        </div>

                        <label class="mt-1" for="Contact">Kontakt telefon: </label>
                        <input type="text" name="contact" id="contact" placeholder="+3816..." class="form-input size-sm" />
                        <p hidden id="contactError" class="text-danger"> Broj nije ispravan </p>

                        <label for="email"> Email: </label>
                        <input type="email" name="email" value="{{ old('email') }}" id="email" placeholder="test@gmail.com" class="form-input size-sm" required/>
                        <p hidden id="emailError" class="text-danger"> Email nije ispravan </p>
                        <p id="eremail" class="text-danger">@error('email'){{"Uneta email adresa već postoji!"}}@enderror</p>

                        <label class="mt-1" for="password"> Lozinka: </label>
                        <input type="password" name="password" value="{{ old('password') }}" id="password" class="form-input size-sm" />
                        <p hidden id="passwordError" class="text-danger"> Loznika nije ispravna </p>

                        <label class="mt-1" for="confirmPassword"> Potvride lozinku: </label>
                        <input type="password" name="password_confirmation" id="password-confirm" class="form-input size-sm" />
                        <p hidden id="confirmPasswordError" class="text-danger"> Lozinke nisu iste </p>

                        <div>
                            <p class="mt-1">Prijavi se kao: </p>
                            <input type="radio" id="vaspitac" name="tip" value="vaspitac">
                            <label for="vaspitac">Vaspitac</label>
                            <input type="radio" id="roditelj" name="tip" value="roditelj">
                            <label for="roditelj">Roditelj</label>
                            {{-- <input type="radio" id="admin" name="tip" value="admin">
                            <label for="admin">Admin</label> --}}
                        </div>
                        <p hidden id="roleError" class="text-danger"> Morate izabrati ulogu! </p>

                        <div>
                        <button type="submit" style="background-color:rgb(255, 140, 0); color:white;" onClick="handleSubmit(event)" class="form-control form-control-lg">{{ __('NAPRAVI NALOG') }}</button>
                        </div>
                        <a style="float: right;color:black" class="btn btn-link" href="{{ route('login') }}">
                            {{ __('Već imate nalog! Vratite se na stranicu za prijavljivanje!') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
</body>


<script src="js/register.js"></script>


</html>
