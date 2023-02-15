
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('meja.index') }}">
                            <i class="fa fa-table fa-5x"></i>
                            <h5>({{ $mejas->count() }}) Meja</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('menu.index') }}">
                            <i class="fa fa-list-ul fa-5x"></i>
                            <h5>({{ $menus->count() }}) Menu</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('penjual.index') }}">
                            <i class="fa fa-users fa-5x"></i>
                            <h5>({{ $penjuals->count() }}) Penjual</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('pesanan.index') }}">
                            <i class="fa fa-opencart fa-5x"></i>
                            <h5>({{ $pesanans->count() }}) Pesanan</h5>
                        </a>
                    </div>
                </div>
            