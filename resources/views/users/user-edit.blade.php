@extends('template-dashboard.template-niceadmin')

@section('title')
    Buat User
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Edit User</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-sm-12 col-md-6">
                <div class="card p-3">
                    <form action="{{ url('/user-edit/' . $user->id) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="karyawan_id">Nama <span
                                    class="text-danger fw-bold">*</span></label>
                                    <select class="form-select @error('karyawan_id') is-invalid @enderror" name="karyawan_id" id="karyawan_id">
                                        @foreach ($karyawans as $item)
                                            <option value="{{ $item->id }}" {{ $user->karyawan_id == $item->id ? 'selected' : '' }}>
                                                {{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                    @error('karyawan_id')
                                        <small class="invalid-feedback"> {{ $message }} </small>
                                    @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="username">Username <span
                                    class="text-danger fw-bold">*</span></label>
                            <input class="form-control @error('username') is-invalid @enderror" type="text" name="username"
                                id="username" value="{{ $user->username }}">
                            @error('username')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password <span
                                    class="text-danger fw-bold">*</span></label>
                            <input class="form-control @error('password') is-invalid @enderror" type="text" name="password"
                                id="password" value="{{ $user->sandi }}">
                            @error('password')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="level_akun_id">Level <span
                                    class="text-danger fw-bold">*</span></label>
                            <select class="form-select @error('level_akun_id') is-invalid @enderror" name="level_akun_id" id="level_akun_id">
                                @foreach ($level_akun as $item)
                                    <option value="{{ $item->id }}" {{ $user->level_akun_id == $item->id ? 'selected' : '' }}>
                                        {{ $item->level }}</option>
                                @endforeach
                            </select>
                            @error('level_akun_id')
                                <small class="invalid-feedback"> {{ $message }} </small>
                            @enderror
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-sm btn-primary me-2 shadow-sm">Simpan</button>
                            <a href="{{ url('/user') }}" type="submit" class="btn btn-sm btn-danger me-2 shadow-sm">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
