@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Daftar Servisan</h1>
</div>



<section class="section">
    {{-- menampilkan seluruh servisan masuk --}}
    <a href="{{ url('/servisan/create') }}" class="btn btn-sm btn-primary mb-3 shadow-sm"><i class="bi bi-plus-lg"></i> Servisan</a>

    <div class="card p-3">
        <div class="table-responsive">
            <table class="table table-sm table-striped nowrap w-100" id="datatables">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tgl. Masuk</th>
                        <th>No_Servisan</th>
                        <th>User</th>
                        <th>Merek/Tipe</th>
                        <th>Kelengkapan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($servisans as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ $item->tgl_masuk }}</td>
                            <td>{{ $item->no_servisan }}</td>
                            <td>{{ $item->costumer->nama }}</td>
                            <td>{{ $item->laptopmerek->merek . '-' . $item->tipe }}</td>
                            <td>{{ $item->kelengkapan }}</td>
                            <td>
                                @foreach ($servisan_teknisis as $teknisi)
                                    @if ($item->id == $teknisi->servisan_id)
                                        @if ($teknisi->status == 'Selesai')
                                            <b class="text-center text-success d-block"><i class="bi bi-check-circle-fill"></i></b>
                                        @elseif($teknisi->status == 'Proses')
                                            <div class="loader m-auto"></div>
                                        @elseif($teknisi->status == 'Oper Vendor')
                                            <div class="text-warning text-center fw-bold"><i class="bi bi-hourglass-split"></i></span>
                                        @else
                                            <i class="bi bi-x-circle-fill text-danger text-center d-block"></i>
                                        @endif
                                    @endif
                                @endforeach
                            </td>
                            <td>
                                {{-- <a href="#" class="btn btn-sm shadow-sm mb-1 btn-secondary" data-bs-toggle="tooltip" data-bs-placment="top" title="Lihat"><i class="bi bi-eye"></i></a> --}}
                                <a href="{{ url('/servisan/' . $item->id) . '/edit' }}" class="btn btn-sm shadow-sm mb-1 btn-warning" data-bs-toggle="tooltip" data-bs-placment="top" title="Edit"><i class="bi bi-pencil-square"></i></a>
                                <a href="{{ url('/servisan/' . $item->id) }}" class="btn btn-sm shadow-sm mb-1 btn-primary" data-bs-toggle="tooltip" data-bs-placment="top" title="Nota servisan"><i class="bi bi-printer"></i></a>

                                {{-- mononaktifkan tombol delete jika servisan sudah dikerjakan --}}
                                @if ($item->status_pengerjaan == 1)
                                    <a href="#" class="btn btn-sm shadow-sm mb-1 btn-danger d-none" data-bs-toggle="tooltip" data-bs-placment="top" title="Hapus"><i class="bi bi-trash"></i></a>
                                @else
                                    <form action="{{ url('servisan  /' . $item->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-sm shadow-sm mb-1 btn-danger delete-btn" data-bs-toggle="tooltip" data-bs-placment="top" title="Hapus"><i class="bi bi-trash"></i></button>
                                    </form>
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
