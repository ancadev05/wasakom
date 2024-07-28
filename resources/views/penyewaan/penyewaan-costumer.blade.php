@extends('template-dashboard.template-niceadmin')

@section('title')
    Penyewaan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Penyewaan</h1>
</div>

    <section class="section">


        <div class="card p-3">
            <table class="table table-sm mb-3">
                <tr>
                    <td>Nama</td>
                    <td>: {{ $costumer->costumer->nama }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>: {{ $costumer->costumer->alamat }}</td>
                </tr>
                <tr>
                    <td>No. WA</td>
                    <td>: {{ $costumer->costumer->no_wa }}</td>
                </tr>
            </table>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover" id="datatables">
                    <thead class="bg-secondary text-bg-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Merek-Tipe</th>
                            <th>Spesifikasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($penyewaans as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->tgl_mulai }}</td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @empty
                            <div class="alert alert-danger">Belum ada data yang tersedia</div>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-3">
                {{-- <button type="submit" class="btn btn-sm btn-primary me-1 shadow-sm">Tambah</button> --}}
                <a href="{{ url('/costumer') }}" class="btn btn-sm btn-success shadow-sm">Selesai</a>
            </div>

        </div>
    </section>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
        });
    </script>
@endsection
