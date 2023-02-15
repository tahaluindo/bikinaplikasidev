
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('data_penjualan_aktual.index') }}">
                            <i class="fa fa-bolt fa-5x"></i>
                            <h5>({{ $data_penjualan_aktuals->count() }}) Data Penjualan Aktual</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('data_penjualan_prediksi.index') }}">
                            <i class="fa fa-bolt fa-5x"></i>
                            <h5>({{ $data_penjualan_prediksis->count() }}) Data Penjualan Prediksi</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('produk.index') }}">
                            <i class="fa fa-bolt fa-5x"></i>
                            <h5>({{ $produks->count() }}) Produk</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('tahun.index') }}">
                            <i class="fa fa-bolt fa-5x"></i>
                            <h5>({{ $tahuns->count() }}) Tahun</h5>
                        </a>
                    </div>
                </div>
            