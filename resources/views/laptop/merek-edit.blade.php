@extends('template-dashboard.template-niceadmin')

@section('title')
    Merek & Tipe Laptop
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Merek Laptop</h1>
    </div><!-- End Page Title -->
    <section class="section">
        <div class="card p-3">
            <form action="{{ url('/merek/' . $merek->id) }}" method="post">
                @csrf
                <div class="mb-3">
                    {{-- <label for="merek" class="col-sm-3 col-form-label">Merek Laptop</label> --}}
                    <input type="text" class="form-control" id="merek" name="merek" value="{{ $merek->merek }}">
                </div>
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm">Simpan</button>
                    <a href="{{ url('/mt') }}" type="submit" class="btn btn-sm btn-danger me-2 shadow-sm">Batal</a>
                </div>
            </form>
        </div>
    </section>
@endsection
