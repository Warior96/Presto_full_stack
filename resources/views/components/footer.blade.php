<div class="container-fluid shadow bg-5">
    <footer class="py-5">
        <div class="row ">
            <div class="col-8">
                <div class="ms-5 ps-5 row">

                    {{-- logo --}}
                    <img src="{{ Storage::url('logo/logo-quadrato-corona-1.svg') }}" alt=""
                        class="img-logo-footer">

                    {{-- chi siamo --}}
                    <div class="col-6 col-md-5 mb-3 c-2">
                        <p class="c-2 mb-2">Chi siamo</p>
                        <p class="c-2">
                            Emporium The Shop è un marketplace dove puoi vendere e acquistare prodotti di ogni
                            categoria. Scopri offerte esclusive e un'esperienza sicura e intuitiva.
                        </p>
                    </div>

                    {{-- contatti --}}
                    <div class="col-6 col-md-3 mb-3 ms-4 c-2">
                        <p class="c-2 mb-2">Contatti</p>
                        <p class="c-2">
                            <i class="fa-solid fa-envelope c-2 me-2"></i>
                            <a href="mailto:amdin@example.com">amdin@example.com</a>
                        </p>
                        <p class="c-2">
                            <i class="fa-solid fa-phone c-2 me-1"></i>
                            <a href="tel:+39123456789">+39 123456789</a>
                        </p>
                        <p class="c-2">
                            <i class="fa-solid fa-location-dot c-2 me-2"></i>
                            <a href="https://www.google.com/maps/place/Via+Roma,+123,+Roma+RM" target="_blank">Via Roma,
                                123</a>
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-4">

                {{-- Bottone + modale lavora con noi --}}
                @auth
                    @if (!Auth::user()->is_revisor)
                        {{-- <div class="col-3 d-flex justify-content-end align-content-center "> --}}
                        <div class="col-md-5 d-flex w-100 mb-3">
                            <div>
                                <h5 class="c-2">Richiedi di lavorare con noi</h5>
                                <p class="c-2">Invia la tua candidatura come revisore</p>
                                <div class="col-3">
                                    {{-- bottone apertura modale --}}
                                    <button type="button" class="btn btn-primary px-4 py-2 fs-5  rounded-4 shadow"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        {{ __('ui.candidati') }}
                                    </button>

                                    <!-- modale -->
                                    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content ">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 w-100 pt-3" id="staticBackdropLabel">
                                                        {{ Auth::user()->name }}, vuoi lavorare con noi?
                                                    </h1>
                                                    <button type="button" class="btn-close bg-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-4">
                                                    <p>I tuoi dati:</p>
                                                    <ul>
                                                        <li>nome: {{ Auth::user()->name }}</li>
                                                        <li>email: {{ Auth::user()->email }}</li>
                                                    </ul>
                                                </div>
                                                <div
                                                    class="modal-footer d-flex justify-content-between align-items-center pb-2">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No,
                                                        annulla</button>
                                                    <a href="{{ route('become.revisor') }}"
                                                        class="btn btn-primary px-3 py-2 rounded shadow">Candidati</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @else
                        {{-- log + revisore --}}
                        @if (\App\Models\Article::toBeRevisedCount() > 0)
                            <div class="col-12 d-flex flex-column justify-content-end align-content-center">
                                <p class="c-2">Benvenuto revisore <strong
                                        class="c-2">{{ Auth::user()->name }}</strong>,</p>
                                @if (\App\Models\Article::toBeRevisedCount() > 1)
                                    <p class="c-2">Al momento ci sono {{ \App\Models\Article::toBeRevisedCount() }}
                                        articoli da
                                        revisionare</p>
                                @else
                                    <p class="c-2">Al momento c'è 1 articolo da revisionare</p>
                                @endif
                                <div class="mt-2">
                                    <a class="btn btn-primary px-4 py-2 fs-5 text-white rounded-4 shadow position-relative"
                                        href="{{ route('revisor.index') }}">{{ __('ui.revisiona') }}
                                        <span
                                            class="position-absolute start-100 translate-middle badge rounded-pill bg-danger">
                                            {{ \App\Models\Article::toBeRevisedCount() }}
                                        </span>
                                    </a>
                                </div>
                            </div>
                        @else
                            {{-- nessun articolo da revisionare --}}
                            <div class="col-12">
                                <p class="c-2 mb-1 dark">Benvenuto revisore <strong
                                        class="c-2">{{ Auth::user()->name }}</strong>,</p>
                                <p class="c-2 dark">Al momento non ci sono articoli da revisionare</p>
                            </div>
                        @endif
                    @endif
                @endauth

                @guest
                    <div class="col-md-5 d-flex w-100 mb-3">
                        <div>
                            <h5 class="c-2 dark">Richiedi di lavorare con noi</h5>
                            <p class="c-2 dark">Invia la tua candidatura come revisore</p>
                            <div class="col-4 ">
                                {{-- bottone apertura modale --}}
                                <button type="button" class="btn btn-primary px-3 py-2 fs-5  rounded shadow"
                                    data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    {{ __('ui.candidati') }}
                                </button>

                                <!-- modale -->
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                    data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered ">
                                        <div class="modal-content bg-2 ">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5 w-100 pt-3" id="staticBackdropLabel">
                                                    Vuoi lavorare con noi?
                                                </h1>
                                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-4">
                                                <p>Iscriviti al nostro sito e candidati</p>
                                            </div>
                                            <div
                                                class="modal-footer d-flex justify-content-between align-items-center pb-2">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No,
                                                    annulla</button>
                                                <a href="{{ route('become.revisor') }}"
                                                    class="btn btn-primary px-3 py-2 rounded shadow">Candidati</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endguest

            </div>


        </div>


        <div class="d-flex flex-column flex-sm-row justify-content-between pt-3 ps-5 mx-5 border-top border-secondary">
            <p class="c-2">Questo sito utilizza cookie per migliorare l'esperienza utente. Continuando la navigazione, accetti la nostra Privacy Policy e Cookie Policy.</p>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between pt-4 ps-5 mx-5 border-top border-secondary">
            <p class="c-2">&copy; 2025 The Final Commit. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-body-emphasis" target="_blank"
                        href="https://www.facebook.com/?locale=it_IT"><i class="c-2 fa-brands fa-facebook"></i></a>
                </li>
                <li class="ms-3"><a class="link-body-emphasis" target="_blank"
                        href="https://www.instagram.com/"><i class="c-2 fa-brands fa-instagram"></i></a>
                </li>
                <li class="ms-3"><a class="link-body-emphasis" target="_blank" href="https://x.com/?lang=it"><i
                            class="c-2 fa-brands fa-x-twitter"></i></a>
                </li>
                <li class="ms-3"><a class="link-body-emphasis" target="_blank"
                        href="https://www.linkedin.com/feed/"><i class="c-2 fa-brands fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
    </footer>
