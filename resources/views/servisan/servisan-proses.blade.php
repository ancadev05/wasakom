@extends('template-dashboard.tampilan-default')

@section('title')
    Servisan
@endsection

@section('content')
    <h3 class="border-bottom pb-1 mb-3">developer sementara ngopi</h3>

    <button type="button" class="btn btn-primary" onclick="klik()">Tombol</button>
    <button type="button" class="btn btn-primary" onclick="berhasil()">Berhasil</button>
    <button type="button" class="btn btn-danger" onclick="hapus()">Hapus</button>
  

  <table class="table table-sm">
    <thead>
        <tr>
            <th>Tgl. Masuk</th>
            <th>User</th>
            <th>Merek</th>
            <th>Keluhan</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>27/03/2024</td>
            <td>user</td>
            <td>asus</td>
            <td>mati ayam</td>
            <td>Oper vendor</td>
            <td>
                <a href="#" class="btn btn-sm btn-secondary"><i class="bi bi-eye"></i></a>
                <a href="#" class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>
                <a href="#" class="btn btn-sm btn-primary"><i class="bi bi-printer"></i></a>
                <a href="#" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
            </td>
        </tr>
    </tbody>
  </table>

    
@endsection
