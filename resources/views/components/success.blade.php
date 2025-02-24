@if (session('success'))
    <div class="col-10 alert alert-success ps-3 list-unstyled d-flex justify-content-between w-100 position-relative">
        {{ session('success') }}
        <button type="button" class="btn-close position-absolute mt-3 me-3 top-0 end-0" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
@endif