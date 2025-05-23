<x-layout>
    <header class="container mt-5 pt-5 vh-100">
        <div class="row justify-content-center pt-3">
            <h1 class="col-12 display-4 text-center mb-3">{{ __('ui.login') }}</h1>
        </div>

        <div class="row justify-content-center mt-5">
            <form method="POST" action="{{ route('login') }}"
                class="col-10 col-md-8 col-lg-6 rounded shadow bg-1 px-4 px-md-5 py-4">
                @csrf
                <div class="mb-3">
                    <label class="form-label" for="emailLogin">{{__('ui.email')}}</label>
                    <input type="email" class="form-control" name="email" id="emailLogin"
                        value="{{ old('email') }}">
                    @error('email')
                        <div class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                            @if (($message == 'The email field is required.' && session('locale') == 'it') || session('locale') == null)
                                Il campo email è obbligatorio.
                            @elseif ($message == 'The email field is required.' && session('locale') == 'zh-tw')
                                必须填写邮箱
                            @elseif (
                                ($message == 'These credentials do not match our records.' && session('locale') == 'it') ||
                                    session('locale') == null)
                                Email e password non corrispondono a nessun utente registrato.
                            @elseif ($message == 'These credentials do not match our records.' && session('locale') == 'zh-tw')
                                邮箱密码与我们的数据不匹配
                            @elseif (($message == 'The email must be a valid email address.' && session('locale') == 'it') || session('locale') == null)
                                L'email deve essere un indirizzo email valido.
                            @elseif ($message == 'The email must be a valid email address.' && session('locale') == 'zh-tw')
                                邮箱不存在
                            @else
                                {{ $message }}
                            @endif
                        </div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label class="form-label" for="passwordLogin">{{__('ui.password')}}</label>
                    <input type="password" class="form-control" name="password" id="passwordLogin">
                    @error('password')
                        <div class="px-2 py-1 fst-italic bg-danger-subtle rounded mt-1">
                            @if (($message == 'The password field is required.' && session('locale') == 'it') || session('locale') == null)
                                Il campo password è obbligatorio.
                            @elseif ($message == 'The password field is required.' && session('locale') == 'zh-tw')
                                必须填写密码
                            @elseif (($message == 'The password is incorrect.' && session('locale') == 'it') || session('locale') == null)
                                La password è errata.
                            @elseif ($message == 'The password is incorrect.' && session('locale') == 'zh-tw')
                                密码错误
                            @else
                                {{ $message }}
                            @endif
                        </div>
                    @enderror
                </div>
                <div class="w-100 d-flex justify-content-center">
                <button type="submit" class="btn btn-cus bg-5 c-2 w-100 w-md-75 rounded-pill p-3 mt-4 fs-5"
                    id="btn-login">{{ __('ui.login') }}</button>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('register') }}" class="text-decoration-none c-2 fs-5">{{__('ui.nonHaiUnAccount')}}?
                        {{ __('ui.registrati') }}</a>
                </div>

            </form>
        </div>
    </header>

    <x-footer></x-footer>

</x-layout>
