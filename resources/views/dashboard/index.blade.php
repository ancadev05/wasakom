@extends('template-dashboard.template-niceadmin')

@section('title')
    Dashboard
@endsection

@section('content')
    {{-- <div class="pagetitle">
        <h1>Merek Laptop</h1>
    </div>

    <div class="card p-3">
        <table class="table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Merek</th>
                    <th>Jumlah</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($laptops as $item)
                    <tr>
                        <td>1</td>
                        <td>{{ $item->laptopmerek->merek }}</td>
                        <td>{{ $item->total }}</td>
                        <td>{{ $item->laptopmerek->merek }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}

    <div class="pagetitle">
        <h1>Tipe Laptop</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">

        <div class="row">
            @foreach ($laptops as $item)
                <div class="col-sm-12 col-md-4">
                    <div class="card info-card sales-card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->laptopmerek->merek }}</h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-laptop"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>{{ $item->total }} Unit</h6>
                                    <span class="text-success small pt-1 fw-bold">{{ $item->laptoptipe->tipe }}</span>
                                    {{-- <span class="text-muted small pt-2 ps-1">increase</span> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>




    </section>
@endsection
