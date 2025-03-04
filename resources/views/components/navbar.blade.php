<nav class="navbar navbar-expand-lg bg-6 position-fixed top-0 left-0 w-100 z-3 shadow">
    <div class="container-fluid mx-lg-2">
        <a class="navbar-brand my-0 me-3 p-0" href="{{ route('homepage') }}">
            <img src="{{ asset('storage/logo/logo1.png') }}" alt="" class="img-logo">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 w-100">

                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'homepage' ? 'active' : '' }}"
                        href="{{ route('homepage') }}">{{ __('ui.home') }}</a>
                </li>

                {{-- se l'utente è loggato vede questi pulsanti --}}
                @auth
                    {{-- crea articoli --}}

                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'createarticle' ? 'active' : '' }}"
                            href="{{ route('createarticle') }}">{{ __('ui.aggiungiProdotto') }}</a>
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
                                            class="ms-auto ps-2">({{ $category->articles->where('is_accepted', 1)->count() }})</span>
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
                        <li class="nav-item position-relative">
                            <a class="nav-link {{ Route::currentRouteName() == 'revisor.index' ? 'active' : '' }}"
                                href="{{ route('revisor.index') }}">{{ __('ui.revisiona') }}
                                <span class="position-absolute start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ \App\Models\Article::toBeRevisedCount() }}
                                </span>
                            </a>
                        </li>
                    @endif
                @endauth

                {{-- search --}}
                @if (Route::currentRouteName() != 'homepage')
                    <form action="{{ route('article.search') }}" method="GET" role="search" class="d-flex ms-auto">
                        <div class="input-group">
                            <input type="search" name="query" class="form-control"
                                placeholder="{{ __('ui.cerca') }}" aria-label="search" value="{{ $query }}">
                            <button class="input-group-text btn " type="submit" id="basic-addon2"><i
                                    class="fa-solid fa-magnifying-glass"></i></button>
                        </div>
                    </form>
                @endif

                {{--  language --}}
                <li
                    class="nav-item dropdown {{ Route::currentRouteName() == 'homepage' ? 'ms-auto' : '' }} my-auto ps-2">
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
                    <ul class="dropdown-menu bg-2">
                        <li><span class="dropdown-item"><x-_locale lang="it" /></span></li>
                        <li><span class="dropdown-item"><x-_locale lang="en" /></span></li>
                        <li><span class="dropdown-item"><x-_locale lang="zh-tw" /></span></li>
                    </ul>
                </li>

                {{-- se l'utente è ospite vede il pulsante login --}}
                @guest
                    <li class="ms-3 nav-item ">
                        <a class="nav-link  {{ Route::currentRouteName() == 'login' ? 'active' : '' }}"
                            href="{{ route('login') }}">{{ __('ui.login') }}</a>
                    </li>
                @endguest
                @auth
                    {{-- logout --}}
                    <form action="{{ route('logout') }}" method="post" class="ms-3">
                        @csrf
                        <button class="btn btn-dark">{{ __('ui.logout') }}</button>
                    </form>
                @endauth
            </ul>
        </div>
    </div>
</nav>
