<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PHPŠkola</title>
    <link rel="icon" href="{{asset('front/img')}}/logoend.png">
    <link rel="stylesheet" href="{{asset('front/css')}}/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{asset('front/css')}}/style.css">
    <link rel="stylesheet" href="{{asset('front/css')}}/forma.css">

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
        height: auto;
        padding: 10px;
    }

    .menu {
        display: none;
        flex-direction: column;
        width: 100%;
    }

    .menu li {
        text-align: center;
        width: 100%;
        padding: 10px 0;
    }

    .menu li:hover {
        background-color: #5080c7;
    }

    .dropdown {
        position: static;
    }

    .hamburger {
        display: block;
    }

    input[type=checkbox]:checked ~ .menu {
        display: block;
        animation: slideDown 0.5s ease;
    }

    @keyframes slideDown {
        0% {
            opacity: 0;
            transform: translateY(-20px);
        }
        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }
}
  </style>
<body>
    {{-- <header style="position: fixed;" class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a style="black;font-size:35px;font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;" class="navbar-brand" href="/">
                         Fizix</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse main-menu-item justify-content-end"
                            id="navbarSupportedContent">
                            <ul class="navbar-nav align-items-center">
                                <li class="nav-item">
                                    <a class="nav-link" href="/" style="color:black">Početna</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/login" style="color:black">Prijavi se</a>
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

                    <li class="nav-item">
                        <a class="nav-link" href="/" style="color:black">Početna</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/login" style="color:black">Prijavi se</a>
                    </li>



                </ul>
              </div>

        </ul>
      </nav>
