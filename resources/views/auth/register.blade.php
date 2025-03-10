<x-layout>
    <header class="container mt-5 pt-5 min-vh-100">
        <div class="row justify-content-center">
            <h1 class="col-12 display-4 text-center mb-3">{{ __('ui.registrati') }}</h1>
        </div>

        <div class="row justify-content-center mt-3">
            <form method="POST" action="{{ route('register') }}"
                class="col-6 col-md-8 col-lg-6 rounded shadow bg-1 px-5 py-4">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="nameRegister">Username</label>
                    <input type="text" class="form-control" id="nameRegister" name="name"
                        value="{{ old('name') }}">
                </div>
                <div class="mb-3">
                    <label for="emailRegister" class="form-label">Email </label>
                    <input type="email" class="form-control" id="emailRegister" name="email"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="passwordRegister" class="form-label">Password</label>
                    <input type="password" class="form-control" id="passwordRegister" name="password">
                    @error('password')
                        <div class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="passwordRegisterConfirmation" class="form-label">Conferma la password</label>
                    <input type="password" class="form-control" id="passwordRegisterConfirmation"
                        name="password_confirmation">
                    @error('password_confirmation')
                        <div class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-cus bg-4 w-100 p-3 mt-4 fs-5"
                    id="btn-register">{{ __('ui.registrati') }}</button>
                <div class="text-center mt-4">
                    <a href="{{ route('login') }}" class="text-decoration-none c-2 fs-5">Sei già registrato? Accedi</a>
                </div>
            </form>
        </div>
    </header>
    {{-- <x-footer></x-footer> --}}
</x-layout>
