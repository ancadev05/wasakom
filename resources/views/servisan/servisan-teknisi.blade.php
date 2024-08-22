@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Daftar Servisan Teknisi</h1>
</div>



<section class="section">
    {{-- manampilkan daftar servisan yang selesai dan sementara dikerjakan oleh teknisi --}}

    {{-- menu yang hanya teknisi bisa akses --}}
    @if (Auth::user()->level_akun_id == 6)
        <a href="{{ url('/servisan-teknisi/create') }}" class="btn btn-sm btn-primary mb-3 shadow-sm"><i class="bi bi-plus-lg"></i> Ambil Servisan</a>
    @endif

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-sm table-striped nowrap w-100" id="datatables">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>No_Servisan</th>
                        <th>User</th>
                        <th>Merek</th>
                        <th>Keluhan</th>
                        <th>Teknisi</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($servisan_teknisis as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->servisan->no_servisan }}</td>
                            <td>{{ $item->servisan->costumer->nama }}</td>
                            <td>{{ $item->servisan->tipe }}</td>
                            <td>{{ $item->servisan->keluhan }}</td>
                            <td>{{ $item->user->karyawan->nama }}</td>
                            <td>{{ $item->status }}
                                @if ($item->status == 'Selesai')
                                    <b class="text-center text-success d-block" data-bs-toggle="tooltip" data-bs-placment="top" title="Selesai"><i class="bi bi-check-circle-fill"></i></b>
                                @elseif($item->status == 'Proses')
                                    <div class="loader m-auto" data-bs-toggle="tooltip" data-bs-placment="top" title="Proses"></div>
                                @elseif($item->status == 'Oper Vendor')
                                    <div class="text-warning text-center fw-bold" data-bs-toggle="tooltip" data-bs-placment="top" title="Oper Vendor"><i class="bi bi-hourglass-split"></i></span>
                                @else
                                    <i class="bi bi-x-circle-fill text-danger text-center d-block" data-bs-toggle="tooltip" data-bs-placment="top" title="Cancel"></i>
                                @endif
                            </td>
                            {{-- aksi yang hanay boleh dilakukan oleh jabatan teknisi --}}
                            <td>
                                <a href="{{ url('/servisan-teknisi/' . $item->id) }}" class="btn btn-sm shadow-sm btn-secondary" data-bs-toggle="tooltip" data-bs-placment="top" title="Lihat"><i class="bi bi-eye"></i></a>
                                @if (Auth::user()->level_akun_id == 6)
                                    {{-- menampilkan tombol delete servisan sesuai user id --}}
                                    @if (Auth::user()->id == $item->user_id)
                                        <a href="{{ url('/servisan-teknisi/' . $item->id . '/edit') }}" class="btn btn-sm shadow-sm btn-warning" data-bs-toggle="tooltip" data-bs-placment="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                        {{-- menyembunyikan tombol delete jika servisan sudah selesai --}}
                                        @if ($item->status == 'Selesai')
                                            <form action="{{ url('servisan-teknisi/' . $item->id) }}" method="post" class="d-inline-block d-none">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger shadow-sm delete-btn" data-bs-toggle="tooltip" data-bs-placment="top" title="Batal"><i class="bi bi-x-lg"></i></button>
                                            </form>
                                        @else
                                            <form action="{{ url('servisan-teknisi/' . $item->id) }}" method="post" class="d-inline-block">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-sm btn-danger shadow-sm delete-btn" data-bs-toggle="tooltip" data-bs-placment="top" title="Batal"><i class="bi bi-x-lg"></i></button>
                                            </form>
                                        @endif
                                    @endif
                                @endif  
                            </td>
                        </tr>
                        @php
                            $i++
                        @endphp
                    @endforeach
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
