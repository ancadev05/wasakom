@extends('template-dashboard.template-niceadmin')

@section('title')
    {{ $laptop->laptopmerek->merek . '-' . $laptop->laptoptipe->tipe }}
@endsection

@section('content')
    <div class="pagetitle">
        <h1>{{ $laptop->laptopmerek->merek . '-' . $laptop->laptoptipe->tipe }}</h1>
    </div>
    <section class="section">
        <div class="card p-3">
            <table class="table table-sm">
                <tr>
                    <td>#id</td>
                    <td>: {{ $laptop->id }}</td>
                </tr>
                <tr>
                    <td>SN</td>
                    <td>: {{ $laptop->sn }}</td>
                </tr>
                <tr>
                    <td>Merek</td>
                    <td>: {{ $laptop->laptopmerek->merek }}</td>
                </tr>
                <tr>
                    <td>Tipe</td>
                    <td>: {{ $laptop->laptoptipe->tipe }}</td>
                </tr>
                <tr>
                    <td>CPU</td>
                    <td>: {{ $laptop->cpu }}</td>
                </tr>
                <tr>
                    <td>GPU</td>
                    <td>: {{ $laptop->gpu }}</td>
                </tr>
                <tr>
                    <td>Storage</td>
                    <td>: {{ $laptop->storage }} {{ $laptop->interfaces_storage == 1 ? ' (SATA)' : ' (NvMe)' }} </td>
                </tr>
                <tr>
                    <td>RAM</td>
                    <td>: {{ $laptop->ram }}</td>
                </tr>
                <tr>
                    <td>Display</td>
                    <td>: {{ $laptop->laptoptipe->layar_size . ' / ' . $laptop->laptoptipe->layar_resolusi}}</td>
                </tr>
                <tr>
                    <td>Status</td>
                    <td>: {{ $laptop->laptopstatus->status }}</td>
                </tr>
                <tr>
                    <td>Kondisi</td>
                    <td>: {{ $laptop->laptopkondisi->kondisi }}</td>
                </tr>
            </table>

            <div class="mb-3">
                <span class="fw-bold">Description:</span>
                <p>{{ $laptop->keterangan }}</p>
                <p>{{ $laptop->keterangan }}</p>
            </div>

            <div>
                <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_1) }}" alt="" width="300px" class="my-1 mx-2">
                <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_2) }}" alt="" width="300px" class="my-1 mx-2">
                <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_3) }}" alt="" width="300px" class="my-1 mx-2">
                <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_4) }}" alt="" width="300px" class="my-1 mx-2">
                <img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_5) }}" alt="" width="300px" class="my-1 mx-2">
            </div>

           
        </div>
    </section>
@endsection

