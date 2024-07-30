@extends('template-dashboard.template-niceadmin')

@section('title')
    Penyewaan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Penyewaan Costumer</h1>
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
                <tr>
                    <td>Tanggal Mulai</td>
                    <td>: {{ tanggalIndonesia($costumer->tgl_mulai) }}</td>
                </tr>
                <tr>
                    <td>Tanggal Selesai</td>
                    <td>: {{ tanggalIndonesia($costumer->tgl_selesai) }}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>: {{ $costumer->costumer->no_wa }}</td>
                </tr>
            </table>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover w-100" id="datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Laptop</th>
                            <th>Merek-Tipe</th>
                            <th>Spesifikasi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($speklaptop as $item)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>#{{ $item['id'] }}</td>
                                    <td>{{ $item['mt'] }}</td>
                                    <td>{{ $item['spek'] }}</td>
                                    <td>
                                        <form action="{{ url('/penyewaan-hapus-unit/' . $costumer->costumer_id . '/' . $item['id'] . '/' . $costumer->tgl_mulai . '/' . $costumer->tgl_selesai) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                                data-bs-placment="top" title="Hapus"><i class="bi bi-trash"></i></button>
                                        </form>
                                    </td>
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
                <a href="{{ url('/penyewaan-edit/' . $costumer->costumer_id) }}" class="btn btn-sm btn-warning shadow-sm ms-2">Edit</a>
                <form action="{{ url('/penyewaan-selesai/' . $costumer->costumer_id . '/' . $costumer->tgl_selesai) }}" method="post" onsubmit="return confirm('Penyewaan sudah selesai?')" class="mx-2">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-success shadow-sm">Selesai</button>
                </form>
                <a href="{{ url('/penyewaan') }}" class="btn btn-sm btn-danger shadow-sm">Kembali</a>
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
