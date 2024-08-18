@extends('template-dashboard.template-niceadmin')

@section('title')
    Accounting
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Accounting</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="me-2" style="font-size: 80px">
                                <i class="bi bi-journal-text text-secondary"></i>
                            </div>
                            <div>
                                <h3 class="card-title">Jurnal</h3>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, ipsum.</p>
                                <a href="#" class="card-link">Buat</a>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Buku Besar</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, ipsum.</p>
                        <a href="#" class="card-link">Buat</a>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h3 class="card-title">Neraca</h3>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Minima, ipsum.</p>
                        <a href="#" class="card-link">Buat</a>
                    </div>
                </div>
            </div>
        </div>
        
    </section>
@endsection
