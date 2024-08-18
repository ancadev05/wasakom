@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

{{-- menampilkan nota servisan --}}
@section('content')
    <div class="pagetitle">
        <h1>Nota Servisan</h1>
    </div>

    <section class="section">

        <div class="card p-3" style="font-size: 12px">
            <div class="row" id="document-print">
                <div class="col-12 col-lg-6">
                    <div class="row mb-2 border-bottom pb-2 align-items-center">
                        <div class="col-2">
                            <img src="{{ asset('assets/img/logo-wana.png') }}" alt="" width="60px" class="ms-2">
                        </div>
                        <div class="col-10" style="line-height:1.2;">
                            <div class="fw-bold" style="font-size: 16px">CV. Wana Satria Komputindo</div>
                            <div class="m-0 p-0"><small>Jl. Monumen Emmy Saelan No. 9C, Kel. Gn. Sari,</small></div>
                            <div class="m-0 p-0"><small>Kec. Rappocini, Kota Makassar</small></div>
                            <div class="m-0 p-0"><small>Telp. 0811-459-354</small></div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-sm w-100">
                            <tr>
                                <td>Tanggal Masuk</td>
                                <td>: {{ $servisan->tgl_masuk }}</td>
                            </tr>
                            <tr>
                                <td>No. Servisan</td>
                                <td>: {{ $servisan->no_servisan }}</td>
                            </tr>
                            <tr>
                                <td>Nama Costumer</td>
                                <td>: {{ $servisan->costumer->nama }}</td>
                            </tr>
                            <tr>
                                <td>No. WA</td>
                                <td>: {{ $servisan->costumer->no_wa }}</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: {{ $servisan->costumer->alamat }}</td>
                            </tr>
                            <tr>
                                <td>Merek</td>
                                <td>: {{ $servisan->laptopmerek->merek }}</td>
                            </tr>
                            <tr>
                                <td>Tipe</td>
                                <td>: {{ $servisan->tipe }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="mb-2">
                        <span class="fw-bold d-block">Kelengkapan:</span>
                        <span class="d-block mb-1">{{ $servisan->kelengkapan }}</span>
                        <span class="fw-bold">Description:</span>
                        <span class="d-block">{{ $servisan->keluhan . '. ' . $servisan->ket}}</span>
                    </div>
                    <div class="mb-2">
                        <span class="fw-bold me-3">Servisan:</span>
                        <span class="me-2">
                            <input type="checkbox" name="ringan" id="ringan">
                            <label for="ringan">Ringan</label>
                        </span>
                        <span class="me-2">
                            <input type="checkbox" name="sedang" id="sedang">
                            <label for="sedang">Sedang</label>
                        </span>
                        <span class="me-2">
                            <input type="checkbox" name="berat" id="berat">
                            <label for="berat">Berat</label>
                        </span>
                    </div>

                    <div>
                        <span class="fw-bold">Catatan Teknisi:</span>
                        <div class="border w-100 mb-2" style="height: 110px"></div>
                    </div>
                    <span class="fw-bold">Biaya:</span>
                    <span>.............................</span>
                    <div class="d-flex justify-content-end">
                        <div>
                            <div>...................</div>
                            <div>Teknisi</div>
                        </div>
                    </div>
                </div>


            </div> {{-- /row --}}



            <div class="d-flex justify-content-center my-3">
                <button id="print" type="submit" class="btn btn-sm btn-primary me-2 shadow-sm" data-bs-placment="top"
                    title="Cetak"><i class="bi bi-printer"></i> Print</button>
                <a href="{{ url('/servisan') }}" class="btn btn-sm btn-danger shadow-sm">Back</a>
            </div>

        </div>


    </section>
@endsection

