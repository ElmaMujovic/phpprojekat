@extends('front.layouts.layoutlogin')
@section('content')
<main style="margin-top:100px; margin-bottom:190px;" class="login-form">
  <div class="cotainer">
      <div class="row justify-content-center">
          <div class="col-md-8">
              <div style="background-color: silver;border:1px solid red; box-shadow: 10px 22px 20px 10px rgba(134, 30, 12, 0.361); border-radius:20px;" class="card">
                  <div class="card-header">Promena lozinke</div>
                  <div class="card-body">

                    @if (Session::has('message'))
                         <div style="color:black;" class="alert alert-success" role="alert">
                            {{ Session::get('message') }}
                        </div>
                    @endif

                      <form action="{{ route('forget.password.post') }}" method="POST">
                          @csrf
                          <div class="form-group row">
                              <label for="email_address" class="col-md-4 col-form-label text-md-right">E-Mail Addresa:</label>
                              <div class="col-md-6">
                                  <input type="text" id="email_address" class="form-control" name="email" required autofocus>
                                  @if ($errors->has('email'))
                                      <span class="text-danger">{{ $errors->first('email') }}</span>
                                  @endif
                              </div>
                          </div>
                          <div class="col-md-6 offset-md-4" style="color: rgb(76, 202, 208)">
                              <button type="submit" class="btn btn-primary" >
                                  Pošalji zahtev za promenu lozinke
                              </button>
                          </div>
                      </form>

                  </div>
              </div>
          </div>
      </div>
  </div>
</main>
@endsection
