@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Tambah Servisan</h1>
</div>

<section class="section">

    <div class="card p-3">
        <form action="{{ url('servisan-teknisi/' . $servisan_teknisi->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row">
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label" for="tgl_masuk">Tanggal:</label>
                        <input class="form-control @error('tgl_masuk') is-invalid @enderror" type="date" name="tgl_masuk"
                            id="tgl_masuk" value="{{ $servisan_teknisi->servisan->tgl_masuk }}">
                        @error('tgl_masuk')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="costumer_id">Costumer:</label>
                        <select class="form-select @error('costumer_id') is-invalid @enderror select2" name="costumer_id" id="costumer_id">
                            @foreach ($costumers as $item)
                                <option value="{{ $item->id }}" {{ $servisan_teknisi->servisan->costumer_id == $item->id ? 'selected' : '' }}>{{ $item->nama }}</option>
                            @endforeach
                        </select>
                        @error('costumer_id')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="merek">Merek <span
                                class="text-danger fw-bold">*</span>:</label>
                        <select class="form-select @error('merek') is-invalid @enderror" name="merek" id="merek">
                            @foreach ($laptopmereks as $item)
                                <option value="{{ $item->id }}" {{ $servisan_teknisi->servisan->laptop_merek_id == $item->id ? 'selected' : '' }}>{{ $item->merek }}</option>
                            @endforeach
                        </select>
                        @error('merek')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tipe">Tipe:</label>
                        <input class="form-control @error('tipe') is-invalid @enderror" type="text" name="tipe"
                            id="tipe" placeholder="..." value="{{ $servisan_teknisi->servisan->tipe }}">
                        @error('tipe')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="keluhan">Keluhan:</label>
                        <textarea class="form-control @error('keluhan') is-invalid @enderror" type="text" name="keluhan"
                            id="keluhan" placeholder="..." rows="2">{{ $servisan_teknisi->servisan->keluhan }}</textarea>
                        @error('keluhan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6 col-12">
                    <div class="mb-3">
                        <label class="form-label" for="kerusakan">Kerusakan:</label>
                        <textarea class="form-control @error('kerusakan') is-invalid @enderror" type="text" name="kerusakan"
                            id="kerusakan" placeholder="..." rows="2" required>{{ $servisan_teknisi->kerusakan }}</textarea>
                        @error('kerusakan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="jenis_kerusakan">Jenis Kerusakan <span
                                class="text-danger fw-bold">*</span></label>
                                @php
                                    $jenis_kerusakan = $servisan_teknisi->jenis_kerusakan;
                                @endphp
                        <div class="d-flex">
                            <div class="form-check me-3">
                                <input class="form-check-input @error('jenis_kerusakan') is-invalid @enderror"
                                    type="radio" name="jenis_kerusakan" id="jenis_kerusakan1" value="Ringan"
                                    {{ $jenis_kerusakan == 'Ringan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="jenis_kerusakan1">Ringan</label>
                            </div>
                            <div class="form-check me-3">
                                <input class="form-check-input @error('jenis_kerusakan') is-invalid @enderror"
                                    type="radio" name="jenis_kerusakan" id="jenis_kerusakan2" value="Sedang"
                                    {{ $jenis_kerusakan == 'Sedang' ? 'checked' : '' }}>
                                <label class="form-check-label" for="jenis_kerusakan2">Sedang</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input @error('jenis_kerusakan') is-invalid @enderror"
                                    type="radio" name="jenis_kerusakan" id="jenis_kerusakan3" value="Berat"
                                    {{ $jenis_kerusakan == 'Berat' ? 'checked' : '' }}>
                                <label class="form-check-label" for="jenis_kerusakan3">Berat</label>
                            </div>
                            @error('jenis_kerusakan')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="estimasi">Estimasi Pengerjaan:</label>
                        <input class="form-control @error('estimasi') is-invalid @enderror" type="date" name="estimasi"
                            id="estimasi" value="{{ $servisan_teknisi->estimasi }}">
                        @error('estimasi')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="tgl_selesai">Tanggal Selesai:</label>
                        <input class="form-control @error('tgl_selesai') is-invalid @enderror" type="date" name="tgl_selesai"
                            id="tgl_selesai" value="{{ $servisan_teknisi->tgl_selesai }}" required>
                        @error('tgl_selesai')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="ket">Keterangan:</label>
                        <textarea class="form-control @error('ket') is-invalid @enderror" type="text" name="ket"
                            id="ket" placeholder="..." rows="2" required>{{ $servisan_teknisi->ket }}</textarea>
                        @error('ket')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="status">Status <span
                                class="text-danger fw-bold">*</span>:</label>
                        <select class="form-select @error('status') is-invalid @enderror" name="status" id="status" required>
                            @php
                                $status = $servisan_teknisi->status;
                            @endphp
                            <option value="Selesai" {{ $status == 'Selesai' ? 'selected' : '' }}>Selesai</option>
                            <option value="Proses" {{ $status == 'Proses' ? 'selected' : '' }}>Proses</option>
                            <option value="Oper Vendor" {{ $status == 'Oper Vendor' ? 'selected' : '' }}>Oper Vendor</option>
                            <option value="Cancel" {{ $status == 'Cancel' ? 'selected' : '' }}>Cancel</option>
                        </select>
                        @error('status')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="catatan">Catatan:</label>
                        <textarea class="form-control @error('catatan') is-invalid @enderror" type="text" name="catatan"
                            id="catatan" placeholder="..." rows="2">{{ $servisan_teknisi->catatan }}</textarea>
                        @error('catatan')
                            <small class="invalid-feedback"> {{ $message }} </small>
                        @enderror
                    </div>
                    
                </div>
            </div>

            <div class="d-flex justify-content-center my-3">
                <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm">Simpan</button>
                <a href="{{ url('/servisan-teknisi') }}" class="btn btn-sm btn-danger shadow-sm">Batal</a>
            </div>
        </form>
    </div>
    
  
</section>



    
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
