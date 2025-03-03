<div class="col-10 col-md-8 col-lg-6 rounded shadow px-5 py-4 mb-5 bg-1">
    <form wire:submit="createArticles">
        @csrf

        {{-- titolo --}}
        <div class="mb-3">
            <label class="form-label" for="title">{{ __('ui.titolo') }}</label>
            <input type="text" class="form-control" wire:model.blur="title" id="title" value="{{ old('title') }}">
            @error('title')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- descrizione --}}
        <div class="form-floating mb-3">
            <textarea class="form-control" placeholder="Scrivi una descrizione" id="description" wire:model.blur="description"></textarea>
            <label for="description">{{ __('ui.descrizione') }}</label>
            @error('description')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- immagini --}}
        <div class="mb-3">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="temporary_images">Foto:</label>
                <span class="mt-1 fs-7">*massimo 6 alla volta</span>
            </div>
            <input type="file" wire:model.live="temporary_images" multiple
                class="form-control shadow @error('temporary_images.*') is-invalid @enderror" placeholder="Img/">
            @error('temporary_images.*')
                <p class="fst-italic text-danger ps-3 my-1 border border-1 border-danger py-2 bg-2 rounded">
                    {{ $message }}</p>
            @enderror
            @error('temporary_images')
                <p class="fst-italic text-danger ps-3 my-1 border border-1 border-danger py-2 bg-2 rounded">
                    {{ $message }}</p>
            @enderror
        </div>

        @if (!empty($images))
            <div class="row">
                <div class="col-12">
                    <p>Preview delle foto:</p>
                    <div
                        class="row mx-1 bg-white rounded shadow py-2 justify-content-center align-items-center mb-3">
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

        {{-- prezzo --}}
        <div class="mb-3">
            <label class="form-label" for="price">{{ __('ui.prezzo') }}</label>
            <input type="number" step="0.01" class="form-control" wire:model.blur="price" id="price">
            @error('price')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- categorie --}}
        <div class="mb-3">
            <label class="form-label" for="category">{{ __('ui.categoria') }}</label>
            <select wire:model.blur="category" class="form-select" id="category">
                <option value="">{{ __('ui.selezionaCategoria') }}</option>

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ __("ui.$category->name") }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn bg-4 btn-cus w-100 p-3 mt-4 mb-1 fs-5"
            id="addProduct">{{ __('ui.aggiungiProdotto') }}</button>

    </form>
</div>
