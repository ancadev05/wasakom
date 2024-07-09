@extends('template-dashboard.template-kaiadmin')

@section('title')
    Merek & Tipe Laptop
@endsection

@section('content')

    <div class="page-header">
      <h4 class="page-title">Merek & Tipe Laptop</h4>
    </div>
    
    <div class="page-category">
        {{-- tabel merek laptop --}}
        <div class="shadow bg-white rounded p-3 mb-3">
            <button class="btn btn-xs btn-primary">Tambah</button>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Merek Laptop</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($laptop_merek as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ strtoupper($item->merek) }}</td>
                        </tr>
                        @php
                            $i++
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        {{-- tabel tipe laptop --}}
        <div class="shadow bg-white rounded p-3 mb-3">
            <button class="btn btn-xs btn-primary">Tambah</button>
            <table class="table table-sm">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Tipe Laptop</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $i = 1;
                    @endphp
                    @foreach ($laptop_tipe as $item)
                        <tr>
                            <td>{{ $i }}</td>
                            <td>{{ strtoupper($item->tipe) }}</td>
                        </tr>
                        @php
                            $i++
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
