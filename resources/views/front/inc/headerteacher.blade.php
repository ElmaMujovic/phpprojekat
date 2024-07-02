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
    <link rel="stylesheet" href="{{asset('front/css')}}/dashboardteacher.css">
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
			<ul>
      <li class="nav-item">
					<a href="/nasevaspitac"  class="nav-link">

						<span>Pocetna</span>
					</a>
				</li>
        <li class="nav-item">
					<a href="/srecnovaspitac"  class="nav-link">

						<span>Srecno mesto</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="/teacherpage"  class="nav-link">

						<span>Teme</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="/test"  class="nav-link">

						<span>Ankete</span>
					</a>
				</li>
				<li class="nav-item">
					<a href="/analisis"  class="nav-link">
						
						<span>Roditelji</span>
					</a>
				</li>
        
				
				<li class="nav-item">
					<a  class="nav-link" href="{{ route('logout') }}"
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
