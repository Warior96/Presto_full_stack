<x-layout>

    <header class="container mt-5 pt-3 min-vh-100">
        <div class="row justify-content-center pt-3">
            <h1 class="col-12 display-5 text-center mb-4">{{ __('ui.aggiungiUn') }} {{ __('ui.prodotto')}}</h1>
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
    </header>
    <x-footer></x-footer>
</x-layout>
