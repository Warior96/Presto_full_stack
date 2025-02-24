<x-layout>


    <div class="container">
        <div class="row mt-5 justify-content-center">
            <h1 class="col-12 text-center c_2 p-5">Login</h1>

            <x-error></x-error>
        </div>

        <div class="row justify-content-center mb-5">
            <div class="col-10 col-lg-5 shadow rounded px-3 px-md-5 pt-5 bg_3">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email" value="{{old('email') }}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <button type="submit" class="btn btn-primary m-5 d-block mx-auto">Login</button>

                    <a href="{{route('register')}}">Non sei registrato? Registrati</a>
                </form>
            </div>
        </div>
    </div>

</x-layout>