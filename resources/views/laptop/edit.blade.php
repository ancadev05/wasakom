@extends('template-dashboard.template-kaiadmin')

@section('title')
    Edit Laptop
@endsection

@section('content')
    <div class="border rounded shadow bg-white p-3">
        <form action="{{ url('laptop/'.$laptop->id) }}" method="POST">
            @csrf
            @method('put')

            <div class="row">
                <p><u><span class="text-danger fw-bold">*</span><i> wajib diisi</u></i></p>
                <div class="col-5">
                    <div class="mb-3">
                        <label class="form-label" for="tgl">Tanggal <span class="text-danger fw-bold">*</span></label>
                        <input class="form-control @error('tgl') is-invalid @enderror" type="date" name="tgl"
                            id="tgl" value="{{ $laptop->tgl }}">
                        @error('tgl')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="sn">Serial Number <span
                                class="text-danger fw-bold">*</span></label>
                        <input class="form-control @error('sn') is-invalid @enderror" type="text" name="sn"
                            id="sn" value="{{ $laptop->sn }}">
                        @error('sn')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="kode_barang">Kode Barang</label>
                        <input class="form-control @error('kode_barang') is-invalid @enderror" type="text"
                            name="kode_barang" id="kode_barang" value="{{ $laptop->kode_barang }}">
                        @error('kode_barang')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="merek">Merek <span class="text-danger fw-bold">*</span></label>
                        <select class="form-select @error('merek') is-invalid @enderror" name="merek" id="merek">
                            <option value="" selected>---</option>
                            @foreach ($laptop_merek as $item)
                                <option value="{{ $item->id }}"
                                    {{ $laptop->laptop_merek_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->merek }}</option>
                            @endforeach
                        </select>
                        @error('merek')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tipe">Tipe <span class="text-danger fw-bold">*</span></label>
                        <select class="form-select @error('tipe') is-invalid @enderror" name="tipe" id="tipe">
                            <option value="" selected>---</option>
                            @foreach ($laptop_tipe as $item)
                                <option value="{{ $item->id }}"
                                    {{ $laptop->laptop_tipe_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->tipe }}</option>
                            @endforeach
                        </select>
                        @error('tipe')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="cpu">Processor <span
                                class="text-danger fw-bold">*</span></label>
                        <input class="form-control @error('cpu') is-invalid @enderror" type="text" name="cpu"
                            id="cpu" placeholder="example: Intel Core i5-11340U" value="{{ $laptop->cpu }}">
                        @error('cpu')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="gpu">GPU <span class="text-danger fw-bold">*</span></label>
                        <input class="form-control @error('gpu') is-invalid @enderror" type="text" name="gpu"
                            id="gpu" placeholder="example: Invidia RTX 4300" value="{{ $laptop->gpu }}">
                        @error('gpu')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ram">RAM <span class="text-danger fw-bold">*</span></label>
                        <input class="form-control @error('ram') is-invalid @enderror" type="text" name="ram"
                            id="ram" placeholder="example: 8GB-DDR4" value="{{ $laptop->ram }}">
                        @error('ram')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="storage">Storage <span class="text-danger fw-bold">*</span></label>
                        <input class="form-control @error('storage') is-invalid @enderror" type="text" name="storage"
                            id="storage" placeholder="example: SSD-128GB" value="{{ $laptop->storage }}">
                        @error('storage')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="interfaces_storage">Interfaces Storage <span
                                class="text-danger fw-bold">*</span></label>
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input @error('interfaces_storage') is-invalid @enderror"
                                    type="radio" name="interfaces_storage" id="interfaces_storage1" value="1"
                                    {{ $laptop->interfaces_storage == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="interfaces_storage1">SATA</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('interfaces_storage') is-invalid @enderror"
                                    type="radio" name="interfaces_storage" id="interfaces_storage2" value="2"
                                    {{ $laptop->interfaces_storage == 2 ? 'checked' : '' }}>
                                <label class="form-check-label" for="interfaces_storage2">NVME</label>
                            </div>
                            @error('interfaces_storage')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="col-5">
                    <div class="mb-3">
                        <label class="form-label" for="tanggal">Layar</label>
                        <input class="form-control @error('layar_size') is-invalid @enderror mb-2" type="text"
                            name="size" id="size" value="{{ $laptop->laptoptipe->layar_size }}"
                            placeholder='example: 15,6"' disabled>
                        @error('size')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                        <input class="form-control @error('layar_resolusi') is-invalid @enderror" type="text"
                            name="resolusi" id="resolusi" value="{{ $laptop->laptoptipe->layar_resolusi }}"
                            placeholder="example: FHD (1920x1080)" disabled>
                        @error('resolusi')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="status">Status Laptop <span
                                class="text-danger fw-bold">*</span></label>
                        <select class="form-select @error('status') is-invalid @enderror" name="status" id="status">
                            <option value="" selected>---</option>
                            @foreach ($laptop_status as $item)
                                <option value="{{ $item->id }}"
                                    {{ $laptop->laptop_status_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->status }}</option>
                            @endforeach
                        </select>
                        @error('status')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="kondisi">Kondisi <span
                                class="text-danger fw-bold">*</span></label>
                        <i style="font-size: 12px">* Pastikan kondisi laptop dalam keadaan normal</i>
                        <select class="form-select @error('kondisi') is-invalid @enderror" name="kondisi"
                            id="kondisi">
                            <option value="" selected>---</option>
                            @foreach ($laptop_kondisi as $item)
                                <option value="{{ $item->id }}"
                                    {{ $laptop->laptop_kondisi_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->kondisi }}</option>
                            @endforeach
                        </select>
                        @error('kondisi')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="kelengkapan">kelengkapan</label>
                        <textarea class="form-control @error('kelengkapan') is-invalid @enderror" type="text" name="kelengkapan"
                            id="kelengkapan" placeholder="masukkan kelengkapan tambahan" rows="3">{{ $laptop->kelengkapan }}</textarea>
                        @error('kelengkapan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="keterangan">Keterangan</label>
                        <textarea class="form-control @error('keterangan') is-invalid @enderror" type="text" name="keterangan"
                            id="keterangan" placeholder="masukkan keterangan tambahan" rows="5">{{ $laptop->keterangan }}</textarea>
                        @error('keterangan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar Produk</label>
                        <div>
                            <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_1) }}"
                                alt="Image Preview" style="width: 150px; height: auto;" class="mt-2">
                            <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_2) }}"
                                alt="Image Preview" style="width: 150px; height: auto;" class="mt-2">
                            <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_3) }}"
                                alt="Image Preview" style="width: 150px; height: auto;" class="mt-2">
                            <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_4) }}"
                                alt="Image Preview" style="width: 150px; height: auto;" class="mt-2">
                            <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_5) }}"
                                alt="Image Preview" style="width: 150px; height: auto;" class="mt-2">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-sm btn-primary me-1">Simpan</button>
                <a href="{{ url('/laptop') }}" class="btn btn-sm btn-danger">Batal</a>
            </div>

        </form>

    </div>
@endsection
