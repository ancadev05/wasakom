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
            <form action="{{ url('penyewaan-buat') }}" method="post">
                @csrf
                <div class="row mb-3">
                    <div class="col-sm-12 col-md-6">
                        <div class="mb-3">
                            <label class="form-label" for="costumer_id">costumer_id User:</label>
                            <select class="form-select @error('costumer_id') is-invalid @enderror" name="costumer_id" id="costumer_id">
                                <option value="" selected>---</option>
                                @foreach ($costumers as $item)
                                    <option value="{{ $item->id }}" {{ old('costumer_id') == $item->id ? 'selected' : '' }}>
                                        {{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('costumer_id')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    {{-- <div class="col-sm-12 col-md-5">
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
                    </div> --}}
                    <div class="col-sm-12 col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_mulai">tgl_mulai User:</label>
                            <input class="form-control @error('tgl_mulai') is-invalid @enderror" type="date" name="tgl_mulai"
                                id="tgl_mulai" placeholder="..." value="{{ old('tgl_mulai') }}">
                            @error('tgl_mulai')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-3">
                        <div class="mb-3">
                            <label class="form-label" for="tgl_selesai">tgl_selesai User:</label>
                            <input class="form-control @error('tgl_selesai') is-invalid @enderror" type="date" name="tgl_selesai"
                                id="tgl_selesai" placeholder="..." value="{{ old('tgl_selesai') }}">
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
                                            <input class="" type="checkbox" name="laptop_id[]" id="laptop_id" value="{{ $item->id }}">
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

@section('script')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                // responsive: true
            });
        });
    </script>
@endsection