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
                @auth
                    @if (Auth::user()->is_revisor != true)
                        <div class="col-md-5  d-flex w-100 mb-3">
                            <form>
                                <h5>Richiedi di lavorare con noi</h5>
                                <p>Invia la tua candidatura come revisore</p>
                                <div class="col-3  ">
                                    <button type="button" class="btn btn-primary px-3 py-2 fs-5 rounded shadow"
                                        data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                        Candidati
                                    </button>
                                    {{-- es modale --}}
                                    <div class="it-example-modal">
                                        <div class="modal" tabindex="-1" role="dialog" id="modal1" aria-labelledby="modal1Title" aria-describedby="modal1Description">
                                           <div class="modal-dialog" role="document">
                                              <div class="modal-content">
                                                 <div class="modal-header">
                                                    <h2 class="modal-title h5 " id="modal1Title"> Vuoi lavorare con noi, {{ Auth::user()->name }}?</h2>
                                                 </div>
                                                 <div class="modal-body">
                                                    <p>i tuoi dati:</p>
                                                    <p id="modal1Description">nome:{{ Auth::user()->name }}</p>
                                                    <p>email:{{ Auth::user()->email }}</p>
                                                 </div>
                                                 <div class="modal-footer">
                                                    <button class="btn btn-outline-primary btn-sm" type="button" data-bs-dismiss="modal">No,
                                                        annulla</button>
                                                    <button class="btn btn-primary btn-sm" type="button">Candidati</button>
                                                 </div>
                                              </div>
                                           </div>
                                        </div>
                                     </div>
                                    <!-- Modal -->
                                    {{-- <d5iv class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                        data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content bg text">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5 w-100 pt-3" id="staticBackdropLabel">
                                                        Vuoi lavorare con noi, {{ Auth::user()->name }}?
                                                    </h1>
                                                    <button type="button" class="btn-close bg-white"
                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>i tuoi dati:</p>
                                                    <ul>
                                                        <li>nome:{{ Auth::user()->name }}</li>
                                                        <li>email:{{ Auth::user()->email }}</li>
                                                    </ul>
                                                </div>
                                                <div
                                                    class="modal-footer d-flex justify-content-between align-items-center pb-2">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">No,
                                                        annulla</button>
                                                    <a href="{{ route('become.revisor') }}"
                                                        class="btn btn-primary px-3 py-2 fs-5 rounded shadow">Candidati</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                            </form>

                        </div>
                    @endif
                @endauth
            </div>


        </div>

        
    <div class="d-flex flex-column flex-sm-row justify-content-between py-4 ps-5 mx-5  border-top border-secondary">
        <p>&copy; 2024 Company, Inc. All rights reserved.</p>
        <ul class="list-unstyled d-flex">
            <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-facebook"></i></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-instagram"></i></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-x-twitter"></i></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="#"><i class="fa-brands fa-linkedin"></i></a></li>
        </ul>
      </div>
    </footer>
