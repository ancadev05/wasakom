@extends('template-dashboard.template-kaiadmin')

@section('title')
    Laptop
@endsection

@section('content')

    <div class="page-header">
        <h4 class="page-title">Laptop</h4>
    </div>

    <div class="page-category">
        <div class="shadow bg-white p-3">
            <a href="{{ url('laptop/create') }}" class="btn btn-sm btn-primary mb-3">Tambah Laptop</a>
            <div class="table-responsive">
                <span class="border-bottom">List Laptop</span>
                <table class="table table-sm table-striped table-hover table-bordered">
                    <thead class="bg-secondary text-bg-dark text-center">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>SN</th>
                            <th>Merek</th>
                            <th>Type</th>
                            <th>CPU</th>
                            <th>RAM</th>
                            <th>Storage</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @forelse ($laptops as $laptop)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $laptop->tgl }}</td>
                                <td>{{ $laptop->sn }}</td>
                                <td>{{ $laptop->laptopmerek->merek }}</td>
                                <td>{{ $laptop->laptoptipe->tipe }}</td>
                                <td>{{ $laptop->cpu }}</td>
                                <td>{{ $laptop->ram }}</td>
                                <td>{{ $laptop->storage }}</td>
                                <td>
                                    @if ($laptop->status == 1)
                                        <span>Display </span>
                                        @if ($laptop->kondisi == 1)
                                            <i class="fas fa-check-circle text-success" data-bs-toggle="tooltip"
                                                data-bs-placment="top" data-bs-title="Normal"></i>
                                        @elseif ($laptop->kondisi == 2)
                                            <i class="fas fa-exclamation-circle text-warning" data-bs-toggle="tooltip"
                                                data-bs-placment="top" data-bs-title="Tidak normal"></i>
                                        @else
                                            <i class="fas fa-times-circle text-danger" data-bs-toggle="tooltip"
                                                data-bs-placment="top" data-bs-title="Rusak"></i>
                                        @endif
                                    @elseif ($laptop->status == 2)
                                        <span>Penyewaan </span>
                                        @if ($laptop->kondisi == 1)
                                            <i class="fas fa-check-circle text-success" data-bs-toggle="tooltip"
                                                data-bs-placment="top" data-bs-title="Normal"></i>
                                        @elseif ($laptop->kondisi == 2)
                                            <i class="fas fa-exclamation-circle text-warning" data-bs-toggle="tooltip"
                                                data-bs-placment="top" data-bs-title="Tidak normal"></i>
                                        @else
                                            <i class="fas fa-times-circle text-danger" data-bs-toggle="tooltip"
                                                data-bs-placment="top" data-bs-title="Rusak"></i>
                                        @endif
                                    @else
                                        <span class="text-danger">Dipenyewaan</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="#" class="btn btn-xs btn-secondary d-inline-block"
                                        data-bs-toggle="tooltip" data-bs-placment="top" data-bs-title="Detail"><i
                                            class="far fa-eye"></i></a>
                                    <a href="{{ url('laptop/' . $laptop->id . '/edit') }}"
                                        class="btn btn-xs btn-warning d-inline-block" data-bs-toggle="tooltip"
                                        data-bs-placment="top" data-bs-title="Edit"><i class="far fa-edit"></i></a>
                                    <form action="{{ url('laptop/' . $laptop->id) }}" method="POST" class="d-inline"
                                        onsubmit="confirm('Yakin ingin hapus data?')">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-xs btn-danger d-inline-block"
                                            data-bs-toggle="tooltip" data-bs-placment="top" data-bs-title="Hapus"><i
                                                class="far fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @php
                                $i++
                            @endphp
                        @empty
                            <div class="alert alert-danger">Belum ada data yang tersedia</div>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
