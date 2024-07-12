@extends('template-dashboard.template-kaiadmin')

@section('title')
    Merek & Tipe Laptop
@endsection

@section('content')
    <div class="page-header">
        <h4 class="page-title">Merek & Tipe Laptop</h4>
    </div>

    {{-- continer content --}}
    <div class="page-category">
        {{-- tabel merek laptop --}}
        <div class="shadow bg-white rounded p-3 mb-3">
            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#laptop-merek">
                <i class="fas fa-plus fw-bold"></i> Merek
            </button>
            <table class="table table-sm">
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
                    @endphp
                    @foreach ($laptop_merek as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ strtoupper($item->merek) }}</td>
                            <td>
                                <form action="{{ url('merek/' . $item->id) }}" method="POST" class="d-inline"
                                    onclick="alerthapus()">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-xs btn-danger d-inline-block"
                                        data-bs-toggle="tooltip" data-bs-placment="top" data-bs-title="Hapus"><i
                                            class="far fa-trash-alt"></i></button>
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

        {{-- tabel tipe laptop --}}
        <div class="shadow bg-white rounded p-3 mb-3">
            {{-- <button class="btn btn-sm btn-primary">Tambah</button> --}}
            <!-- Button trigger modal -->
            <a href="{{ url('/tambah-tipe') }}" class="btn btn-sm btn-primary"><i class="fas fa-plus fw-bold"></i>
                Tambah</a>
            <table class="table table-sm">
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
                        $i = 1;
                    @endphp
                    @foreach ($laptop_tipe as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td><img src="{{ asset('storage/gambar-laptop/' .  $item->gambar_1) }}" alt="" height="100px"></td>
                            <td>{{ strtoupper($item->tipe) }}</td>
                            <td>{{ $item->laptopmerek->merek }}</td>
                            <td>
                                <a href="{{ url('tambah-tipe/' . $item->id) }}" class="btn btn-xs btn-secondary"
                                        data-bs-toggle="tooltip" data-bs-placment="top" data-bs-title="Detail"><i
                                            class="far fa-eye"></i></a>
                                    <form action="{{ url('laptop/' . $item->id) }}" method="POST" class="d-inline"
                                        onsubmit="confirm('Yakin ingin hapus data?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-xs btn-danger"
                                            data-bs-toggle="tooltip" data-bs-placment="top" data-bs-title="Hapus"><i
                                                class="far fa-trash-alt"></i></button>
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

    </div> {{-- /ccontainer content --}}

    {{-- modal tambah merek --}}
    <!-- Modal -->
    <div class="modal fade" id="laptop-merek" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/tambah-merek') }}" method="post">
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
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- /modal tambah tipe --}}
    {{-- /modal tambah merek --}}

    {{-- modal tambah tipe --}}


    <!-- Modal -->
    <div class="modal fade" id="laptop-tipe" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Tipe Laptop</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="merek" class="col-sm-3 col-form-label">Merek Laptop</label>
                            <div class="col-sm-9">
                                <select class="form-select">
                                    <option selected>---</option>
                                    @foreach ($laptop_merek as $item)
                                        <option value="{{ $item->id }}">{{ $item->merek }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tipe" class="col-sm-3 col-form-label">Tipe Laptop</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="tipe" name="tipe">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="layar_size">Layar Size</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('layar_size') is-invalid @enderror mb-2" type="text"
                                    name="layar_size" id="layar_size" value="{{ old('layar_size') }}"
                                    placeholder='example: 15,6"'>
                                @error('layar_size')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label class="col-sm-3 col-form-label" for="layar_resolusi">Resolusi Layar</label>
                            <div class="col-sm-9">
                                <input class="form-control @error('layar_resolusi') is-invalid @enderror" type="text"
                                    name="layar_resolusi" id="layar_resolusi" value="{{ old('layar_resolusi') }}"
                                    placeholder="example: FHD (1920x1080)">
                                @error('layar_resolusi')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                            </div>
                            <div class="mb-2">
                                <label for="gambar_1" class="form-label">Gambar 1</label>
                                <input class="form-control form-control-sm" id="gambar_1" name="gambar_1"
                                    type="file">
                            </div>
                            <div class="mb-2">
                                <label for="gambar_1" class="form-label">Gambar 1</label>
                                <input class="form-control form-control-sm" id="gambar_1" name="gambar_1"
                                    type="file">
                            </div>
                            <div class="mb-2">
                                <label for="gambar_1" class="form-label">Gambar 1</label>
                                <input class="form-control form-control-sm" id="gambar_1" name="gambar_1"
                                    type="file">
                            </div>
                            <div class="mb-2">
                                <label for="gambar_1" class="form-label">Gambar 1</label>
                                <input class="form-control form-control-sm" id="gambar_1" name="gambar_1"
                                    type="file">
                            </div>
                            <div class="mb-2">
                                <label for="gambar_1" class="form-label">Gambar 1</label>
                                <input class="form-control form-control-sm" id="gambar_1" name="gambar_1"
                                    type="file">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- /modal tambah tipe --}}
@endsection

{{-- script --}}
@section('script')
    <script>
        // aconfirm hapus merek

        // $("#alert_hapus_merjek").click(function (e) {
        //     alert('ok')
        // })
        function alerthapus() {
            swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                buttons: {
                    confirm: {
                        text: "Yes, delete it!",
                        className: "btn btn-success",
                    },
                    cancel: {
                        visible: true,
                        className: "btn btn-danger",
                    },
                },
            }).then((Delete) => {
                if (Delete) {
                    swal({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        type: "success",
                        timer: 2000,
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    });
                } else {
                    swal.close();
                }
            });
        }

        $("#alert_hapus_meredk").click(function(e) {
            swal({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                type: "warning",
                buttons: {
                    confirm: {
                        text: "Yes, delete it!",
                        className: "btn btn-success",
                    },
                    cancel: {
                        visible: true,
                        className: "btn btn-danger",
                    },
                },
            }).then((Delete) => {
                if (Delete) {
                    swal({
                        title: "Deleted!",
                        text: "Your file has been deleted.",
                        type: "success",
                        buttons: {
                            confirm: {
                                className: "btn btn-success",
                            },
                        },
                    });
                } else {
                    swal.close();
                }
            });
        });
    </script>
@endsection
