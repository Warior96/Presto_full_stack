<nav class="navbar navbar-expand-lg bg-body-tertiary position-fixed top-0 left-0 w-100 z-3 shadow">
    <div class="container-fluid mx-lg-3">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">

                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'homepage' ? 'active' : '' }}"
                        href="{{ route('homepage') }}">Home</a>
                </li>

                {{-- se l'utente è ospite vede il pulsante login --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                @endguest

                {{-- se l'utente è loggato vede questi pulsanti --}}
                @auth
                    {{-- crea articoli --}}

                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'createarticle' ? 'active' : '' }}"
                            href="{{ route('createarticle') }}">Crea un articolo</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'article.indexAll' ? 'active' : '' }}"
                            href="{{ route('article.indexAll') }}">Mostra tutti gli articoli</a>
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
                                </li>
                                @if (!$loop->last)
                                    <hr class="dropdown-divider">
                                @endif
                            @endforeach
                        </ul>

                    </li>
                    @if (Auth::user()->is_revisor)
                        <li class="nav-item">
                            <a class="nav-link {{ Route::currentRouteName() == 'revisor.index' ? 'active' : '' }}"
                                href="{{ route('revisor.index') }}">Revisiona
                                {{ \App\Models\Article::toBeRevisedCount() }} </a>
                        </li>
                    @endif
                @endauth

                {{-- search --}}
                <form action="{{ route('article.search') }}" method="GET" role="search" class="d-flex ms-auto">
                    <div class="input-group">
                        <input type="search" name="query" class="form-control" placeholder="Search"
                            aria-label="search">
                        <button class="input-group-text btn btn-outline-info" type="submit"
                            id="basic-addon2">Cerca</button>
                    </div>
                </form>

                @auth
                    {{-- logout --}}
                    <form action="{{ route('logout') }}" method="post" class="ms-3">
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
