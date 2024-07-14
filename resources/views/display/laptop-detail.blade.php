@extends('template-display.template')

@section('title')
    Laptop Display Detail
@endsection

@section('product-laptop-detail')
    <!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-5 col-md-push-2">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_1) }}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_2) }}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_3) }}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_4) }}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_5) }}" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					<!-- Product thumb imgs -->
					<div class="col-md-2  col-md-pull-5">
						<div id="product-imgs">
							<div class="product-preview">
								<img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_1) }}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_2) }}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_3) }}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_4) }}" alt="">
							</div>

							<div class="product-preview">
								<img src="{{ asset('storage/gambar-laptop/' . $laptop->laptoptipe->gambar_5) }}" alt="">
							</div>
						</div>
					</div>
					<!-- /Product thumb imgs -->

					<!-- Product details -->
					<div class="col-md-5">
						<div class="product-details">
							<h2 class="product-name">{{ $laptop->laptopmerek->merek . ' - ' . $laptop->laptoptipe->tipe }}</h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
								</div>
							</div>
							<div>
								<h3 class="product-price">Rp{{ format_uang($laptop->laptoptipe->harga) . ',-' }} <del class="product-old-price">$990.00</del></h3>
								<span class="product-available">In Stock</span>
							</div>
							
							<table class="mt-3 table">
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
							</table>

							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
							</div>

						
						</div>
					</div>
					<!-- /Product details -->

					<!-- Product tab -->
					<div class="col-md-12">
						<div id="product-tab">
							<!-- product tab nav -->
							<ul class="tab-nav">
								<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
							</ul>
							<!-- /product tab nav -->

							<!-- product tab content -->
							<div class="tab-content">
								<!-- tab1  -->
								<div id="tab1" class="tab-pane fade in active">
									<div class="row">
										<div class="col-md-12">
											<p>{{ $laptop->keterangan }}</p>
										</div>
									</div>
								</div>
								<!-- /tab1  -->
							</div>
							<!-- /product tab content  -->
						</div>
					</div>
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->
@endsection