<nav class="
        navbar navbar-expand-md navbar-light navbar-store sticky-top
      ">
    <div class=" container">
        <a class="navbar-brand" href="/">
            <h4> Sistem Informasi Ketersediaan Ruang IGD</h4>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">

                @auth
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-toggle="dropdown" aria-expanded="false">
                        Welcome back, {{ auth()->user()->user_nama }}
                    </a>
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="/dashboard">Dashboard</a>

                        <div class="dropdown-divider"></div>

                        <form action="/logout" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                        {{-- <a class="dropdown-item" href="#">Logout</a> --}}
                    </div>
                </li>
                @else

                <a href="/login" class="nav-link btn btn_warna">Login</a>

                @endauth
                </li>
            </ul>
        </div>
    </div>
</nav>