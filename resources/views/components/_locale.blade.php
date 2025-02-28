<form class="d-inline" action="{{ route('setLocale', $lang) }}" method="POST">
    @csrf
    <button type="submit" class="btn border-0 py-0 ps-0">
        <img src="{{ asset('vendor/blade-flags/language-' . $lang . '.svg') }}" alt="{{ $lang }} Flag"
            width="32" height="32" class="me-2">
        @if ($lang == 'it')
            Italiano
        @elseif ($lang == 'en')
            English 
        @elseif ($lang == 'zh-tw')
            简体中文
        @endif
    </button>
</form>
