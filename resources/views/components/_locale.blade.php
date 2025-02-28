<form class="d-inline" action="{{ route('setLocale', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="btn py-0 ps-0">
        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" alt="{{ $lang }} Flag"
            width="32" height="32">
    </button>
</form>
