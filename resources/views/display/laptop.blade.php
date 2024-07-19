@extends('template-display.template')

@section('title')
    Laptop
@endsection

@section('product-laptop')
    <div class="page-category">

        <div class="row">
            <div class="col-md-12">
                <div class="section-title text-center">
                    <h3 class="title">Catalog Products</h3>
                </div>
            </div>
            <!-- product -->
            @foreach ($laptop as $item)
                <div class="col-md-4 col-xs-6">
                    <div class="product shadow rounded">
                        <div class="product-img">
                            <img src="{{ asset('storage/gambar-laptop/' . $item->laptoptipe->gambar_1) }}" alt="">
                            <div class="product-label">
                                {{-- <span class="new">NEW</span> --}}
                            </div>
                        </div>
                        <div class="product-body">
                            <h3 class="product-name"><a href="#">{{ $item->laptopmerek->merek }} -
                                    {{ $item->laptoptipe->tipe }}</a></h3>
                            <h4 class="product-price">Rp{{ format_uang($item->laptoptipe->harga) . ',-' }}</h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="btn-group shadow">
                                    <a href="{{ url('/display/' . $item->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-eye"></i> Detail</a>
                                    {{-- <button type="button" class="btn btn-sm btn-success"><i class="fa fa-whatsapp"></i> Chat</button> --}}
                                </div>
                            </div>
                            {{-- <div class="product-btns">
                                
                                <button class="add-to-wishlist"><h4><i class="fa fa-whatsapp"></i></h4><span class="tooltipp">Chat CS</span></button>
                                <button class="quick-view"><h4><i class="fa fa-eye"></i></h4><span class="tooltipp">quick
                                        view</span></button>
                            </div> --}}
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
