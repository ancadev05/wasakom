@extends('template-dashboard.template-niceadmin')

@section('title')
    Karyawan
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Daftar Karyawan</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <a href="{{ url('karyawan/create') }}" class="btn btn-sm btn-primary mb-3 shadow-sm"><i class="bi bi-plus-lg"></i>
            Employee</a>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover nowrap w-100" id="datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Tempat Tanggal Lahir</th>
                            <th>Alamat</th>
                            <th>No. WA</th>
                            <th>Email</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1
                        @endphp
                        @foreach ($karyawans as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ 'foto' }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->tempat_lahir . ', ' . $item->tgl_lahir }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->no_wa }}</td>
                                <td>{{ $item->email }}</td>
                                <td>{{ $item->jabatan }}</td>
                                <td>
                                    <a href="{{ url('/karyawan/' . $item->id . '/edit') }}"
                                        class="btn btn-sm btn-warning d-inline-block" data-bs-toggle="tooltip"
                                        data-bs-placment="top" title="Detail"><i class="bi bi-pencil-square"></i></a>
                                    <form action="{{ url('/karyawan/' . $item->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin hapus data?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger d-inline-block"
                                            data-bs-toggle="tooltip" data-bs-placment="top" title="Hapus"><i
                                                class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++
                            @endphp
                        @endforeach
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

            });
        });
    </script>
@endsection
