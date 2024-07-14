@extends('template-display.template')

@section('title')
    Laptop
@endsection

@section('product')
    <div class="page-header">
        <h4 class="page-title">Laptop Display</h4>
    </div>

    <div class="page-category">

        <div class="row">
            @foreach ($laptop as $item)
                <div class="col-md-4 col-xs-6">
                    <div class="card shadow">
                        <img src="{{ asset('storage/gambar-laptop/' . $item->laptoptipe->gambar_1) }}" alt=""
                            class="bd-placeholder-img card-img-top" height="225">
                        <div class="card-body">
                            <h5 class="card-text fw-bold m-0">{{ $item->laptopmerek->merek }}</h5>
                            <h5 class="card-text fw-bold">{{ $item->laptoptipe->tipe }}</h5>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="{{ url('/display/' . $item->id) }}" type="button"
                                        class="btn btn-sm btn-info">View</a>
                                    <a href="{{ url('/display/1') }}" type="button" class="btn btn-sm btn-success">View</a>
                                    {{-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> --}}
                                </div>
                                <small class="text-body-secondary">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="row">
            <!-- product -->
            @foreach ($laptop as $item)
                <div class="col-md-4 col-xs-6">
                    <div class="product">
                        <div class="product-img"
                        style="
                        background-image: url('{{ asset('/storage/foto-atlet/' . $item->laptoptipe->gambar_1) }}');
                        background-position: center;
                        background-size: cover;
                        background-repeat: no-repeat;
                        ">
                        {{-- <div> --}}
                            {{-- <img src="{{ asset('storage/gambar-laptop/' . $item->laptoptipe->gambar_1) }}" alt=""> --}}
                            <div class="product-label">
                                <span class="new">NEW</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <h3 class="product-name"><a href="#">{{ $item->laptopmerek->merek }} - {{ $item->laptoptipe->tipe }}</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">$990.00</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product-btns">
                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
                                        wishlist</span></button>
                                <button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
                                        compare</span></button>
                                <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                        view</span></button>
                            </div>
                        </div>
                        {{-- <div class="add-to-cart">
                            <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                        </div> --}}
                    </div>
                </div>
                <!-- /product -->
            @endforeach
        </div>

    </div> {{-- end content --}}
@endsection
