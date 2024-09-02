@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
<div class="pagetitle">
    <h1>Daftar Servisan Proses</h1>
</div>

<div class="my-3">
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a href="{{ url('/servisan') }}" class="nav-link">Daftar Servisan</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/servisan-selesai') }}" class="nav-link">Selesai</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/servisan-proses') }}" class="nav-link active">Proses</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/servisan-ov') }}" class="nav-link">Oper Vendor</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/servisan-diambil') }}" class="nav-link">Sudah Diambil</a>
        </li>
        <li class="nav-item">
            <a href="{{ url('/servisan-cancel') }}" class="nav-link">Cancel</a>
        </li>
    </ul>
</div>

<section class="section">
    {{-- menampilkan seluruh servisan masuk --}}
    

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
                            <td>{{ $item->status }}</td>
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
