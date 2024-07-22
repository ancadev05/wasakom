@extends('template-dashboard.template-niceadmin')

@section('title')
    User
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Daftar Akun</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <a href="{{ url('user-create') }}" class="btn btn-sm btn-primary mb-3 shadow-sm"><i class="bi bi-plus-lg"></i> User</a>
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover table-bordered datatable" id="tbl">
                    <thead class="bg-secondary text-bg-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Level</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($users as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->username }}</td>
                                <td>{{ $item->sandi }}</td>
                                <td>{{ $item->level_akun_id . '-' . $item->levelakun->level }}</td>

                                <td>
                                    <a href="#" class="btn btn-sm btn-secondary d-inline-block"
                                        data-bs-toggle="tooltip" data-bs-placment="top" title="Detail"><i
                                            class="bi bi-eye"></i></a>
                                    <form action="{{ url('/user-delete/' . $item->id) }}" method="POST" class="d-inline"
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
