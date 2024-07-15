{{-- @extends('template-dashboard.template-kaiadmin') --}}
@extends('template-dashboard.template-stisla')

@section('title')
    Laptop
@endsection

@section('content')

    <section class="section">
        <div class="section-header">
            <h1>Laptop</h1>
        </div>

        <div class="shadow bg-white p-3">
            <a href="{{ url('laptop/create') }}" class="btn btn-sm btn-primary mb-3">Tambah Laptop</a>
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover table-bordered" id="tbl">
                    <thead class="bg-secondary text-bg-dark text-center">
                        <tr>
                            <th>No</th>
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
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($laptops as $laptop)
                            <tr>
                                <td>{{ $i }}</td>
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
                                        <i class="fas fa-check-circle text-success" data-toggle="tooltip"
                                            data-placment="top" title="Normal"></i>
                                    @else
                                        <i class="fas fa-exclamation-circle text-warning" data-toggle="tooltip"
                                            data-placment="top" title="Minus"></i>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('laptop/' . $laptop->id . '/edit') }}" class="btn btn-sm btn-secondary d-inline-block"
                                        data-toggle="tooltip" data-placment="top" title="Detail"><i
                                            class="far fa-eye"></i></a>
                                    <form action="{{ url('laptop/' . $laptop->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin hapus data?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger d-inline-block"
                                            data-toggle="tooltip" data-placment="top" title="Hapus"><i
                                                class="far fa-trash-alt"></i></button>
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
        </div>
    </section>

      <button type="button" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Vivamus sagittis lacus vel augue laoreet rutrum faucibus.">
        On top
      </button>

@endsection

@section('script')
    <script>
        $("#tbl").DataTable({
            layout: {
                top: {
                    buttons: ["excel", "pdf", "print"],
                    // buttons: ["copy", "excel", "pdf", "colvis", "print"],
                },
            }
        });
    </script>
@endsection
