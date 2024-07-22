@extends('template-dashboard.template-niceadmin')

@section('title')
    Tambah Laptop
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Tambah Laptop</h1>
    </div><!-- End Page Title -->
    <section class="section">

        <div class="card p-3">
            <form action="{{ url('laptop') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <p><u><span class="text-danger fw-bold">*</span><i> wajib diisi</u></i></p>
                    <div class="col-sm-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label" for="tgl">Tanggal <span
                                    class="text-danger fw-bold">*</span></label>
                            <input class="form-control @error('tgl') is-invalid @enderror" type="date" name="tgl"
                                id="tgl" value="{{ old('tgl') }}">
                            @error('tgl')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="sn">Serial Number <span
                                    class="text-danger fw-bold">*</span></label>
                            <input class="form-control @error('sn') is-invalid @enderror" type="text" name="sn"
                                id="sn" value="{{ old('sn') }}">
                            @error('sn')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kode_barang">Kode Barang</label>
                            <input class="form-control @error('kode_barang') is-invalid @enderror" type="text"
                                name="kode_barang" id="kode_barang" value="{{ old('kode_barang') }}">
                            @error('kode_barang')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="merek">Merek <span
                                    class="text-danger fw-bold">*</span></label>
                            <select class="form-select @error('merek') is-invalid @enderror" name="merek" id="merek">
                                <option value="" selected>---</option>
                                @foreach ($laptop_merek as $item)
                                    <option value="{{ $item->id }}" {{ old('merek') == $item->id ? 'selected' : '' }}>
                                        {{ $item->merek }}</option>
                                @endforeach
                            </select>
                            @error('merek')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            {{-- <label class="form-label" for="tipe">Tipe <span class="text-danger fw-bold">*</span></label>
                        <select class="form-select @error('tipe') is-invalid @enderror" name="tipe" id="tipe">
                            <option value="" selected>---</option>
                            @foreach ($laptop_tipe as $item)
                                <option value="{{ $item->id }}" {{ old('tipe') == $item->id ? 'selected' : '' }}>
                                    {{ $item->tipe }}</option>
                            @endforeach
                        </select>
                        @error('tipe')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror --}}
                            <label class="form-label" for="tipe">Tipe <span class="text-danger fw-bold">*</span></label>

                            <span class="text-secondary" id="loading" style="display: none;">
                                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                Loading...
                            </span>

                            <small class="d-block text-secondary" style="font-size: 12px"></small>
                            <i class="d-block" style="font-size: 12px">* Jika tipe tidak muncul, tambahkan di menu Merek & Tipe</i>

                            <select class="form-select @error('tipe') is-invalid @enderror" name="tipe" id="tipe">
                                <option value="" selected>---</option>
                                {{-- @foreach ($laptop_tipe as $item) --}}
                                <option value="" {{ old('tipe') }}></option>
                                {{-- @endforeach --}}
                            </select>
                            @error('tipe')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror

                            {{-- <select id="tipe" name="tipe_id">
                            <option value="">...</option>
                        </select> --}}
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="cpu">Processor <span
                                    class="text-danger fw-bold">*</span></label>
                            <input class="form-control @error('cpu') is-invalid @enderror" type="text" name="cpu"
                                id="cpu" placeholder="example: Intel Core i5-11340U" value="{{ old('cpu') }}">
                            @error('cpu')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="gpu">GPU <span class="text-danger fw-bold">*</span></label>
                            <input class="form-control @error('gpu') is-invalid @enderror" type="text" name="gpu"
                                id="gpu" placeholder="example: Invidia RTX 4300" value="{{ old('gpu') }}">
                            @error('gpu')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="ram">RAM <span class="text-danger fw-bold">*</span></label>
                            <input class="form-control @error('ram') is-invalid @enderror" type="text" name="ram"
                                id="ram" placeholder="example: 8GB-DDR4" value="{{ old('ram') }}">
                            @error('ram')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="storage">Storage <span
                                    class="text-danger fw-bold">*</span></label>
                            <input class="form-control @error('storage') is-invalid @enderror" type="text"
                                name="storage" id="storage" placeholder="example: SSD-128GB"
                                value="{{ old('storage') }}">
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
                                        {{ old('checked') }}>
                                    <label class="form-check-label" for="interfaces_storage1">SATA</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input @error('interfaces_storage') is-invalid @enderror"
                                        type="radio" name="interfaces_storage" id="interfaces_storage2" value="2"
                                        {{ old('checked') }}>
                                    <label class="form-check-label" for="interfaces_storage2">NVME</label>
                                </div>
                                @error('interfaces_storage')
                                    <small class="invalid-feedback"> {{ $message }} </small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <div class="mb-3">
                            <label class="form-label" for="os">System Operasi:</label>
                            <input class="form-control @error('os') is-invalid @enderror" type="text" name="os"
                                id="os" placeholder="..." value="{{ old('os') }}">
                            @error('os')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="status">Status Laptop <span
                                    class="text-danger fw-bold">*</span></label>
                            <select class="form-select @error('status') is-invalid @enderror" name="status"
                                id="status">
                                <option value="" selected>...</option>
                                @foreach ($laptop_status as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('status') == $item->id ? 'selected' : '' }}>
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
                                        {{ old('kondisi') == $item->id ? 'selected' : '' }}>
                                        {{ $item->kondisi }}</option>
                                @endforeach
                            </select>
                            @error('kondisi')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="kelengkapan">Kelengkapan</label>
                            <textarea class="form-control @error('kelengkapan') is-invalid @enderror" type="text" name="kelengkapan"
                                id="kelengkapan" placeholder="masukkan kelengkapan tambahan" rows="3">{{ old('kelengkapan') }}</textarea>
                            @error('kelengkapan')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <textarea class="form-control @error('keterangan') is-invalid @enderror" type="text" name="keterangan"
                                id="keterangan" placeholder="masukkan keterangan tambahan" rows="5">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-sm btn-primary me-1 shadow-sm">Tambah</button>
                        <a href="{{ url('/laptop') }}" class="btn btn-sm btn-danger shadow-sm">Batal</a>
                    </div>
                </div>
            </form>

        </div>
    </section>
@endsection

@section('script')
    <script>
        document.getElementById('merek').addEventListener('change', function() {
            let merekId = this.value;
            let tipeSelect = document.getElementById('tipe');
            tipeSelect.innerHTML = '<option value="">---</option>'; // Reset options

            let loading = document.getElementById('loading');

            if (merekId) {

                loading.style.display = 'inline-block'; // Show loading

                fetch(`/tipe-laptops?merek=${merekId}`)
                    .then(response => response.json())
                    .then(data => {

                        loading.style.display = 'none'; // Hide loading

                        if (data.tipeLaptops && Array.isArray(data.tipeLaptops)) {
                            // Update tipe laptop options
                            data.tipeLaptops.forEach(tipe => {
                                let option = document.createElement('option');
                                option.value = tipe.id;
                                option.textContent = tipe.tipe;
                                tipeSelect.appendChild(option);
                            });
                        } else {
                            console.error('Invalid response format:', data);
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching data:', error);
                    });
            }
        });
    </script>
@endsection
