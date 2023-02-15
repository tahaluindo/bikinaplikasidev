
                <div class="col-md-3">
                    <div  class="main-box mb-red">
                        <a  href="{{ route('pelanggan.index') }}">
                            <i class="fa fa-users fa-5x"></i>
                            <h5 >({{ $pelanggans->count() }}) pelanggan</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('pemasok.index') }}">
                            <i class="fa fa-user fa-5x"></i>
                            <h5>({{ $pemasoks->count() }}) pemasok</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('pembelian.index') }}">
                            <i class="fa fa-cart-arrow-down fa-5x"></i>
                            <h5>({{ $pembelians->count() }}) pembelian</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('penjualan.index') }}">
                            <i class="fa fa-money fa-5x"></i>
                            <h5>({{ $penjualans->count() }}) penjualan</h5>
                        </a>
                    </div>
                </div>
            