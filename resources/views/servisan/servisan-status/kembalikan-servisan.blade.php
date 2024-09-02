@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Kembalikan Servisan</h1>
</div>

<section class="section">
    {{-- menampilkan seluruh servisan masuk --}}
    
    <div class="card p-3">
        <form action="{{ url('/proses-pengembalian') }}" method="POST">
            @csrf
            {{-- id servisan teknisi yang akan dikembalikan --}}
            <input type="hidden" name="servisan_teknisi_id" value="{{ $servisan_teknisi_id }}">
            <div class="mb-3">
                <label class="form-label" for="pengambil">Yang mengambil :</label>
                <input class="form-control @error('pengambil') is-invalid @enderror" type="text" name="pengambil"
                    id="pengambil" placeholder="..." value="{{ old('pengambil') }}" required>
                @error('pengambil')
                    <small class="invalid-feedback"> {{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="pemberi">Yang memberi :</label>
                <input class="form-control @error('pemberi') is-invalid @enderror" type="text" name="pemberi"
                    id="pemberi" placeholder="..." value="{{ old('pemberi') }}" required>
                @error('pemberi')
                    <small class="invalid-feedback"> {{ $message }} </small>
                @enderror
            </div>
            <div class="mb-3">
                <label class="form-label" for="catatan">Catatan :</label>
                <input class="form-control @error('catatan') is-invalid @enderror" type="text" name="catatan"
                    id="catatan" placeholder="..." value="{{ old('catatan') }}" required>
                @error('catatan')
                    <small class="invalid-feedback"> {{ $message }} </small>
                @enderror
            </div>

            <div class="my-3 d-flex justify-content-start">
                <button class="btn btn-sm btn-success shadow-sm me-2">Kembalikan <i class="bi bi-box-arrow-up-right"></i></button>
                <button onclick="history.back()" class="btn btn-sm btn-danger shadow-sm">Back</button>
            </div>
        </form>
        
    </div>
    
  
</section>

@endsection
