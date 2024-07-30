@extends('template-dashboard.template-niceadmin')

@section('title')
    Laptop Terjaul
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Laptop Terjual</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <a href="{{ url('laptop-display') }}" class="btn btn-sm btn-primary mb-3 shadow-sm"><i class="bi bi-plus-lg"></i> Jual</a>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover w-100" id="datatables">
                    <thead class="bg-secondary text-bg-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Merek-Tipe</th>
                            <th>Spesifikasi</th>
                            <th>Harga Jual</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i=1;
                        @endphp
                        @forelse ($laptop_terjual as $laptop)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>
                                @if ($laptop->tgl_jual)
                                    {{ $laptop->tgl_jual }}
                                @else
                                    {{ $laptop->created_at }}
                                @endif
                            </td>
                            <td>{{ $laptop->mt }}</td>
                            <td>{{ $laptop->spesifikasi }}</td>
                            <td class="text-end">Rp{{ format_uang($laptop->harga_jual) }},-</td>
                            <td>{{ $laptop->keterangan }}</td>
                            <td><button class="btn btn-sm btn-secondary">Invoice</button></td>
                        </tr>
                        @php
                            $i++
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
