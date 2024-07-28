@extends('template-dashboard.template-niceadmin')

@section('title')
    Laptop per Type
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Jumlah Laptop per Tipe</h1>
    </div><!-- End Page Title -->

    <section class="section dashboard">
        <div class="card p-3">
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover w-100" id="datatables">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Gambar</th>
                            <th>Merek</th>
                            <th>Tipe</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($laptops as $item)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>
                                    <div class="card-icon">
                                        {{-- <i class="bi bi-laptop"></i> --}}
                                        <a href="{{ asset('storage/gambar-laptop/' . $item->laptoptipe->gambar_1) }}"
                                            target="_blank">
                                            <img src="{{ asset('storage/gambar-laptop/' . $item->laptoptipe->gambar_1) }}"
                                                alt="" class="rounded-circle">
                                        </a>
                                    </div>
                                </td>
                                <td>{{ $item->laptopmerek->merek }}</td>
                                <td>{{ $item->laptoptipe->tipe }}</td>
                                <td>
                                    <a
                                        href="{{ url('/laptop-tipe-list/' . $item->laptop_tipe_id . '/' . $item->laptoptipe->tipe) }}">{{ $item->total }}
                                        unit</a>
                                </td>
                            </tr>
                            @php
                                $i++;
                            @endphp
                        @empty
                            <div class="alert alert-danger">Belum ada data yang tersedia</div>
                        @endforelse
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
                // responsive: true
            });
        });
    </script>
@endsection