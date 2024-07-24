@extends('template-dashboard.template-niceadmin')

@section('title')
    Laptop Terjaul
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Laptop Terjual</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <a href="{{ url('404') }}" class="btn btn-sm btn-primary mb-3 shadow-sm"><i class="bi bi-plus-lg"></i> Buat</a>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover" id="datatables">
                    <thead class="bg-secondary text-bg-dark text-center">
                        <tr>
                            <th>Tanggal</th>
                            <th>Costumer</th>
                            <th>#id:SN</th>
                            <th>Merek-Type</th>
                            <th>Spek</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($laptops as $laptop)
                            <tr>
                                <td>{{ $laptop->updated_at }}</td>
                                <td></td>
                                <td>#{{ $laptop->id }}:{{ $laptop->sn }}</td>
                                <td>{{ $laptop->laptopmerek->merek }}-{{ $laptop->laptoptipe->tipe }}</td>
                                <td>{{ $laptop->cpu }}/{{ $laptop->ram }}/{{ $laptop->storage }}</td>
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
                            </tr>
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
