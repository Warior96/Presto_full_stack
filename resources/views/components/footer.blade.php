<div class="container-fluid shadow bg-secondary-subtle">
    <footer class="py-5">
        <div class="row ">
            <div class="col-8">
                <div class="ms-5 ps-5 row">
                    <div class="col-6 col-md-3 mb-3 ">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#" class="nav-link p-0 text-body-secondary">Home</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Features</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Pricing</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">FAQs</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3 mb-3">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Home</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Features</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Pricing</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">FAQs</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">About</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3 mb-3 ">
                        <h5>Section</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Home</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Features</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">Pricing</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">FAQs</a>
                            </li>
                            <li class="nav-item mb-2"><a href="#"
                                    class="nav-link p-0 text-body-secondary">About</a>
                            </li>
                        </ul>
                    </div>
                </div>




            </div>
            <div class="col-4">

                {{-- @auth
                    @if (!Auth::user()->is_revisor)
                        <div class="col-md-5  d-flex w-100 mb-3">
                            <div>
                                <h5>Richiedi di lavorare con noi</h5>
                                <p>Invia la tua candidatura come revisore</p>
                                <div class="col-3  "> --}}
                {{-- bottone apertura modale --}}
                {{-- <button type="button" class="btn btn-primary px-3 py-2 fs-5  rounded shadow"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        {{ __('ui.candidati') }}
                                    </button> --}}
                {{-- modale --}}
                {{-- <div class="it-example-modal">
                                        <div class="modal fade" tabindex="-1" role="dialog" id="staticBackdrop"
                                            aria-labelledby="modal1Title" aria-describedby="modal1Description">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h2 class="modal-title h5 " id="modal1Title"> Vuoi lavorare con
                                                            noi,
                                                            {{ Auth::user()->name }}?</h2>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>I tuoi dati:</p>
                                                        <p id="modal1Description">Nome:{{ Auth::user()->name }}</p>
                                                        <p>Email: {{ Auth::user()->email }}</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button class="btn btn-outline-primary btn-sm" type="button"
                                                            data-bs-dismiss="modal">No,
                                                            annulla</button>
                                                        <button class="btn btn-primary btn-sm" type="button">
                                                            {{ __('ui.candidati') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endauth --}}

                {{-- Bottone + modale lavora con noi --}}
                @auth
                    @if (!Auth::user()->is_revisor)
                        {{-- <div class="col-3 d-flex justify-content-end align-content-center "> --}}
                        <div class="col-md-5 d-flex w-100 mb-3">
                            <div>
                                <h5>Richiedi di lavorare con noi</h5>
                                <p>Invia la tua candidatura come revisore</p>
                                <div class="col-3">
                                    {{-- bottone apertura modale --}}
                                    <button type="button" class="btn btn-primary px-3 py-2 fs-5 rounded shadow"
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
                                <p>Benvenuto revisore <strong>{{ Auth::user()->name }}</strong>,</p>
                                @if (\App\Models\Article::toBeRevisedCount() > 1)
                                    <p>Al momento ci sono {{ \App\Models\Article::toBeRevisedCount() }} articoli da
                                        revisionare</p>
                                @else
                                    <p>Al momento c'è 1 articolo da revisionare</p>
                                @endif
                                <div class="mt-2">
                                    <a class="btn btn-primary px-4 py-2 fs-5 rounded-4 shadow position-relative"
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
                                <p>Benvenuto revisore <strong>{{ Auth::user()->name }}</strong>,</p>
                                <p>Al momento non ci sono articoli da revisionare</p>
                            </div>
                        @endif
                    @endif
                @endauth

                @guest
                    <div class="col-md-5  d-flex w-100 mb-3">
                        <div>
                            <h5>Richiedi di lavorare con noi</h5>
                            <p>Invia la tua candidatura come revisore</p>
                            <div class="col-3  ">
                                {{-- bottone apertura modale --}}
                                <button type="button" class="btn btn-primary px-3 py-2 fs-5 rounded shadow"
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
                @endguest

            </div>


        </div>


        <div
            class="d-flex flex-column flex-sm-row justify-content-between py-4 ps-5 mx-5  border-top border-secondary">
            <p>&copy; 2025 The Final Commit. All rights reserved.</p>
            <ul class="list-unstyled d-flex">
                <li class="ms-3"><a class="link-body-emphasis" href="#"><i
                            class="fa-brands fa-facebook"></i></a>
                </li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><i
                            class="fa-brands fa-instagram"></i></a>
                </li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><i
                            class="fa-brands fa-x-twitter"></i></a>
                </li>
                <li class="ms-3"><a class="link-body-emphasis" href="#"><i
                            class="fa-brands fa-linkedin"></i></a>
                </li>
            </ul>
        </div>
    </footer>
