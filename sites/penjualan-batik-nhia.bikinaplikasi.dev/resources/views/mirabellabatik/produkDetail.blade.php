@if ( auth()->guard()->check() )
    @include('layouts.header')
@else 
    @include('layouts.headerBersih')
@endif

<style>

/*****************globals*************/
body {
  font-family: 'open sans';
  overflow-x: hidden; }

img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 18%;
    margin-right: 2.5%; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
      display: block; }
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    -webkit-animation-name: opacity;
            animation-name: opacity;
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  margin-top: 50px;
  background: #eee;
  padding: 3em;
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.product-title, .price, .sizes, .colors {
  text-transform: UPPERCASE;
  font-weight: bold; }

.checked, .price span {
  color: #ff9f1a; }

.product-title, .rating, .product-description, .price, .vote, .sizes {
  margin-bottom: 15px; }

.product-title {
  margin-top: 0; }

.size {
  margin-right: 10px; }
  .size:first-of-type {
    margin-left: 40px; }

.color {
  display: inline-block;
  vertical-align: middle;
  margin-right: 10px;
  height: 2em;
  width: 2em;
  border-radius: 2px; }
  .color:first-of-type {
    margin-left: 20px; }

.add-to-cart, .like {
  background: #ff9f1a;
  padding: 1.2em 1.5em;
  border: none;
  text-transform: UPPERCASE;
  font-weight: bold;
  color: #fff;
  -webkit-transition: background .3s ease;
          transition: background .3s ease; }
  .add-to-cart:hover, .like:hover {
    background: #b36800;
    color: #fff; }

.not-available {
  text-align: center;
  line-height: 2em; }
  .not-available:before {
    font-family: fontawesome;
    content: "\f00d";
    color: #fff; }

.orange {
  background: #ff9f1a; }

.green {
  background: #85ad00; }

.blue {
  background: #0076ad; }

.tooltip-inner {
  padding: 1.3em; }

@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); } }
</style>

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <div class="container px-5 py-2">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
						
						<div class="preview-pic tab-content">
						  <div class="tab-pane active" id="pic-1"><img src='{{ asset("asset/imgBarang/$produk->gambar") }}' /></div>
						  <div class="tab-pane" id="pic-2"><img src='{{ asset("asset/imgBarang/$produk->gambar") }}' /></div>
						  <div class="tab-pane" id="pic-3"><img src='{{ asset("asset/imgBarang/$produk->gambar_belakang") }}' /></div>
						</div>
						<ul class="preview-thumbnail nav nav-tabs">
						  <li><a data-target="#pic-2" data-toggle="tab"><img src='{{ asset("asset/imgBarang/$produk->gambar") }}' /></a></li>
						  <li><a data-target="#pic-3" data-toggle="tab"><img src='{{ asset("asset/imgBarang/$produk->gambar_belakang") }}' /></a></li>
						</ul>
						
					</div>
					<div class="details col-md-6">
						<h3 class="product-title">{{ $produk->nama_produk }}</h3>

            <h5 class='price'>Deskripsi</h4>
						<p class="product-description">{{ $produk->deskripsi }}</p>
						
						<h4 class="price">current price: 
            <span>
              @php 
                $harga = $produk->harga - ($produk->harga / 100 * $produk->diskon);
              @endphp
              Rp{{ number_format($harga, 2, ',', '.')}}
            </span></h4>
						<h5 class="sizes">sizes:
                <span class="size" >
                @foreach($produk->ukuran_produks as $ukuran_produk)
                  {{ $ukuran_produk->ukuran }},
                @endforeach
                </span>
						</h5>
						{{-- <h5 class="colors">colors:
							<span class="color orange not-available" data-toggle="tooltip" title="Not In store"></span>
							<span class="color green"></span>
							<span class="color blue"></span>
						</h5> --}}

						<div class="action">
                <div class='row'>
                <form action='/home/produk/{{ $produk->id }}/order'>
                <div class='form-row ml-2'>
                    <div class='col'>
                      <div class='form-group'>
                        <select name='size' class='form-control'  required>
                          <option value=''>-- Size --</option>
                          @foreach ( $produk->ukuran_produks as $ukuran_produk ) 
                            @if ( $ukuran_produk->stok !== 0)
                              <option value='{{ $ukuran_produk->ukuran }}'>{{ $ukuran_produk->ukuran }}</option>
                            @endif
                          @endforeach 
                        </select>
                      </div>
                    </div>

                  <div class='col'>
                    <div class='form-group'>
                      <select name='color' class='form-control'  required>
                        <option value=''>-- Color --</option>
                        <option value='red'>Red</option>
                        <option value='green'>Green</option>
                        <option value='blue'>Blue</option>
                        <option value='yellow'>yellow</option>
                      </select>
                    </div>
                  </div>

                  <div class='col'>
                    
                    <div class='form-group'>
                      <select name='jumlah' class='form-control' required>
                        <option value=''>-- Jumlah --</option>
                        <option value='1'>1</option>
                        <option value='2'>2</option>
                        <option value='3'>3</option>
                        <option value='4'>4</option>
                        <option value='5'>5</option>
                        <option value='6'>6</option>
                        <option value='7'>7</option>
                        <option value='8'>8</option>
                        <option value='9'>9</option>
                        <option value='10'>10</option>
                      </select>
                      @if ( $errors->has('jumlah') )
                      <div class='alert alert-danger'>
                          <span class="text-danger">{{ $errors->first('jumlah') }}</span>
                        </div>
                    @endif
                    </div>
                  </div> 
                </div>
              </div>
							<button class="add-to-cart btn btn-default btn-block btn-sm" type='submit'>
                <i class='fa fa-cart-plus fa-2x'></i> &nbsp;
                Add To Cart
              </button>
              </form>
							<!-- <button class="like btn btn-default" type="button"><span class="fa fa-heart"></span></button> -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

@include('layouts.footer')