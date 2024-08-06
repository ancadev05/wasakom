@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Ambil Servisan</h1>
</div>

<section class="section">

    <div class="card p-3">
        <form action="" method="post">
            @csrf
            <div class="table-responsive">
                <table class="table table-sm table-striped w-100">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Costumer</th>
                            <th>Merek-Tipe</th>
                            <th>Keluhan</th>
                            <th>Kelengkapan</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>{{ date('ymd') }}</td>
                            <td>hamzah</td>
                            <td>asus-rog</td>
                            <td>suka mati-mati</td>
                            <td>charger</td>
                            <td>segera dikerjakan</td>
                            <td>
                                <button class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
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
