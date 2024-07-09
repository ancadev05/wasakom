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
                <img src="{{ url('storage/contoh/laptop.png') }}" alt="" width="60%">
            </div>

            <table class="mt-3">
                <tr>
                    <td class="w-25">Merek</td>
                    <td>Lenovo</td>
                </tr>
                <tr>
                    <td>Type</td>
                    <td>Lenovo</td>
                </tr>
                <tr>
                    <td>CPU</td>
                    <td>cpu</td>
                </tr>
                <tr>
                    <td>GPU</td>
                    <td>cpu</td>
                </tr>
                <tr>
                    <td>RAM</td>
                    <td>cpu</td>
                </tr>
                <tr>
                    <td>Storage</td>
                    <td>cpu</td>
                </tr>
                <tr>
                    <td>Display</td>
                    <td>cpu</td>
                </tr>
                <tr>
                    <td>Keterangan</td>
                    <td>cpu</td>
                </tr>
            </table>
        </div>

    </div>
@endsection
