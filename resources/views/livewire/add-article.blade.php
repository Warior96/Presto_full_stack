<div class="col-6 col-md-8 col-lg-6 rounded shadow p-5">
    <form wire:submit="createArticles">
        @csrf

        {{-- titolo --}}
        <div class="mb-3">
            <label class="form-label" for="title">Titolo</label>
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
            <label for="description">Descrizione</label>
            @error('description')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- prezzo --}}
        <div class="mb-3">
            <label class="form-label" for="price">Prezzo</label>
            <input type="number" step="0.01" class="form-control" wire:model.blur="price" id="price">
            @error('price')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>

        {{-- categorie --}}
        <div class="mb-3">
            <label class="form-label" for="category">Categoria</label>
            <select wire:model.blur="category" class="form-select" id="category">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category')
                <div class="px-2 py-1 fst-italic bg-danger-subtle rounded">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary w-100 p-3 mt-4">Crea</button>

    </form>
</div>
