{{-- Pesan sukses tambah data --}}
@if (Session::has('success'))
    <div
        class="pesan alert-dismissible fade show alert alert-success rounded-0 border-0 border-start border-3 border-success d-inline-block position-absolute end-0 top-0">
        {{ Session::get('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
