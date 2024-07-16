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
        <button type="button" class="btn btn-sm btn-primary mb-3" data-toggle="modal" data-target="#laptop-merek">
            <i class="bi bi-plus-lg"></i> Merek</button>

        <div class="shadow bg-white rounded p-3 mb-3">
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
                                    <button type="submit" class="btn btn-sm btn-danger d-inline-block"
                                        data-toggle="tooltip" data-placment="top" title="Hapus"><i
                                            class="bi bi-trash"></i></button>
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
        <a href="{{ url('/tambah-tipe') }}" class="btn btn-sm btn-primary my-3"><i class="bi bi-plus-lg"></i>
            Tipe</a>
        <div class="shadow bg-white rounded p-3 mb-3">
            <div class="table-responsive">
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
                                <td><img src="{{ asset('storage/gambar-laptop/' . $item->gambar_1) }}" alt=""
                                        width="100px"></td>
                                <td>{{ strtoupper($item->tipe) }}</td>
                                <td>{{ $item->laptopmerek->merek }}</td>
                                <td>
                                    <a href="{{ url('tambah-tipe/' . $item->id) }}" class="btn btn-sm btn-secondary"
                                        data-toggle="tooltip" data-placment="top" title="Detail"><i
                                            class="bi bi-eye"></i></a>
                                    <form action="{{ url('/delete-tipe/' . $item->id) }}" method="POST" class="d-inline"
                                        onsubmit="return confirm('Yakin ingin hapus data? Tipe laptop tidak bisa dihapus jika tipe yang bersangkutan masi ada dalam daftar laptop')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm btn-danger" data-toggle="tooltip"
                                            data-placment="top" title="Hapus"><i class="bi bi-trash"></i></button>
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
        </div>
    </section>


    {{-- modal tambah merek --}}
    <!-- Modal -->
    <div class="modal fade" id="laptop-merek" data-backdrop="static" data-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/tambah-merek') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Merek Laptop</h1>
                        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="merek" class="col-sm-3 col-form-label">Merek Laptop</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="merek" name="merek">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    {{-- /modal tambah merek --}}
@endsection

{{-- script --}}
@section('script')
    <script>
        const myModal = document.getElementById('laptop-merek')
        const myInput = document.getElementById('myInput')

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus()
        })
    </script>
@endsection
