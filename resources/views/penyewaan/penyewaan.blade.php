@extends('template-dashboard.template-niceadmin')

@section('title')
    Penyewaan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Daftar Penyewaan</h1>
</div>

    <section class="section">

        <a href="{{ url('/penyewaan-buat') }}" class="btn btn-sm btn-primary mb-3 shadow-sm"><i class="bi bi-plus-lg"></i> Penyewaan</a>

        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover" id="datatables">
                    <thead class="bg-secondary text-bg-dark text-center">
                        <tr>
                            <th>No</th>
                            {{-- <th>Timestime</th> --}}
                            <th>Nama Custumer</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Aksi</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($penyewaan as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                {{-- <td>{{ $item->created_at }}</td> --}}
                                <td>{{ $item->costumer->nama }}</td>
                                <td>{{ tanggalIndonesia($item->tgl_mulai) }}</td>
                                <td>{{ tanggalIndonesia($item->tgl_selesai) }}</td>
                                <td>
                                    <a href="{{ url('penyewaan-costumer/' . $item->costumer_id . '/' . $item->tgl_mulai . '/' . $item->tgl_selesai) }}" class="btn btn-sm btn-warning shadow-sm" data-bs-toggle="tooltip"
                                        data-bs-placment="top" title="Cek">
                                        <i class="bi bi-pencil-square"></i></a>
                                </td>
                                <td>
                                    @if ($item->tgl_selesai <= date('Y-m-d'))
                                        <div class="spinner-grow spinner-grow-sm text-danger" role="status"></div>
                                    @else
                                        <div class="spinner-border spinner-border-sm text-success" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    @endif
                                    
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
