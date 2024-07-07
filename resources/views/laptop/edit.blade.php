@extends('template-dashboard.template-kaiadmin')

@section('title')
    Edit Laptop
@endsection

@section('content')
    <h3 class="border-bottom pb-1 mb-3">Edit Laptop</h3>

    <div class="border shadow bg-white p-3">
        <form action="{{ url('laptop/' . $laptop->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Gambar lama --}}
            <input type="hidden" name="gambar_lama" value="{{ $laptop->gambar }}">

            <table class="table table-borderless table-responsive">

                <tr>
                    <td>
                        <label class="form-label" for="tanggal">Tanggal</label>
                        <input class="form-control @error('tanggal') is-invalid @enderror" type="date" name="tanggal"
                            id="tanggal" value="{{ $laptop->tanggal }}">
                        @error('tanggal')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </td>
                    <td>
                        <label class="form-label" for="status">Status Laptop</label>
                        @php
                            $status = $laptop->status;
                        @endphp
                        <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="1" {{ $status == 1 ? 'selected' : '' }}>Ready</option>
                            <option value="2" {{ $status == 2 ? 'selected' : '' }}>Display</option>
                            <option value="3" {{ $status == 3 ? 'selected' : '' }}>Dipenyewaan</option>
                        </select>
                        @error('status')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="form-label" for="sn">Serial Number</label>
                        <input class="form-control @error('sn') is-invalid @enderror" type="text" name="sn"
                            id="sn" value="{{ $laptop->sn }}">
                        @error('sn')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </td>
                    <td>
                        <label class="form-label" for="kondisi">Kondisi</label>
                        <i style="font-size: 12px">* Pastikan kondisi laptop dalam keadaan normal</i>
                        <select class="form-select @error('kondisi') is-invalid @enderror" name="kondisi" id="kondisi">
                            @php
                                $kondisi = $laptop->kondisi;
                            @endphp
                            <option value="" selected>---</option>
                            <option value="1" {{ $kondisi == 1 ? 'selected' : '' }}>Normal</option>
                            <option value="2" {{ $kondisi == 2 ? 'selected' : '' }}>Tidak Normal</option>
                            <option value="3" {{ $kondisi == 3 ? 'selected' : '' }}>Rusak</option>
                        </select>
                        @error('kondisi')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="form-label" for="merek">Merek</label>
                        @php
                            $merek = $laptop->merek;
                        @endphp
                        <select class="form-select @error('merek') is-invalid @enderror" name="merek" id="merek">
                            <option value="ASUS" {{ $merek == 'ASUS' ? 'selected' : '' }}>ASUS</option>
                            <option value="LENOVO" {{ $merek == 'LENOVO' ? 'selected' : '' }}>LENOVO</option>
                            <option value="ACER" {{ $merek == 'ACER' ? 'selected' : '' }}>ACER</option>
                            <option value="DELL" {{ $merek == 'DELL' ? 'selected' : '' }}>DELL</option>
                            <option value="HP" {{ $merek == 'HP' ? 'selected' : '' }}>HP</option>
                            <option value="TOSHIBA" {{ $merek == 'TOSHIBA' ? 'selected' : '' }}>TOSHIBA</option>
                            <option value="ADVAN" {{ $merek == 'ADVAN' ? 'selected' : '' }}>ADVAN</option>
                            <option value="AXIOO" {{ $merek == 'AXIOO' ? 'selected' : '' }}>AXIOO</option>
                            <option value="MSI" {{ $merek == 'MSI' ? 'selected' : '' }}>MSI</option>
                            <option value="APPLE" {{ $merek == 'APPLE' ? 'selected' : '' }}>APPLE</option>
                        </select>
                        @error('merek')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </td>
                    <td rowspan="5">
                        <label class="form-label" for="gambar">Gambar</label>
                        <input class="form-control @error('gambar') is-invalid @enderror" type="file" name="gambar"
                            id="gambar">
                        <i class="d-block" style="font-size: 12px">* Ukuran file maksimal 2MB</i>
                        @error('gambar')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                        <img src="{{ url('storage/gambar-laptop/' . $laptop->gambar) }}" alt="foto" class="mt-2"
                            id="img-view" width="330px">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="form-label" for="type">Type</label>
                        <input class="form-control @error('type') is-invalid @enderror" type="text" name="type"
                            id="type" value="{{ $laptop->type }}">
                        @error('type')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </td>
                </tr>
                <tr>
                    <td>
                        <label class="form-label" for="cpu">Processor</label>
                        <input class="form-control @error('cpu') is-invalid @enderror" type="text" name="cpu"
                            id="cpu" value="{{ $laptop->cpu }}">
                        @error('cpu')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </td>
                    <td>
                </tr>
                <tr>
                    <td>
                        <label class="form-label" for="ram">RAM</label>
                        <input class="form-control @error('ram') is-invalid @enderror" type="text" name="ram"
                            id="ram" placeholder="example: 8GB-DDR4" value="{{ $laptop->ram }}">
                        @error('ram')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </td>
                    <td>
                </tr>
                <tr>
                    <td>
                        <label class="form-label" for="storage">Storage</label>
                        <input class="form-control @error('storage') is-invalid @enderror" type="text" name="storage"
                            id="storage" placeholder="example: SSD-128GB" value="{{ $laptop->storage }}">
                        @error('storage')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </td>
                </tr>

            </table>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary me-1">Simpan</button>
                <a href="{{ url('/laptop') }}" class="btn btn-sm btn-danger">Batal</a>
            </div>

        </form>

    </div>
@endsection
