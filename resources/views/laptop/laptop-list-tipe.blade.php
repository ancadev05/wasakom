@extends('template-dashboard.template-niceadmin')

@section('title')
    Laptop
@endsection

@section('content')

    <section class="section">
        <div class="card p-3">
            <h2 class="card-title">{{ $tipe }}</h2>
            <div class="table-responsive mb-3">
                <table class="table table-sm table-striped table-hover w-100" id="datatables">
                    <thead class="bg-secondary text-bg-dark text-center">
                        <tr>
                            <th>#id</th>
                            <th>Tanggal</th>
                            <th>SN</th>
                            <th>Merek</th>
                            <th>Type</th>
                            <th>CPU</th>
                            <th>RAM</th>
                            <th>Storage</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laptops as $laptop)
                            <tr>
                                <td>#{{ $laptop->id }}</td>
                                <td>{{ $laptop->tgl }}</td>
                                <td>{{ $laptop->sn }}</td>
                                <td>{{ $laptop->laptopmerek->merek }}</td>
                                <td>{{ $laptop->laptoptipe->tipe }}</td>
                                <td>{{ $laptop->cpu }}</td>
                                <td>{{ $laptop->ram }}</td>
                                <td>{{ $laptop->storage }}</td>
                                <td>
                                    {{ $laptop->laptopstatus->status . ' ' }}

                                    @if ($laptop->laptop_kondisi_id == 1)
                                        <i class="bi bi-check-circle-fill text-success" data-bs-toggle="tooltip"
                                            data-bs-placment="top" title="Normal"></i>
                                    @else
                                        <i class="bi bi-exclamation-circle-fill text-warning" data-bs-toggle="tooltip"
                                            data-bs-placment="top" title="Minus"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('laptop/' . $laptop->id . '/edit') }}"
                                        class="btn btn-sm btn-secondary d-inline-block" data-bs-toggle="tooltip"
                                        data-bs-placment="top" title="Detail"><i class="bi bi-eye"></i></a>
                                    <form action="{{ url('laptop/' . $laptop->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin hapus data?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger d-inline-block"
                                            data-bs-toggle="tooltip" data-bs-placment="top" title="Hapus"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <div class="alert alert-danger">Belum ada data yang tersedia</div>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-sm btn-danger shadow-sm" onclick="window.history.back()">Kembali </button>
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
