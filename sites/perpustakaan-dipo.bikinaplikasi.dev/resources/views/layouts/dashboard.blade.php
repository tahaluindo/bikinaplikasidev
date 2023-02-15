
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('anggota.index') }}">
                            <i class="fa fa-user fa-5x"></i>
                            <h5>({{ $anggotas->count() }}) anggota</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('buku.index') }}">
                            <i class="fa fa-book fa-5x"></i>
                            <h5>({{ $bukus->count() }}) buku</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('pengembalian.index') }}">
                            <i class="fa fa-id-card fa-5x"></i>
                            <h5>({{ $pengembalians->count() }}) pengembalian</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('peminjaman.index') }}">
                            <i class="fa fa-bookmark fa-5x"></i>
                            <h5>({{ $peminjamans->count() }}) peminjaman</h5>
                        </a>
                    </div>
                </div>
            