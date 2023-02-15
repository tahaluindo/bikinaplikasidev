<ul class="nav">
    <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}"
                            style="display: block; margin-left: 23px !important;"><i class="fa fa-dashboard"></i>
            <div class="menu-block-label">Dashboard</div>
        </a></li>

    <li class="menu-block-has-sub nav-item"><a class="nav-link active" href="#"><i class="icon ion-android-funnel"></i>
            <div class="menu-block-label">Menu</div>
        </a>
        <ul class="nav menu-block-sub" style="display: block;">
            @if(in_array(auth()->user()->level, ['Admin']))
                <li>
                    <a @if(Route::current()->action['as'] == 'user.index') class='active-menu'
                       @endif href="{{ route('user.index') }}"></i>&nbsp;User</a>
                </li>
            @endif

            @if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'jenis.index') class='active-menu'
                       @endif href="{{ route('jenis.index') }}">Jenis</a>
                </li>
            @endif

            @if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'satuan.index') class='active-menu'
                       @endif href="{{ route('satuan.index') }}">Satuan</a>
                </li>
            @endif

            @if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'barang.index') class='active-menu'
                       @endif href="{{ route('barang.index') }}">Barang</a>
                </li>
            @endif

            @if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'pembelian.index') class='active-menu'
                       @endif href="{{ route('pembelian.index') }}">Pembelian</a>
                </li>
            @endif
        </ul>
    </li>

    @if(in_array(auth()->user()->level, ['Admin']))
        <li class="menu-block-has-sub nav-item"><a class="nav-link active" href="#"><i
                    class="icon ion-android-funnel"></i>
                <div class="menu-block-label">Laporan</div>
            </a>
            <ul class="nav menu-block-sub" style="display: block;">
                <li><a href="{{ route("laporan.barang") }}">Barang</a></li>
                <li><a href="{{ route("laporan.penyusutan") }}">Penyusutan</a></li>
                <li><a href="{{ route("laporan.pembelian") }}">Pembelian</a></li>
            </ul>
        </li>
    @endif
</ul>