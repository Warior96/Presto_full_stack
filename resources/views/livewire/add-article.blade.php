<div class="col-10 col-md-8 col-lg-6 rounded shadow px-4 px-md-5 py-4 mb-5 bg-1">
    <form wire:submit="createArticles">
        @csrf

        {{-- titolo --}}
        <div class="mb-3">
            <label class="form-label" for="title">{{ __('ui.titolo') }}:</label>
            <input type="text" class="form-control" wire:model.blur="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- descrizione --}}
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Scrivi una descrizione" id="description" wire:model.blur="description"></textarea>
            <label for="description">{{ __('ui.descrizione') }}:</label>
            @error('description')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- immagini --}}
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="temporary_images">{{ __('ui.immagine') }}:</label>
                <span class="mt-1 fs-8 dark">*massimo 5 alla volta</span>
            </div>
            <input type="file" wire:model.live="temporary_images" multiple
                class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
            @error('temporary_images.*')
                <p class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                    {{ $message }}</p>
            @enderror
            @error('temporary_images')
                <p class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                    {{ $message }}</p>
            @enderror
        </div>

        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Preview delle foto:</p>
                    <div class="row mx-1 bg-white rounded shadow py-2 justify-content-center align-items-center mb-3">
                        @foreach ($images as $key => $image)
                            <div
                                class="col-12 col-md-6 col-lg-4 d-flex flex-column align-items center my-3 position-relative">
                                <div class="img-preview mx-auto shadow rounded"
                                    style="background-image: url({{ $image->temporaryUrl() }});"></div>
                                <button type="button" class="btn btn-cus btn-danger rounded-1 position-absolute"
                                    id="btn-preview" wire:click="removeImage({{ $key }})"><i
                                        class="fa-solid fa-xmark" id="icon-preview"></i></button>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
        {{-- condizioni --}}
        <div class="mb-3">
            <label class="form-label" for="condition">{{ __('ui.condizione') }}:</label>
            <select wire:model.blur="condition" class="form-select" id="condition">
                <option value="">Seleziona {{ __('ui.condizione') }}</option>
                <option value="new"> {{ __('ui.new') }}</option>
                <option value="used">{{ __('ui.used') }}</option>
                <option value="reconditioned">{{ __('ui.reconditioned') }}</option>
            </select>
            @error('condition')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- prezzo --}}
        <div class="mb-3">
            <label class="form-label" for="price">{{ __('ui.prezzo') }}:</label>
            <div class="price-container">
                <i class="price-icon">{{ __('ui.€') }}</i>
                <input type="number" step="0.01" class="form-control price-input" wire:model.blur="price"
                    id="price">
            </div>

            @error('price')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- categorie --}}
        <div class="mb-3">
            <label class="form-label" for="category">{{ __('ui.categoria') }}:</label>
            <select wire:model.blur="category" class="form-select" id="category">
                <option value="">{{ __('ui.selezionaCategoria') }}</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ __("ui.$category->name") }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="w-100 d-flex justify-content-center">
            <button type="submit" class="btn bg-5 c-2 btn-cus w-100 p-3 mt-4 mb-1 fs-5 w-100 w-md-75 rounded-pill"
                id="addProduct">{{ __('ui.aggiungiUn') }} {{ __('ui.prodotto') }}</button>
        </div>

    </form>
</div>
