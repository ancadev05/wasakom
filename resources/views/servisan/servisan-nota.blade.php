@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Nota Servisan</h1>
    </div>

    <section class="section">

        <div class="card p-3" style="font-size: 10px">
            <div class="row">
                <div class="col-6">
                    <div class="table-responsive">
                        <table class="table table-sm w-100">
                            <tr>
                                <td>Tanggal Buat</td>
                                <td>: {{ date('y/m/d') }}</td>
                            </tr>
                            <tr>
                                <td>No. Servisan</td>
                                <td>: 0023</td>
                            </tr>
                            <tr>
                                <td>Nama Cosumter</td>
                                <td>: Hamzah</td>
                            </tr>
                            <tr>
                                <td>No. WA</td>
                                <td>: 387482479</td>
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>: Alamat</td>
                            </tr>
                            <tr>
                                <td>Merek</td>
                                <td>: Merek</td>
                            </tr>
                            <tr>
                                <td>Tipe</td>
                                <td>: Tipe</td>
                            </tr>
                        </table>
                    </div>
                    <span class="fw-bold">Description:</span>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Hic cumque, voluptatem distinctio mollitia provident nihil reprehenderit illo amet eius? Quia, totam quas corporis nam ipsam nostrum ratione possimus soluta molestias.</p>
                </div>
                <div class="col-6">
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
                        <div class="border w-100 mb-2" style="height: 100px"></div>
                    </div>
                    <span class="fw-bold">Biaya:</span>
                    <span>.............................</span>
                    <div class="d-flex justify-content-end">
                        <div>
                            <div>{{ date('y-m-d') }}</div>
                            <div>Teknisi</div>
                        </div>
                    </div>
                </div>


            </div> {{-- /row --}}
            


            <div class="d-flex justify-content-center my-3">
                <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm">Cetak</button>
                <a href="{{ url('/servisan') }}" class="btn btn-sm btn-danger shadow-sm">Batal</a>
            </div>

        </div>


    </section>
@endsection
