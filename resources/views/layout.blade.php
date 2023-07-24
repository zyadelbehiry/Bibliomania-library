<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    @yield('title')
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-dark nav-underline ">
        <div class="container-fluid">
            <a class="navbar-brand link-light" href="#">Codezilla</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active link-light " aria-current="page" href="{{ route('books.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-light" href="{{ route('books.create') }}">Create</a>
                    </li>
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle link-light" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex" role="search">
                    <input class="form-control me-2 bg-light outlin-light" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-light" type="submit">Search</button>
                </form>
                <ul class="navbar-nav ml-auto px-2">
                    @guest
                    <li class="nav-item">
                        <a class="nav-link link-light"  href="{{ route('auth.register') }}">
                            Register
                        </a>
                    </li>
                        <li class="nav-item">
                            <a class="nav-link link-light" href="{{ route('auth.login') }}">
                                Login
                            </a>
                        </li>
                    @endguest

                    @auth
                    <li class="nav-item">
                        <a class="nav-link disabled link-light" href="#">
                            {{ Auth::user()->name }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-light" href="{{ route('auth.logout') }}">
                            Logout
                        </a>
                    </li>
                    @endauth
                </ul>

            </div>
        </div>
    </nav>


    <div class ="mx-4">
        @yield('content')
    </div>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
</body>

</html>
