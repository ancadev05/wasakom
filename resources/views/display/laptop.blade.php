@extends('template-display.template')

@section('title')
    Laptop
@endsection

@section('content')
    <div class="page-header">
        <h4 class="page-title">Laptop Display</h4>
    </div>

    <div class="page-category">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <div class="col">
                <div class="card shadow-sm">
                <img src="{{ url('storage/contoh/laptop.png') }}" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225">
                    <div class="card-body">
                        <p class="card-text">This is a wider card with supporting text below as a natural lead-in to
                            additional
                            content. This content is a little bit longer.</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ url('/display/1') }}" type="button"
                                    class="btn btn-sm btn-outline-secondary">View</a>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                            </div>
                            {{-- <small class="text-body-secondary">9 mins</small> --}}
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow">
                <img src="{{ url('storage/contoh/laptop.png') }}" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225">
                    <div class="card-body">
                        <h5 class="card-text fw-bold">Lenovo Thinkpad T480</h5>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ url('/display/1') }}" type="button"
                                    class="btn btn-sm btn-info">View</a>
                                <a href="{{ url('/display/1') }}" type="button"
                                    class="btn btn-sm btn-success">View</a>
                                {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card shadow">
                <img src="{{ url('storage/contoh/laptop.png') }}" alt="" class="bd-placeholder-img card-img-top" width="100%" height="225">
                    <div class="card-body">
                        <p class="card-text fw-bold">Lenovo Thinkpad T480</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="btn-group">
                                <a href="{{ url('/display/1') }}" type="button"
                                    class="btn btn-sm btn-info">View</a>
                                <a href="{{ url('/display/1') }}" type="button"
                                    class="btn btn-sm btn-success">View</a>
                                {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                            </div>
                            <small class="text-body-secondary">9 mins</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
