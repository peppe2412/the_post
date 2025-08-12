<nav class="navbar navbar-expand-lg bg-main fs-5" id="navbar">
    <div class="container-fluid">
        <a class="navbar-brand fs-main fs-2" href="{{ route('home') }}">The Post</a>
        <button id="button-event-nav" class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i id="setting-list" class="bi bi-list fs-2"></i>
            <i id="close-list" class="bi bi-x-lg fs-2 d-none"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 mx-2">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('article-index') }}">Articoli</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{ route('carrers') }}">Lavora con noi</a>
                </li>
                @auth
                    <li class="nav-item">
                        <a class="nav-link active new-article-link rounded-2 mx-2" aria-current="page"
                            href="{{ route('article-create') }}">
                            <i class="bi bi-plus-square"></i> Inserisci articolo
                        </a>
                    </li>
                @endauth
                </li>
            </ul>
            <form class="d-flex me-auto" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            @guest
                <ul class="navbar-nav me-4">
                    <li class="nav-item">
                        <a class="nav-link auth-nav-link" aria-current="page" href="{{ route('login') }}">Accedi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link auth-nav-link fw-bold" aria-current="page"
                            href="{{ route('register') }}">Registrati</a>
                    </li>
                </ul>
            @endguest
            @auth
                <ul class="navbar-nav me-5">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#"
                                    onclick="event.preventDefault(); document.querySelector('#logout').submit()">Logout</a>
                            </li>
                            <form action="{{ route('logout') }}" method="POST" id="logout" class="d-none">
                                @csrf
                            </form>
                            @if (Auth::user()->is_admin)
                                <li><a class="dropdown-item" href="{{ route('admin-dashboard') }}">Dashboard</a></li>
                            @endif
                            @if (Auth::user()->is_revisor)
                                <li><a class="dropdown-item" href="{{ route('revisor-dashboard') }}">Dashboard</a></li>
                            @endif
                            @if (Auth::user()->is_write)
                                <li><a class="dropdown-item" href="{{ route('writer-dashboard') }}">Dashboard</a></li>
                            @endif
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>

                </ul>
            @endauth
        </div>
    </div>
</nav>
