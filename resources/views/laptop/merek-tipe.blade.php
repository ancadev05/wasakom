@extends('template-dashboard.template-niceadmin')

@section('title')
    Merek & Tipe Laptop
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Merek & Tipe Laptop</h1>
    </div>

    <section class="section">
        {{-- tabel merek laptop --}}
        <button type="button" class="btn btn-sm btn-primary mb-3 shadow-sm" data-bs-toggle="modal"
            data-bs-target="#laptop-merek">
            <i class="bi bi-plus-lg"></i> Merek</button>

        <div class="card p-3 mb-3">
            <table class="table table-sm" id="datatables">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Merek Laptop</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                        // $i = $laptop_merek->firstItem();
                    @endphp
                    @foreach ($laptop_merek as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->merek }}</td>
                            <td>
                                <a href="{{ url('merek/' . $item->id) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip"
                                    data-bs-placment="top" title="Edit">
                                    <i class="bi bi-pencil-square"></i></a>
                                <form action="{{ url('merek/' . $item->id) }}" method="POST" class="d-inline"
                                    onclick="return confirm('Hapus Merek ?')">
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
                    @endforeach
                </tbody>
            </table>
            {{-- Agar paginasi berfungsi dengan baik saat melakukan pencarian --}}
            {{-- {{ $laptop_merek->withQueryString()->links() }} --}}
        </div>

        {{-- tabel tipe laptop --}}
        <a href="{{ url('/tambah-tipe') }}" class="btn btn-sm btn-primary my-3 shadow-sm"><i class="bi bi-plus-lg"></i>
            Tipe</a>
        <div class="card p-3 mb-3">
            <div class="table-responsive">
                <table class="table table-sm" id="datatables2">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Tipe Laptop</th>
                            <th>Merek Laptop</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        //    $i = $laptop_tipe->firstItem();
                        $i=1;
                        @endphp
                        @foreach ($laptop_tipe as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td><img src="{{ asset('storage/gambar-laptop/' . $item->gambar_1) }}" alt=""
                                        width="100px"></td>
                                <td>{{ $item->tipe }}</td>
                                <td>{{ $item->laptopmerek->merek }}</td>
                                <td>
                                    <a href="{{ url('tambah-tipe/' . $item->id) }}" class="btn btn-sm btn-secondary"
                                        data-bs-toggle="tooltip" data-bs-placment="top" title="Detail"><i
                                            class="bi bi-eye"></i></a>
                                    <form action="{{ url('/delete-tipe/' . $item->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin hapus data? Tipe laptop tidak bisa dihapus jika tipe yang bersangkutan masi ada dalam daftar laptop')">
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
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{-- {{ $laptop_tipe->withQueryString()->paginate() }} --}}
        </div>
    </section>


    {{-- modal tambah merek --}}
    <!-- Modal -->
    <div class="modal fade" id="laptop-merek" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/tambah-merek') }}" method="post" id="form-2">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Merek Laptop</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="merek" class="col-sm-3 col-form-label">Merek Laptop</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="merek" name="merek">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- /modal tambah merek --}}

    {{-- merek edit --}}
    <div class="modal fade" id="edit-merek" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Merek</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="merek" class="col-sm-3 col-form-label">Merek Laptop</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="merek-2" name="merek">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-sm btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-sm btn-primary" id="update-merek">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable();
            $('#datatables2').DataTable();
        });
    </script>
@endsection
