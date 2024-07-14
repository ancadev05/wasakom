@extends('template-display.template')

@section('title')
    Laptop
@endsection

@section('content')
    <div class="page-header">
        <h4 class="page-title">Laptop Display</h4>
    </div>

    <div class="page-category">
        <div class="card p-3">
            <div class="d-flex align-items-center justify-content-center">
                <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_1) }}" alt="" width="60%">
            </div>

            <table class="mt-3 table">
                <tr>
                    <td class="w-25">Merek</td>
                    <td>{{ $laptop->laptopmerek->merek }}</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>{{ $laptop->laptoptipe->tipe }}</td>
                </tr>
                <tr>
                    <td>CPU</td>
                    <td>{{ $laptop->cpu }}</td>
                </tr>
                <tr>
                    <td>GPU</td>
                    <td>{{ $laptop->gpu }}</td>
                </tr>
                <tr>
                    <td>RAM</td>
                    <td>{{ $laptop->ram }}</td>
                </tr>
                <tr>
                    <td>Storage</td>
                    <td>{{ $laptop->storage }} {{ $laptop->interfaces_storage == 1 ? ' (SATA)' : ' (NvMe)' }}</td>
                </tr>
                <tr>
                    <td>Display</td>
                    <td>{{ $laptop->laptoptipe->layar_size . ', ' . $laptop->laptoptipe->layar_resolusi }}</td>
                </tr>
                <tr>
                    <td>Kelengkapan</td>
                    <td>{{ $laptop->kelengkapan }}</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>{{ $laptop->keterangan }}</td>
                </tr>
            </table>
        </div>

    </div>
@endsection
