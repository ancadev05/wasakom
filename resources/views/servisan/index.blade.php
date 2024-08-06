@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Daftar Servisan Teknisi</h1>
</div>



<section class="section">

    <a href="{{ url('/servisan/create') }}" class="btn btn-sm btn-primary mb-3 shadow-sm"><i class="bi bi-plus-lg"></i> Servisan</a>

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-sm w-100" id="datatables">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tgl. Masuk</th>
                        <th>User</th>
                        <th>Merek/Tipe</th>
                        <th>Keluhan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>27/03/2024</td>
                        <td>user</td>
                        <td>asus/vivobook</td>
                        <td>mati ayam</td>
                        <td>Oper vendor</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-secondary" data-bs-toggle="tooltip" data-bs-placment="top" title="Hapus"><i class="bi bi-eye"></i></a>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" data-bs-placment="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
                            <a href="{{ url('/servisan-nota') }}" class="btn btn-sm btn-primary" data-bs-toggle="tooltip" data-bs-placment="top" title="Cetak"><i class="bi bi-printer"></i></a>
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="tooltip" data-bs-placment="top" title="Hapus"><i class="bi bi-trash"></i></a>
                        </td>
                    </tr>
                </tbody>
              </table>
        </div>
    </div>
    
  
</section>

@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('#datatables').DataTable({
                
            });
        });
    </script>
@endsection
