<nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed top-0 left-0 w-100 z-3 shadow">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">
                <li class="nav-item">
                    <a href="{{ route('homepage') }}"
                        class="@if (Route::currentRouteName() == 'homepage') active @endif nav-link">Home</a>
                </li>

                {{-- se l'utente è ospite vede il pulsante login --}}
                @guest
                    <li class="nav-item ms-auto d-block">
                        <a href="{{ route('login') }}"
                            class="@if (Route::currentRouteName() == 'login') active @endif nav-link">Login</a>
                    </li>
                @endguest

                {{-- se l'utente è loggato vede questi pulsanti --}}
                @auth
                    {{-- crea articoli --}}
                    <li class="nav-item">
                        <a href="{{ route('createarticle') }}"
                            class="@if (Route::currentRouteName() == 'createarticle') active @endif nav-link">Crea</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('article.indexAll') }}"
                            class="@if (Route::currentRouteName() == 'article.indexAll') active @endif nav-link">Mostra</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Categorie
                        </a>
                        <ul class="dropdown-menu">
                            @foreach ($categories as $category)
                                <li><a class="dropdown-item"
                                        href="{{ route('byCategory', ['category' => $category]) }}">{{ $category->name }}</a>
                                    </11>
                                    @if (!$loop->last)
                                        <hr class="dropdown-divider">
                                    @endif
                            @endforeach
                        </ul>
                    </li>

                    {{-- logout --}}
                    <form action="{{ route('logout') }}" method="post" class="ms-auto">
                        @csrf
                        <button class="btn btn-dark">Logout</button>
                    </form>

                @endauth
                {{-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
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
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li> --}}
            </ul>
            {{-- <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form> --}}
        </div>
    </div>
</nav>
