@extends('template-dashboard.template-niceadmin')

@section('title')
    Accounting
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Jurnal</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card p-3">
            {{-- kop laporan --}}
            <div class="d-flex border-bottom border-2 border-dark mb-3 justify-content-center align-items-center p-2">
                <img src="{{ asset('assets/img/logo-wana.png') }}" alt="" width="100px" class="me-3">
                <div class="text-center p-0 m-0" style="line-height: 1">
                    <h4 class="p-0 m-0">CV. WANA SATRIA KOMPUTINDO</h4>
                    <h5 class="p-0 m-0">JURNAL</h5>
                    <h6 class="p-0 m-0">Per Tanggal 
                        1 Jan <br>
                        Ref. qw21-78
                        uari 2024</h6>
                    <span style="font-size: 11px" class="p-0 m-0 d-block"><i>Jl. Monumen Emmy Saelan No. 9C, Kel. Gn.
                            Sari, Kec. Rappocini, Kota Makassar</i></span>
                    <span style="font-size: 11px" class="p-0 m-0 d-block"><i>Whatsapp : 08117229354, E-Mail :
                            cvwanasatria.id@gmail.com</i></span>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-sm table-bordered nowrap w-100">
                    <thead>
                        <tr class="text-center">
                            <th>Tanggal</th>
                            <th>Nama Akun</th>
                            <th>COA</th>
                            <th>Debit</th>
                            <th>Kredit</th>
                            <th>Ket.</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>
                                1 Jan <br>
                                Ref. qw21-78
                            </td>
                            <td>
                                Kendaraan <br>
                                Peralatan Kantor <br>
                                Kas <br>
                                Utang Usaha <br>
                            </td>
                            <td class="text-center">
                                151 <br>
                                151 <br>
                                151 <br>
                                151 <br>
                            </td>
                            <td class="text-end">
                                36.000.000 <br>
                                36.000.000 <br>
                            </td>
                            <td class="text-end">
                                <br>
                                <br>
                                36.000.000 <br>
                                36.000.000 <br>
                            </td>
                            <td>
                                Jangan buat keterangan tambahan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                1 Jan <br>
                                Ref. qw21-78
                            </td>
                            <td>
                                Kendaraan <br>
                                Peralatan Kantor <br>
                                Kas <br>
                                Utang Usaha <br>
                            </td>
                            <td class="text-center">
                                151 <br>
                                151 <br>
                                151 <br>
                                151 <br>
                            </td>
                            <td class="text-end">
                                36.000.000 <br>
                                36.000.000 <br>
                            </td>
                            <td class="text-end">
                                <br>
                                <br>
                                36.000.000 <br>
                                36.000.000 <br>
                            </td>
                            <td>
                                Jangan buat keterangan tambahan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                1 Jan <br>
                                Ref. qw21-78
                            </td>
                            <td>
                                Kendaraan <br>
                                Peralatan Kantor <br>
                                Kas <br>
                                Utang Usaha <br>
                            </td>
                            <td class="text-center">
                                151 <br>
                                151 <br>
                                151 <br>
                                151 <br>
                            </td>
                            <td class="text-end">
                                36.000.000 <br>
                                36.000.000 <br>
                            </td>
                            <td class="text-end">
                                <br>
                                <br>
                                36.000.000 <br>
                                36.000.000 <br>
                            </td>
                            <td>
                                Jangan buat keterangan tambahan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                1 Jan <br>
                                Ref. qw21-78
                            </td>
                            <td>
                                Kendaraan <br>
                                Peralatan Kantor <br>
                                Kas <br>
                                Utang Usaha <br>
                            </td>
                            <td class="text-center">
                                151 <br>
                                151 <br>
                                151 <br>
                                151 <br>
                            </td>
                            <td class="text-end">
                                36.000.000 <br>
                                36.000.000 <br>
                            </td>
                            <td class="text-end">
                                <br>
                                <br>
                                36.000.000 <br>
                                36.000.000 <br>
                            </td>
                            <td>
                                Jangan buat keterangan tambahan
                            </td>
                        </tr>
                        <tr>
                            <td>
                                1 Jan <br>
                                Ref. qw21-78
                            </td>
                            <td>
                                Kendaraan <br>
                                Peralatan Kantor <br>
                                Kas <br>
                                Utang Usaha <br>
                            </td>
                            <td class="text-center">
                                151 <br>
                                151 <br>
                                151 <br>
                                151 <br>
                            </td>
                            <td class="text-end">
                                36.000.000 <br>
                                36.000.000 <br>
                            </td>
                            <td class="text-end">
                                <br>
                                <br>
                                36.000.000 <br>
                                36.000.000 <br>
                            </td>
                            <td>
                                Jangan buat keterangan tambahan
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        
    </section>
@endsection
