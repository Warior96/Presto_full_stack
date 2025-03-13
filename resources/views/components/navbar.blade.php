<nav class="navbar navbar-expand-lg bg-6 position-fixed top-0 left-0 w-100 z-3 shadow px-2">
    <div class="container-fluid mx-lg-2">
        <a class="navbar-brand my-0 me-3 p-0" href="{{ route('homepage') }}">
            <img src="{{ Storage::url('logo/logo-rettangolare.png') }}" alt="" class="img-logo">
        </a>

        {{-- visbili da sm e md fuori da hamburger menu --}}
        {{-- switch dark light mode --}}
        <ul
            class="navbar-nav list-unstyled d-flex d-lg-none flex-row justify-content-center align-items-center ms-auto me-4">

            <li class="nav-item me-3 my-auto">
                <button class="btnlight">
                    <span class="fa-solid fa-lightbulb"></span>
                </button>
            </li>

            {{--  language --}}
            <li class="nav-item dropdown my-auto ps-2 position-relative">
                <a class="nav-link dropdown-toggle  py-0" href="#" role="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    @if (session('locale'))
                        <img src="{{ asset('vendor/blade-flags/language-' . session('locale') . '.svg') }}"
                            alt="{{ session('locale') }} Flag" width="32" height="32" class="">
                    @else
                        <img src="{{ asset('vendor/blade-flags/language-it.svg') }}" alt="it Flag" width="32"
                            height="32" class="">
                    @endif
                </a>
                <ul class="dropdown-menu bg-2 mt-2 position-absolute top-0 left-0">
                    <li>
                        <span class="dropdown-item @if (session('locale') == 'it' || session('locale') == null) d-none @endif ">
                            <x-_locale lang="it" />
                        </span>
                    </li>
                    <li>
                        <span class="dropdown-item @if (session('locale') == 'en') d-none @endif ">
                            <x-_locale lang="en" />
                        </span>
                    </li>
                    <li>
                        <span class="dropdown-item @if (session('locale') == 'zh-tw') d-none @endif ">
                            <x-_locale lang="zh-tw" />
                        </span>
                    </li>
                </ul>
            </li>
        </ul>

        {{-- hamburger menu --}}
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">

                {{-- <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'homepage' ? 'active' : '' }}"
                    href="{{ route('homepage') }}">{{ __('ui.home') }}</a>
                </li> --}}

                {{-- se l'utente è loggato vede questi pulsanti --}}
                @auth
                    {{-- crea articoli --}}
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'createarticle' ? 'active' : '' }}"
                            href="{{ route('createarticle') }}">{{ __('ui.aggiungiUn') }} {{ __('ui.prodotto') }}</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'article.indexAll' ? 'active' : '' }}"
                            href="{{ route('article.indexAll') }}">{{ __('ui.mostraProdotti') }}</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ __('ui.categorie') }}
                        </a>

                        {{-- categorie --}}
                        <ul class="dropdown-menu bg-2">
                            @foreach ($categories as $category)
                                <li class="d-flex justify-content-center z-3">
                                    <a class="dropdown-item d-flex align-items-center"
                                        href="{{ route('byCategory', ['category' => $category]) }}">
                                        <!-- icona associata automaticamente alla categoria -->
                                        <i class="fa-solid {{ $categoryIcons[$category->name] ?? 'fa-notdef' }} me-2"></i>
                                        <!-- nome delle varie categorie -->
                                        {{ __("ui.$category->name") }}
                                        <!-- Numero di elementi presenti nelle varie categorie -->
                                        <span
                                            class="ms-auto ps-2 dark">({{ $category->articles->where('is_accepted', 1)->count() }})</span>
                                    </a>
                                </li>

                                @if (!$loop->last)
                                    <hr class="dropdown-divider">
                                @endif
                            @endforeach
                        </ul>

                    </li>

                    {{-- revisore --}}
                    @if (Auth::user()->is_revisor && \App\Models\Article::toBeRevisedCount())
                        <li class="nav-item">
                            <a class="d-flex position-relative nav-link {{ Route::currentRouteName() == 'revisor.index' ? 'active' : '' }}"
                                href="{{ route('revisor.index') }}">{{ __('ui.revisiona') }}
                                {{-- <span class="position-absolute translate-middle badge rounded-pill bg-5"
                                    id="revisor-badge">
                                    {{ \App\Models\Article::toBeRevisedCount() }}
                                </span> --}}

                                <span class="bell-icon translate-middle">
                                    <img class="bell" src="{{ Storage::url('logo/bell.gif') }}" alt="">
                                    <div class="notification-amount">
                                        <span class="c-2 dark">{{ \App\Models\Article::toBeRevisedCount() }}</span>
                                    </div>
                                </span>
                            </a>
                        </li>
                    @else
                        {{-- modale back --}}


                        {{-- <button type="button" class="btn py-2 px-4 fw-bold c-5 btn-storico" data-bs-toggle="modal"
                            data-bs-target="#no-revisor-nav">
                            Storico operazioni
                        </button> --}}
                    @endif
                @endauth

                {{-- search --}}
                @if (Route::currentRouteName() != 'homepage')
                    <form action="{{ route('article.search') }}" method="GET" role="search"
                        class="d-flex ms-lg-auto ms-1 me-2 my-2 my-md-2 ms-md-1 me-md-3 my-lg-0 mx-lg-0">
                        <div class="input-group">
                            <input type="search" name="query" class="form-control"
                                placeholder="{{ __('ui.cerca') }}" aria-label="search" value="{{ $query }}">
                            <button class="input-group-text btn" type="submit" id="basic-addon2"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                @endif

                {{-- lingua e switch visibili solo da lg --}}
                {{-- switch dark light mode --}}
                <li
                    class="nav-item me-2 d-none d-lg-block {{ Route::currentRouteName() == 'homepage' ? 'ms-auto' : 'ms-4' }}  my-auto">
                    <button class="btnlight ">
                        <span id="nightmodeIcon" class="fa-solid fa-moon"></span>
                    </button>
                </li>

                {{--  language --}}
                <li
                    class="nav-item dropdown d-none d-lg-block  {{ Route::currentRouteName() == 'homepage' ? 'ms-1' : '' }} my-auto ps-2">
                    <a class="nav-link dropdown-toggle  py-0" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        @if (session('locale'))
                            <img src="{{ asset('vendor/blade-flags/language-' . session('locale') . '.svg') }}"
                                alt="{{ session('locale') }} Flag" width="32" height="32" class="">
                        @else
                            <img src="{{ asset('vendor/blade-flags/language-it.svg') }}" alt="it Flag"
                                width="32" height="32" class="">
                        @endif
                    </a>
                    <ul class="dropdown-menu bg-2 mt-2">
                        <li>
                            <span class="dropdown-item @if (session('locale') == 'it' || session('locale') == null) d-none @endif ">
                                <x-_locale lang="it" />
                            </span>
                        </li>
                        <li>
                            <span class="dropdown-item @if (session('locale') == 'en') d-none @endif ">
                                <x-_locale lang="en" />
                            </span>
                        </li>
                        <li>
                            <span class="dropdown-item @if (session('locale') == 'zh-tw') d-none @endif ">
                                <x-_locale lang="zh-tw" />
                            </span>
                        </li>
                    </ul>
                </li>

                {{-- se l'utente è ospite vede il pulsante login --}}
                @guest
                    <li class="me-2 nav-item ">
                        <a class="nav-link mx-2 fs-5 {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                            href="{{ route('login') }}">{{ __('ui.login') }}</a>
                    </li>
                @endguest
                @auth




                    {{-- dropdown pannello utente --}}
                    <div class="dropdown position-relative">
                        <button class="btn btn-user ms-3 px-2 py-2 fs_nav rounded-4 shadow" type="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-user fs-5 ms-1 me-2" id="icon_user"></i>
                            <span class="me-2 dark" id="span_user">
                                {{ __('ui.ciao') }} {{ Auth::user()->name }}</span>
                        </button>
                        <ul class="dropdown-menu bg-2 position-absolute w-100" id="user">
                            @if (Auth::user()->is_revisor)
                                <li>
                                    <a class="dropdown-item w-100" data-bs-toggle="modal" href="#"
                                        data-bs-target="#no-revisor-nav">
                                        <i class="fa-solid fa-clipboard-list px-2 fs-6"></i>Dashboard
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a class="dropdown-item" data-bs-toggle="offcanvas" href="#offcanvasExample"
                                    role="button" aria-controls="offcanvasExample">
                                    <i class="fa-solid fa-hand-holding-heart px-2 fs-6"></i> Wishlist
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li>
                                {{-- logout --}}
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="dropdown-item text-danger"><i
                                            class="text-danger fa-solid fa-arrow-right-from-bracket px-2 fs-6"></i>
                                        Logout</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @endauth
            </ul>
        </div>
    </div>
</nav>


<!-- Modal revisor -->
<div class="modal fade" id="no-revisor-nav" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content bg-5 text">
            <div class="modal-header">
                <h1 class="modal-title fs-5 c-2 w-100 pt-3" id="staticBackdropLabel">
                    Storico dei prodotti accettati o rifiutati
                </h1>
                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>


            <div class="modal-body overflow-auto modal-storico">
                <table class="table bg-2 w-100 table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titolo</th>
                            <th scope="col">Prezzo</th>
                            <th scope="col" class="td-img">Anteprima</th>
                            <th scope="col">Stato</th>
                            <th scope="col">Dettaglio</th>
                            <th scope="col">Annulla</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($articles as $article)
                            @if ($article->is_accepted === 0 || $article->is_accepted === 1)
                                <tr>
                                    <th scope="row">{{ $article->id + 1 }}</th>
                                    <td>{{ $article->title }}</td>
                                    <td>{{ __('ui.€') }} {{ $article->price }}</td>
                                    <td class="d-flex justify-content-center align-items-center td-img">
                                        <img src="{{ $article->images->isNotEmpty() ? $article->images->first()->getUrl(600, 600) : 'https://picsum.photos/300' }}"
                                            class="card-img-top aspect-ratio-1 img-table"
                                            alt="Immagine dell'articolo {{ $article->title }}">
                                    </td>
                                    <td>
                                        @if ($article->is_accepted == 0)
                                            <span class="text-danger rounded-pill mx-2">Rifiutato</span>
                                        @elseif ($article->is_accepted == 1)
                                            <span class="text-success rounded-pill mx-2">Accettato</span>
                                        @endif
                                    </td>
                                    <td><a target="_blank" href="{{ route('article.show', compact('article')) }}"
                                            class="btn btn-cus rounded-pill bg-1 text-black mx-2"
                                            id="a-dettaglio">{{ __('ui.dettaglio') }} </a>
                                    </td>
                                    <td>
                                        <form action="{{ route('back', ['article' => $article]) }}" method='POST'
                                            class="">
                                            @csrf
                                            @method('PATCH')
                                            <button class="btn btn-warning rounded-pill fw-bold">Invia
                                                in revisione</button>
                                        </form>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- comparsa del pannello wish list --}}
<div class="offcanvas offcanvas-end bg-2" tabindex="-1" id="offcanvasExample"
    aria-labelledby="offcanvasExampleLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title text-center w-100 fs-3" id="offcanvasExampleLabel">La mia wishlist</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <div class="container">
            <div class="row">
                @foreach (Auth::user()->wishlist as $wish)
                    <div class="col-6 mb-4">
                        <div class="card rounded-4 px-2 bg-2-s">

                            <h5 class="text-center mt-2">{{ $wish->title }}</h5>
                            <hr class="divider mt-0 mb-2">
                            <img src="{{ $wish->images->isNotEmpty() ? $wish->images->first()->getUrl(600, 600) : 'https://picsum.photos/300' }}"
                                class="card-img-top rounded-4" alt="...">
                            <a href="{{ route('article.show', compact('article')) }}"
                                class="btn btn-cus rounded-pill bg-1 text-black w-100 my-2"
                                id="a-dettaglio">{{ __('ui.dettaglio') }}</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
