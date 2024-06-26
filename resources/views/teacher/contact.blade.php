<!-- resources/views/user/contact.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $user->firstname }} {{ $user->lastname }} - Contact Information</div>

                <div class="card-body">
                    
                    <p><strong>Name:</strong> {{ $user->firstname }} {{ $user->lastname }}</p>
                    <p><strong>Username:</strong> {{ $user->username }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Gender:</strong> {{ $user->gender }}</p>
                    <p><strong>Country of Birth:</strong> {{ $user->countryofbirth }}</p>
                    <p><strong>Place of Birth:</strong> {{ $user->placeofbirth }}</p>
                    <p><strong>Contact:</strong> {{ $user->contact }}</p>
                    <p><strong>Date of Birth:</strong> {{ $user->dateofbirth }}</p>
                    <p><strong>JMBG:</strong> {{ $user->jmbg }}</p>
                    <p><strong>Info:</strong> {{ $user->info }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
