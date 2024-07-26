@extends('template-dashboard.template-niceadmin')

@section('title')
    Costumer
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Data Costumer</h1>
    </div>

    <section class="section">
        <a href="{{ url('costumer-create') }}" class="btn btn-sm btn-primary mb-3 shadow-sm"><i class="bi bi-plus-lg"></i>
            Costumer</a>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover nowrap w-100" id="datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Costumer</th>
                            <th>No_WA</th>
                            <th>Alamat</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($costumers as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->no_wa }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>
                                    <a href="{{ url('costumer-edit/' . $item->id) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                        data-bs-placment="top" title="Edit">
                                        <i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ url('costumer-delete/' . $item->id) }}" method="POST" class="d-inline"
                                        onclick="return confirm('Yakin ingin hapus data?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" data-bs-toggle="tooltip"
                                            data-bs-placment="top" title="Hapus"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
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
            $('#datatables').DataTable({
                // responsive: true
            });

        });
    </script>
@endsection
