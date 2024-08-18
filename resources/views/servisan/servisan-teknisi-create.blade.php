@extends('template-dashboard.template-niceadmin')

@section('title')
    Servisan
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Ambil Servisan</h1>
    </div>

    <section class="section">
        {{-- halaman untuk melihat servisan yang sudah masuk yang harus dikerjakan untuk teknisi --}}
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-striped nowrap w-100" id="datatables">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Costumer</th>
                            <th>Merek-Tipe</th>
                            <th>Keluhan</th>
                            <th>Kelengkapan</th>
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
                                <td>{{ $item->costumer->nama }}</td>
                                <td>{{ $item->laptopmerek->merek . '-' . $item->tipe }}</td>
                                <td>{{ $item->keluhan }}</td>
                                <td>{{ $item->kelengkapan }}</td>
                                <td>
                                    <form action="{{ url('servisan-teknisi' ) }}" method="post">
                                    @csrf
                                        <input type="hidden" name="servisan_id" value="{{ $item->id }}">
                                        <button class="btn btn-sm btn-primary" type="submit"><i class="bi bi-plus-lg"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center my-3 border-top pt-2">
                <a href="{{ url('/servisan-teknisi') }}" class="btn btn-sm btn-danger shadow-sm">Back</a>
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
