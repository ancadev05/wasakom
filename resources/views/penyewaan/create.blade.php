@extends('template-dashboard.tampilan-default')

@section('title')
    Penyewaan Laptop
@endsection

@section('content')
    <h3 class="border-bottom pb-1 mb-3">Daftar Laptop</h3>

    <div class="shadow bg-white p-3">

        <div class="table-responsive">
            <table class="table table-borderless">
                <tr>
                    <td width="20%"><label for="pemberi_sewa" class="form-label">Pemberi Sewa</label></td>
                    <td><input type="text" name="pemberi_sewa" id="pemberi_sewa" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="alamat" class="form-label">Alamat</label></td>
                    <td><input type="text" name="alamat" id="alamat" class="form-control"></td>
                </tr>
                <tr>
                    <td><label for="hp" class="form-label">No. Hp</label></td>
                    <td><input type="text" name="hp" id="hp" class="form-control"></td>
                </tr>
            </table>
        </div>

        <div class="row">
                <label for="k" class="form-label col-2">k</label>
                <input type="text" name="k" id="k" class="form-control col-10">
        </div>
    </div>
@endsection
