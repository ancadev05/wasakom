@extends('template-dashboard.tampilan-default')

@section('title')
    Buat Laptop
@endsection

@section('content')
    <h3 class="border-bottom pb-1 mb-3">Daftar Laptop</h3>

    <ul class="nav nav-tabs mb-3">
        <li class="nav-item">
            <a href="#" class="nav-link active">Penyewaan</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Jual</a>
        </li>
    </ul>

    <div class="shadow bg-white p-3">

        <div class="table-responsive">
            <span class="border-bottom">List Laptop</span>
            <table class="table table-sm table-striped table-hover table-bordered">
                <thead class="bg-secondary text-bg-dark text-center">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Serial Number</th>
                        <th>Item</th>
                        <th>Tanggal Mulai</th>
                        <th>Tanggal Berakhir</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
        </div>

    </div>
@endsection