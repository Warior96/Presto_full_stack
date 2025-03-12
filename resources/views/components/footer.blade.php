<footer class="container-fluid shadow bg-5 overflow-hidden mt-5 pt-5">
    <div class="py-5">
        <div class="row mx-md-2">
            <div class="col-12 col-lg-8">
                <div class="ps-lg-5 row">

                    {{-- logo --}}
                    <div class="col-12 d-flex d-md-none justify-content-center">
                        <img src="{{ Storage::url('logo/logo-rettangolare-w.png') }}" alt=""
                            class="img-logo-footer">
                    </div>
                    <div class="col-md-2 d-none d-md-flex justify-content-center">
                        <img src="{{ Storage::url('logo/logo-quadrato-w.png') }}" alt=""
                            class="img-logo-footer">
                    </div>

                    {{-- chi siamo --}}
                    <div class="col-lg-5 col-md-5 ms-3 ms-md-0 mb-3 c-2 me-2 me-md-0 ps-lg-5">
                        <p class="c-2 mb-2">{{ __('ui.chi_siamo') }}</p>
                        <p class="c-2">
                            Emporium Shop {{ __('ui.UnMarketplaceDove') }}
                        </p>
                    </div>

                    {{-- contatti --}}
                    <div class="col-lg-4 col-md-5 mb-3 ms-3 ms-md-0 ms-lg-4 c-2">
                        <p class="c-2 mb-2">{{ __('ui.contatti') }}</p>
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

            <div class="col-12 col-lg-4 py-3 py-md-3 py-lg-0 mb-3 mb-md-0 mx-md-4 ps-md-3 px-lg-0 mx-lg-0">

                {{-- Bottone + modale lavora con noi --}}
                @auth
                    {{-- log + non revisore --}}
                    @if (!Auth::user()->is_revisor)
                        <div class="col-md-5 ms-3 ms-md-0 d-flex w-100 mb-3">
                            <div>
                                <h5 class="c-2">{{ __('ui.richiediDiLavorare') }}</h5>
                                <p class="c-2">{{ __('ui.inviaCandidatura') }}</p>
                                <div class="col-3">
                                    {{-- bottone apertura modale --}}
                                    <button type="button" class="btn btn-footer px-3 py-2 fs-5 c-2 shadow"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        {{ __('ui.candidati') }}
                                    </button>

                                    <!-- modale -->
                                    <div class="modal fade " id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered ">
                                            <div class="modal-content bg-2">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 w-100 pt-3" id="staticBackdropLabel">
                                                        {{ Auth::user()->name }}, {{ __('ui.vuoiLavorare') }}
                                                    </h1>
                                                    <button type="button" class="btn-close bg-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body px-4">
                                                    <p>{{ __('ui.tuoiDati') }}:</p>
                                                    <ul>
                                                        <li>{{ __('ui.nome') }}: {{ Auth::user()->name }}</li>
                                                        <li>{{ __('ui.email') }}: {{ Auth::user()->email }}</li>
                                                    </ul>
                                                </div>
                                                <div
                                                    class="modal-footer d-flex justify-content-between align-items-center pb-2">
                                                    <button type="button" class="btn modal-no"
                                                        data-bs-dismiss="modal">{{ __('ui.annulla') }}</button>
                                                    <a href="{{ route('become.revisor') }}"
                                                        class="btn modal-si px-3 py-2 shadow">{{ __('ui.candidati') }}</a>
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
                            <div class="col-12 ms-3 ms-md-0 d-flex flex-column justify-content-end align-content-center">
                                <div class="row">

                                    @if (\App\Models\Article::toBeRevisedCount() > 1)
                                        <p class="c-2 col-12 col-md-6 col-lg-12">
                                            {{ __('ui.benvenutoRevisore') }} <strong
                                                class="c-2">{{ Auth::user()->name }}</strong>,
                                            <br>
                                            {{ __('ui.alMomentoSono') }}
                                            {{ \App\Models\Article::toBeRevisedCount() }}
                                            {{ __('ui.articoliRev') }}
                                        </p>
                                    @else
                                        <p class="c-2 col-12 col-md-6 col-lg-12">
                                            {{ __('ui.benvenutoRevisore') }} <strong
                                                class="c-2">{{ Auth::user()->name }}</strong>,
                                            <br>
                                            {{ __('ui.alMomentoÈ') }}
                                        </p>
                                    @endif
                                    <div class="mt-2 mt-md-0 mt-lg-2 mb-md-3 mb-lg-0 col-12 col-md-6">
                                        <a class="btn btn-footer px-4 py-2 fs-5 rounded-4 shadow position-relative"
                                            href="{{ route('revisor.index') }}">{{ __('ui.revisiona') }}
                                            <span
                                                class="position-absolute start-100 translate-middle badge rounded-pill bg-danger dark">
                                                {{ \App\Models\Article::toBeRevisedCount() }}
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @else
                            {{-- nessun articolo da revisionare --}}
                            <div class="col-12">
                                <p class="c-2 mb-1 dark">{{ __('ui.benvenutoRevisore') }} <strong
                                        class="c-2">{{ Auth::user()->name }}</strong>,</p>
                                <p class="c-2 dark">{{ __('ui.AlMomentoNon') }}</p>
                            </div>
                        @endif
                    @endif
                @endauth

                @guest
                    <div class="col-md-5 d-flex w-100 mb-3">
                        <div>
                            <h5 class="c-2 dark">{{ __('ui.richiediDiLavorare') }}</h5>
                            <p class="c-2 dark"> {{__('ui.InviaLaTua')}}</p>
                            <div class="col-4 ">
                                {{-- bottone apertura modale --}}
                                <button type="button" class="btn btn-footer px-3 py-2 fs-5 c-2 shadow"
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
                                                    {{ __('ui.vuoiLavorare') }}
                                                </h1>
                                                <button type="button" class="btn-close bg-white" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body px-4">
                                                <p>{{__('ui.IscrivitiAlNostro')}}</p>
                                            </div>
                                            <div
                                                class="modal-footer d-flex justify-content-between align-items-center pb-2 ">
                                                <button type="button" class="btn modal-no "
                                                    data-bs-dismiss="modal">{{ __('ui.annulla') }}</button>
                                                <a href="{{ route('become.revisor') }}"
                                                    class="btn px-3 c-5 py-2 shadow modal-si">{{ __('ui.candidati') }}</a>
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

        {{-- privacy --}}
        <div
            class="d-flex flex-column flex-sm-row justify-content-between pt-3 ps-lg-5 mx-3 mx-md-5 border-top border-secondary">
            <p class="c-2">{{ __('ui.privacy') }}</p>
        </div>


        <div
            class="d-flex flex-column flex-sm-row justify-content-between pt-4 ps-lg-5 mx-3 mx-md-5 border-top border-secondary">
            <p class="c-2">&copy; 2025 The Final Commit.{{__('ui.tuttiIDirittiRiservati')}}.</p>
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
