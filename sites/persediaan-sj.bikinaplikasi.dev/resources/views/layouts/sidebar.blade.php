@if(in_array(auth()->user()->level, ['Admin']))
    <li class="site-menu-item">
        <a @if(Route::current()->action['as'] == 'pelanggan.index') class='active-menu'
           @endif href="{{ route('pelanggan.index') }}"><span class="site-menu-title">Pelanggan</span></a>
    </li>
@endif


@if(in_array(auth()->user()->level, ['Admin']))
    <li class="site-menu-item">
        <a @if(Route::current()->action['as'] == 'pemasok.index') class='active-menu'
           @endif href="{{ route('pemasok.index') }}"><span class="site-menu-title">Pemasok</span></a>
    </li>
@endif


@if(in_array(auth()->user()->level, ['Admin']))
    <li class="site-menu-item">
        <a @if(Route::current()->action['as'] == 'pembelian.index') class='active-menu'
           @endif href="{{ route('pembelian.index') }}"><span class="site-menu-title">Pembelian</span></a>
    </li>
@endif


@if(in_array(auth()->user()->level, ['Admin']))
    <li class="site-menu-item">
        <a @if(Route::current()->action['as'] == 'penjualan.index') class='active-menu'
           @endif href="{{ route('penjualan.index') }}"><span class="site-menu-title">Penjualan</span></a>
    </li>
@endif


@if(in_array(auth()->user()->level, ['Admin']))
    <li class="site-menu-item">
        <a @if(Route::current()->action['as'] == 'barang.index') class='active-menu'
           @endif href="{{ route('barang.index') }}"><span class="site-menu-title">Barang</span></a>
    </li>
@endif

<li class="site-menu-item">
    <a href="#"><i class="fa fa-sitemap"></i>Laporan <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level  @if(Request::segment(2) == 'laporan') collapse in @endif">
        @if(in_array(auth()->user()->level, ['Admin']))
            <li class="site-menu-item">
                <a @if(Route::current()->action['as'] == 'pelanggan.laporan.index') class='active-menu'
                   @endif href="{{ route('pelanggan.laporan.index') }}"><span
                        class="site-menu-title">Pelanggan</span></a>
            </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
            <li class="site-menu-item">
                <a @if(Route::current()->action['as'] == 'pemasok.laporan.index') class='active-menu'
                   @endif href="{{ route('pemasok.laporan.index') }}"><span class="site-menu-title">Pemasok</span></a>
            </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
            <li class="site-menu-item">
                <a @if(Route::current()->action['as'] == 'pembelian.laporan.index') class='active-menu'
                   @endif href="{{ route('pembelian.laporan.index') }}"><span
                        class="site-menu-title">Pembelian</span></a>
            </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
            <li class="site-menu-item">
                <a @if(Route::current()->action['as'] == 'penjualan.laporan.index') class='active-menu'
                   @endif href="{{ route('penjualan.laporan.index') }}"><span
                        class="site-menu-title">Penjualan</span></a>
            </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
            <li class="site-menu-item">
                <a @if(Route::current()->action['as'] == 'barang.laporan.index') class='active-menu'
                   @endif href="{{ route('barang.laporan.index') }}"><span class="site-menu-title">Barang</span></a>
            </li>
        @endif

    </ul>
</li>