@extends('template-dashboard.template-niceadmin')

@section('title')
    Laporan Teknisi
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Laporan Harian</h1>
    </div>



    <section class="section">
        {{-- manampilkan laporan harian teknisi --}}
        <div class="card p-3">
            <form action="{{ url('laporan-teknisi-harian') }}" method="post">
                @csrf
                <div class="row align-items-end">
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_awal">Tanggal Awal:</label>
                            <input class="form-control @error('tgl_awal') is-invalid @enderror" type="date"
                                name="tgl_awal" id="tgl_awal" value="{{ old('tgl_awal') }}">
                            @error('tgl_awal')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_akhir">Tanggal Akhir:</label>
                            <input class="form-control @error('tgl_akhir') is-invalid @enderror" type="date"
                                name="tgl_akhir" id="tgl_akhir" value="{{ old('tgl_akhir') }}">
                            @error('tgl_akhir')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="d-grid col-lg-1 mb-3">
                        <button type="submit" class="btn  btn-success shadow-sm">Cek</button>
                    </div>
                </div>
            </form>
        </div>

        {{-- loader export --}}
        <div id="bg-loader" class="d-none">
            <span id="loader-export-text">Export file</span>
            <div id="loader-export"></div>
        </div>


        @if ($tgl_awal && $total_servisan > 0)
            {{-- export pdf --}}
            <div class="d-flex justify-content-end mb-3">
                <button class="btn btn-sm btn-danger" id="export-pdf"><i class="bi bi-file-pdf"></i> Export PDF</button>
            </div>

            <div class="card p-3" id="document-pdf">
                {{-- kop laporan --}}
                <div class="d-flex border-bottom border-2 border-dark mb-3 justify-content-center align-items-center p-2">
                    <img src="{{ asset('assets/img/logo-wana.png') }}" alt="" width="100px" class="me-3">
                    <div class="text-center p-0 m-0" style="line-height: 1">
                        <h4 class="p-0 m-0">CV. WANA SATRIA KOMPUTINDO</h4>
                        <h5 class="p-0 m-0">LAPORAN DEVISI TEKNISI</h5>
                        <h6 class="p-0 m-0">Per Tanggal {{ tanggalIndonesia($tgl_awal) }} -
                            {{ tanggalIndonesia($tgl_akhir) }}</h6>
                        <span style="font-size: 11px" class="p-0 m-0 d-block"><i>Jl. Monumen Emmy Saelan No. 9C, Kel. Gn.
                                Sari, Kec. Rappocini, Kota Makassar</i></span>
                        <span style="font-size: 11px" class="p-0 m-0 d-block"><i>Whatsapp : 08117229354, E-Mail :
                                cvwanasatria.id@gmail.com</i></span>
                    </div>
                </div>

                <h4>Status Servisan Teknisi ok</h4>
                <hr>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Teknisi</th>
                            <th>Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($total_status_servisan_teknisi as $item)
                        <tr>
                            <td>{{ $item->user->karyawan->nama }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{ $total_servisan }}</td>
                    </tr>
                    </tbody>
                </table>

                <h4>Tingkat Kerusakan</h4>
                <hr>
                <table class="table table-sm">
                    <thead>
                        <tr>
                            <th>Tingkat</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tingkat_kerusakan as $item)
                        <tr>
                            <td>{{ $item->jenis_kerusakan }}</td>
                            <td>{{ $item->total }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {{-- chart --}}
                <div class="row">
                    {{-- bar chart --}}
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Merek Laptop yang Diservice</h5>

                                <!-- Bar Chart -->
                                <div id="barChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#barChart"), {
                                            series: [{
                                                name: '',
                                                // data: [400, 430, 448, 470]
                                                data: @json($servisan_merek[1])
                                            }],
                                            chart: {
                                                type: 'bar',
                                                height: 350
                                            },
                                            plotOptions: {
                                                bar: {
                                                    borderRadius: 4,
                                                    horizontal: true,
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            xaxis: {
                                                categories: @json($servisan_merek[0]),
                                            },
                                            tooltip: {
                                                y: {
                                                    formatter: function(val) {
                                                        return val + " unit"
                                                    }
                                                }
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Bar Chart -->

                            </div>
                        </div>
                    </div>
                    {{-- /bar chart --}}

                    {{-- menghitung tingkat kerusakan --}}
                    {{-- bar chart --}}
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Tingkat Kerusakan</h5>

                                <!-- Bar Chart -->
                                <div id="barChart"></div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", () => {
                                        new ApexCharts(document.querySelector("#barChart"), {
                                            series: [{
                                                name: '',
                                                // data: [400, 430, 448, 470]
                                                data: @json($tingkat_kerusakan[0])
                                            }],
                                            chart: {
                                                type: 'bar',
                                                height: 350
                                            },
                                            plotOptions: {
                                                bar: {
                                                    borderRadius: 4,
                                                    horizontal: true,
                                                }
                                            },
                                            dataLabels: {
                                                enabled: false
                                            },
                                            xaxis: {
                                                categories: @json($tingkat_kerusakan[0]),
                                            },
                                            tooltip: {
                                                y: {
                                                    formatter: function(val) {
                                                        return val + " unit"
                                                    }
                                                }
                                            }
                                        }).render();
                                    });
                                </script>
                                <!-- End Bar Chart -->

                            </div>
                        </div>
                    </div>
                    {{-- /bar chart --}}
                </div>


                <h4>Detail Servisan</h4>
                <hr>
                <table class="table table-sm nowrap">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Costumer</th>
                            <th>Keluhan</th>
                            <th>Merek</th>
                            <th>Kerusakan</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Teknisi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servisans as $item)
                        <tr>
                            <td>{{ $item->tgl_masuk }}</td>
                            <td>{{ $item->costumer->nama }}</td>
                            <td>{{ $item->keluhan }}</td>
                            <td>{{ $item->laptopmerek->merek }}</td>
                            <td>{{ $item->kerusakan }}</td>
                            <td>{{ $item->ket }}</td>
                            <td>{{ $item->status }}</td>
                            <td>{{ $item->user->karyawan->nama }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>

            </div> {{-- end card/document --}}
        @endif



    </section>
@endsection
