@extends('template-dashboard.template-niceadmin')

@section('title')
    404
@endsection

@section('content')
<section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
    <h1>404</h1>
    <h2>Fitur masi dalam tahap pengembangan.</h2>
    {{-- <a class="btn" href="{{ url('/') }}">Back</a> --}}
    <img src="{{ asset('assets/img/development.svg') }}" class="img-fluid py-5" alt="Page Not Found">
</section>
@endsection
