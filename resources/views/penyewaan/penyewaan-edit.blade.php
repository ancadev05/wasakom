@extends('template-dashboard.template-niceadmin')

@section('title')
    Buat Penyewaan
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Edit Penyewaan</h1>
    </div>

    <section class="section">


        <div class="card p-3">
            <form action="{{ url('penyewaan-update/' . $penyewaan->costumer_id . '/' . $penyewaan->tgl_mulai . '/' . $penyewaan->tgl_selesai) }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="costumer_id">costumer_id User:</label>
                            <select class="form-select @error('costumer_id') is-invalid @enderror" name="costumer_id" id="costumer_id">
                                <option value="" selected>---</option>
                                @foreach ($costumer as $item)
                                    <option value="{{ $item->id }}" {{ $penyewaan->costumer_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('costumer_id')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_mulai">tgl_mulai User:</label>
                            <input class="form-control @error('tgl_mulai') is-invalid @enderror" type="date" name="tgl_mulai"
                                id="tgl_mulai" placeholder="..." value="{{ $penyewaan->tgl_mulai }}">
                            @error('tgl_mulai')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_selesai">tgl_selesai User:</label>
                            <input class="form-control @error('tgl_selesai') is-invalid @enderror" type="date" name="tgl_selesai"
                                id="tgl_selesai" placeholder="..." value="{{ $penyewaan->tgl_selesai }}">
                            @error('tgl_selesai')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <span>Laptop yang disewa:</span>
                    <table class="table table-sm w-100" id="datatables">
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
                                    <td>#{{ $item->id }}</td>
                                    <td>{{ $item->laptopmerek->merek . '-' . $item->laptoptipe->tipe }}</td>
                                    <td>{{ $item->cpu . '/' . $item->ram . '/' . $item->storage }}</td>
                                    <td>
                                        <div class="form-check">
                                            <input class="" type="hidden" name="merek_tipe[]" id="merek_tipe" value="{{ $item->laptopmerek->merek . '-' . $item->laptoptipe->tipe }}">
                                            <input class="" type="hidden" name="spek[]" id="spek" value="{{ $item->cpu . '/' . $item->ram . '/' . $item->storage }} }}">
                                            <input class="" type="checkbox" name="laptop_id[]" id="laptop_id" value="{{ $item->id }}">
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end my-3">
                    <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm">Simpan</button>
                    <a href="{{ url('/penyewaan') }}" class="btn btn-sm btn-danger shadow-sm">Batal</a>
                </div>
            </form>

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