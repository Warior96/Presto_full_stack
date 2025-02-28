<x-layout>
    <header class="container mt-5 pt-4 vh-100">
        <div class="row justify-content-center">
            <h1 class="col-12 display-2 text-center mb-3">Login</h1>
            <div class="col-6">
                <x-error></x-error>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <form method="POST" action="{{ route('login') }}" class="col-6 col-md-8 col-lg-6 rounded shadow p-5">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="emailLogin">Email</label>
                    <input type="email" class="form-control" name="email" id="emailLogin"
                        value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label class="form-label" for="passwordLogin">Password</label>
                    <input type="password" class="form-control" name="password" id="passwordLogin">
                </div>
                <button type="submit" class="btn btn-primary w-100 p-3 mt-4 fs-5">{{ __('ui.login') }}</button>

                <div class="text-center mt-4">
                    <a href="{{ route('register') }}" class="text-decoration-none fs-5">Non sei registrato? Registrati</a>
                </div>
            </form>
        </div>
    </header>

    <x-footer></x-footer>

</x-layout>
