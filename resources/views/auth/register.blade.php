<x-layout>
    <div class="container mt-5 ">
        <div class="row">
            <div class="col-6"></div>
            <div class="col-6 ">
                <h1 class="display-1 text-center mb-3">registrati</h1>
                <x-error></x-error>
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" class="form-control" aria-describedby="emailHelp" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email </label>
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                            name="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">conferma la password</label>
                        <input type="password" class="form-control" id="exampleInputPassword1"
                            name="password_confirmation">
                    </div>
                    <button type="submit" class="btn btn-primary w-100 p-3 mt-4">registrati</button>
                </form>
            </div>
        </div>
    </div>
</x-layout>