<x-layout>
    <header class="container mt-5 pt-5 vh-100">
        <div class="row justify-content-center pt-3">
            <h1 class="col-12 display-4 text-center mb-3">{{ __('ui.login') }}</h1>
            <div class="col-6">
                <x-error></x-error>
            </div>
        </div>

        <div class="row justify-content-center mt-5">
            <form method="POST" action="{{ route('login') }}" class="col-6 col-md-8 col-lg-6 rounded shadow bg-1 px-5 py-4">
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
                <button type="submit" class="btn btn-cus bg-4 w-100 p-3 mt-4 fs-5" id="btn-login">{{ __('ui.login') }}</button>

                <div class="text-center mt-4">
                    <a href="{{ route('register') }}" class="text-decoration-none c-2 fs-5">Non sei {{__('ui.registrati')}}? {{__('ui.registrati')}}</a>
                </div>

            </form>
        </div>
    </header>

    <x-footer></x-footer>

</x-layout>
