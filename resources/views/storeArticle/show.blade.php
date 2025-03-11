<x-layout>
    <div class="container mt-5 pt-4 min-vh-100">

        {{-- title --}}
        <div class="row justify-content-center align-items-center text-center">
            <div class="col-12">
                <h1 class="display-1 fw-bold mb-1">
                    {{ $article->title }}
                </h1>

                <p class="fs-4 mb-2">
                    Articolo pubblicato da {{ $article->user->name }}
                </p>
            </div>
        </div>

        {{-- card --}}
        <div class="row justify-content-center align-item-center pt-3 pb-5">

            {{-- fotografia --}}
            <div
                class="col-12 d-flex justify-content-center align-items-center col-md-6 mb-2 bg-2-s rounded-pill img-container-detail">
                @if ($article->images->count() > 0)
                    <swiper-container class="mySwiper swiper-container-show" pagination="true" effect="coverflow"
                        grab-cursor="true" centered-slides="true" slides-per-view="auto" coverflow-effect-rotate="50"
                        coverflow-effect-stretch="0" coverflow-effect-depth="100" coverflow-effect-modifier="1"
                        coverflow-effect-slide-shadows="true">
                        @foreach ($article->images as $key => $image)
                            <swiper-slide
                                class="swiper-slide-show rounded-4 overflow-hidden @if ($loop->first) active @endif">
                                <div>
                                    <img src="{{ $image->getUrl(600, 600) }}" class="rounded-4 h-100 aspect-ratio-1"
                                        alt="Immagine {{ $key + 1 }} dell'articolo {{ $article->title }}" />
                                </div>
                            </swiper-slide>
                        @endforeach
                    </swiper-container>
                @else
                    <swiper-container class="mySwiper swiper-container-show" pagination="true" effect="coverflow"
                        grab-cursor="true" centered-slides="true" slides-per-view="auto" coverflow-effect-rotate="50"
                        coverflow-effect-stretch="0" coverflow-effect-depth="100" coverflow-effect-modifier="1"
                        coverflow-effect-slide-shadows="true">
                        <swiper-slide class="swiper-slide-show rounded-4 overflow-hidden">
                            <div>
                                <img src="https://picsum.photos/300" class="rounded-4 h-100 aspect-ratio-1"
                                    alt="Nessun foto inserita dall'utente">
                            </div>
                        </swiper-slide>
                    </swiper-container>
                @endif
            </div>

            {{-- dettagli articolo --}}
            <div class="col-12 col-md-6 mb-3 min-vh-50 ps-lg-4 d-flex justify-content-between flex-column ">
                <div>
                    {{-- Prezzo e condizione --}}
                    <h3 class="fw-bold mb-3 price-detail">
                        {{ __('ui.€') }}{{ $article->price }}
                        <span class="fs-1 text-muted fst-italic text-uppercase hover">
                            @if ($article->condition == 'new')
                                {{ __('ui.new') }}
                            @elseif ($article->condition == 'used')
                                {{ __('ui.used') }}
                            @elseif ($article->condition == 'reconditioned')
                                {{ __('ui.reconditioned') }}
                            @endif
                        </span>
                    </h3>

                    {{-- Descrizione --}}
                    <p class="fs-7">
                        <span class="fw-bold">
                            Informazioni su questo articolo:
                        </span>
                        <br>
                        {{ $article->description }}
                    </p>

                    {{-- Categoria --}}
                    <div class="fs-7 mt-3 pt-2">
                        <p class="fw-bold pb-0 mb-0">
                            {{ __('ui.categoria') }}:
                        </p>
                        <a href="{{ route('byCategory', ['category' => $article->category]) }}"
                            class="c-1 fst-italic fs-5" target="_blank">
                            {{ __("ui.{$article->category->name}") }}
                        </a>

                    </div>

                    {{-- Altri tag --}}
                    @foreach ($article->images as $key => $image)
                        @if ($image->labels)
                            <p class="fs-7 fw-bold mt-3 pt-2 mb-0">
                                @if ($article->images->count() > 1)
                                    Hashtag che descrivono l'immagine {{ $key + 1 }}:
                                @else
                                    Hashtag che descrivono l'immagine:
                                @endif
                            </p>
                            <p class="fs-7 mt-0">
                                @foreach ($image->labels as $label)
                                    <span class="text-muted">
                                        #{{ $label }}
                                    </span>

                                    @if (!$loop->last)
                                        <span class="text-muted">
                                            ,
                                        </span>
                                    @else
                                        <span class="text-muted">
                                            .
                                        </span>
                                    @endif
                                @endforeach
                            </p>
                        @endif
                    @endforeach

                </div>
                {{-- Informazioni secondarie --}}
                <div class="data-container-detail w-100 d-flex justify-content-between">
                    <p class="data-detail">Approvato dai nostri revisori</p>
                    <p class="data-detail">{{ $article->updated_at->format('d/m/Y') }}</p>
                </div>


            </div>
        </div>
    </div>

    <x-footer />
</x-layout>
