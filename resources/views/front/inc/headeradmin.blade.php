<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHPŠkola</title>
    <link rel="icon" href="{{asset('front/img')}}/logoend.png">
    <link rel="stylesheet" href="{{asset('front/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('front/css')}}/style.css">
    <link rel="stylesheet" href="{{asset('front/css')}}/dashboard.css">
    @yield('styles')
</head>
<style>
    /* UTILITIES */
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {

    }

    a {
      text-decoration: none;
    }

    li {
      list-style: none;
    }

    /* NAVBAR STYLING STARTS */
    .navbar {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px;
      background-color: #3498db;
      color: #fff;
    height: 80px;
    }

    .nav-links a {
      color: black;
    }

    /* LOGO */
    .logo {
      font-size: 32px;
    }

    /* NAVBAR MENU */
    .menu {
      display: flex;
      gap: 1em;
      font-size: 18px;
    }

    .menu li:hover {
      background-color: #cadefc;
      border-radius: 5px;
      transition: 0.3s ease;
    }
    .menu ul {
        display: flex;
    }

    .menu li {
      padding: 5px 14px;
      display: flex;
    }

    /* DROPDOWN MENU */
    .services {
      position: relative;
    }

    .dropdown {
      background-color: #5080c7;
      padding: 1em 0;
      position: absolute;
      display: none;
      border-radius: 8px;
      top: 35px;
    }

    .dropdown li + li {
      margin-top: 10px;
    }

    .dropdown li {
      padding: 0.5em 1em;
      width: 8em;
      text-align: center;
    }

    .dropdown li:hover {
      background-color: #cadefc;
    }

    .services:hover .dropdown {
      display: block;
    }

    /* RESPONSIVE NAVBAR MENU STARTS */

    /* CHECKBOX HACK */

    input[type=checkbox] {
      display: none;
    }

    /* HAMBURGER MENU */
    .hamburger {
      display: none;
      font-size: 24px;
      user-select: none;
    }

    /* APPLYING MEDIA QUERIES */
    @media (max-width: 768px) {
.navbar {
  flex-direction: column;
  height: 150px;
  justify-content: space-around;
  display: flex;

}

.menu {
  display: none;
  width: 100%;
  justify-content: center;
  flex-wrap: wrap;
}

.menu li {
  padding: 5px 14px;
  justify-content: space-between;
}

.dropdown {
  position: static;
}

.hamburger {
  display: block;
}

input[type=checkbox]:checked ~ .menu {
  display: flex;
}
}
  </style>


<body>
{{-- <header style="position: fixed;" class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a style="white;font-size:35px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" class="navbar-brand" href="/">
                            Maslacak</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item active">
                                    <a class="nav-link" href="/naseadmin">Početna</a>
                                </li>
                                
                    <li class="nav-item">
                        <a class="nav-link" href="/nase-srecno-mesto">Nase srecno mesto</a>
                    </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/adminpage">Korisnici</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/news">Novosti</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header> --}}

    <nav class="navbar">
        <!-- LOGO -->
        <div class="logo" style="color: black">Maslacak</div>

        <!-- NAVIGATION MENU -->
        <ul class="nav-links">

          <!-- USING CHECKBOX HACK -->
          <input type="checkbox" id="checkbox_toggle" />
          <label for="checkbox_toggle" class="hamburger">&#9776;</label>

          <!-- NAVIGATION MENUS -->

            <div class="menu" >
                <ul >
                <li class="nav-item active">
                        <a class="nav-link" href="/naseadmin">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/naseadmin">Nase srecno mesto</a>
                    </li>

                    <li class="nav-item" >

                        <a href="/adminpage" class="nav-link">
                            <span>Korisnici</span>
                        </a>
                    </li>
                    <li  class="nav-item" >
                        <a href="/news" class="nav-link">
                            <span>Novosti</span>
                        </a>
                    </li>
                 

                    
                    <li  class="nav-item" >
                        <a class="nav-link"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">

                         {{ __('Odjavi se') }}
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </a>
                    </li>
                </ul>
              </div>

        </ul>
      </nav>








