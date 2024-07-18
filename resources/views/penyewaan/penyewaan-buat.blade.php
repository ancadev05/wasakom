@extends('template-dashboard.template-niceadmin')

@section('title')
    Buat Penyewaan
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Buat Penyewaan</h1>
    </div>

    <section class="section">


        <div class="card p-3">
            <form action="" method="post">
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="nama">Nama User:</label>
                            <input class="form-control @error('nama') is-invalid @enderror" type="text" name="nama"
                                id="nama" placeholder="..." value="{{ old('nama') }}">
                            @error('nama')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="no_wa">no_wa User:</label>
                            <input class="form-control @error('no_wa') is-invalid @enderror" type="number" name="no_wa"
                                id="no_wa" placeholder="..." value="{{ old('no_wa') }}">
                            @error('no_wa')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-10">
                        <div class="mb-3">
                            <label class="form-label" for="no_wa">Alamat:</label>
                            <input class="form-control @error('no_wa') is-invalid @enderror" type="text" name="no_wa"
                                id="no_wa" placeholder="..." value="{{ old('no_wa') }}">
                            @error('no_wa')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_awal">tgl_awal User:</label>
                            <input class="form-control @error('tgl_awal') is-invalid @enderror" type="date" name="tgl_awal"
                                id="tgl_awal" placeholder="..." value="{{ old('tgl_awal') }}">
                            @error('tgl_awal')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-5">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_akhir">tgl_akhir User:</label>
                            <input class="form-control @error('tgl_akhir') is-invalid @enderror" type="date" name="tgl_akhir"
                                id="tgl_akhir" placeholder="..." value="{{ old('tgl_akhir') }}">
                            @error('tgl_akhir')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <span>Laptop yang disewa:</span>
                    <table class="table table-sm datatable">
                        <thead>
                            <tr>
                                <th>#id</th>
                                <th>Merek & Tipe</th>
                                <th>Spesifikasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($laptops as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->laptopmerek->merek . '-' . $item->laptoptipe->tipe }}</td>
                                    <td>{{ $item->cpu . '/' . $item->ram . '/' . $item->storage }}</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="gridCheck1" value="{{ $item->id }}">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end my-3">
                    <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm">Buat</button>
                    <a href="{{ url('/penyewaan') }}" class="btn btn-sm btn-danger shadow-sm">Batal</a>
                </div>
            </form>

        </div>
    </section>
@endsection
