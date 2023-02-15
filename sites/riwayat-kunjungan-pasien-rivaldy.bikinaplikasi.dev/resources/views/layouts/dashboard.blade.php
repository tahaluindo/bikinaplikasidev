
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('pasien.index') }}">
                            <i class="fa fa-bolt fa-5x"></i>
                            <h5>({{ $pasiens->count() }}) Pasien</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('pegawai.index') }}">
                            <i class="fa fa-bolt fa-5x"></i>
                            <h5>({{ $pegawais->count() }}) Pegawai</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('obat.index') }}">
                            <i class="fa fa-bolt fa-5x"></i>
                            <h5>({{ $obats->count() }}) Obat</h5>
                        </a>
                    </div>
                </div>
            
                <div class="col-md-3">
                    <div class="main-box mb-red">
                        <a href="{{ route('penyakit.index') }}">
                            <i class="fa fa-bolt fa-5x"></i>
                            <h5>({{ $penyakits->count() }}) Penyakit</h5>
                        </a>
                    </div>
                </div>
            