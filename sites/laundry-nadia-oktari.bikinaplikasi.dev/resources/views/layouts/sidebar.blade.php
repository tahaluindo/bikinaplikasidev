<ul class="sidebar-menu do-nicescrol">
    <li class="sidebar-header">MAIN NAVIGATION</li>
    <li>
        <a href="{{ route('dashboard') }}" class="waves-effect">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="active">
        <a href="javaScript:void();" class="waves-effect">
            <i class="zmdi zmdi-layers"></i>
            <span>Menu</span>
        </a>
        <ul class="sidebar-submenu">
            @if(in_array(auth()->user()->level, ['Admin']))
                <li>
                    <a @if(Route::current()->action['as'] == 'user.index') class='active-menu'
                       @endif href="{{ route('user.index') }}"><i class="zmdi zmdi-long-arrow-right"></i> User</a>
                </li>
            @endif

            @if(in_array(auth()->user()->level, ['Admin']))
                <li>
                    <a @if(Route::current()->action['as'] == 'paket.index') class='active-menu'
                       @endif href="{{ route('paket.index') }}"><i class="zmdi zmdi-long-arrow-right"></i> Paket</a>
                </li>
            @endif

            @if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'pelanggan.index') class='active-menu'
                       @endif href="{{ route('pelanggan.index') }}"><i class="zmdi zmdi-long-arrow-right"></i> Pelanggan</a>
                </li>
            @endif

            @if(in_array(auth()->user()->level, ['Admin']))
                <li>
                    <a @if(Route::current()->action['as'] == 'pengeluaran.index') class='active-menu'
                       @endif href="{{ route('pengeluaran.index') }}"><i class="zmdi zmdi-long-arrow-right"></i>
                        Pengeluaran</a>
                </li>
            @endif

            @if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'pesanan.index') class='active-menu'
                       @endif href="{{ route('pesanan.index') }}"><i class="zmdi zmdi-long-arrow-right"></i> Pesanan</a>
                </li>
            @endif
        </ul>
    </li>

    <li class="active">
        <a href="javaScript:void();" class="waves-effect">
            <i class="fa fa-print"></i>
            <span>Laporan</span>

        </a>
        <ul class="sidebar-submenu">
            <li><a href="{{ route("laporan.pesanan") }}"><i class="zmdi zmdi-long-arrow-right"></i> Pesanan</a></li>

            @if(in_array(auth()->user()->level, ['Admin']))
                <li><a href="{{ route("laporan.pengeluaran") }}"><i class="zmdi zmdi-long-arrow-right"></i> Pengeluaran</a>
                </li>
                <li><a href="{{ route("laporan.laba-rugi") }}"><i class="zmdi zmdi-long-arrow-right"></i> Laba/Rugi</a>
                </li>
            @endif
        </ul>
    </li>
</ul>

