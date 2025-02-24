<x-layout>

    <div class="container mt-5 pt-4">
        <div class="row justify-content-center">
            <h1 class="col-12 display-1 text-center mb-3">Crea un articolo</h1>
            <x-success />

            {{-- @if (session()->has('success'))
                <div class=" alert alert-success">

                    {{ session('success') }}
                </div>
            @endif --}}

        </div>
        <div class="row justify-content-center">
            <livewire:add-article />
        </div>
    </div>
</x-layout>
