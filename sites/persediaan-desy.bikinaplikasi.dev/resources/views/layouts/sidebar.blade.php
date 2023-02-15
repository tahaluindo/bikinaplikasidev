@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'pelanggan.index') class='active-menu'
           @endif href="{{ route('pelanggan.index') }}"><i class="fa fa-table"></i>Pelanggan</a>
    </li>
@endif


@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'pemasok.index') class='active-menu'
           @endif href="{{ route('pemasok.index') }}"><i class="fa fa-table"></i>Pemasok</a>
    </li>
@endif


@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'pembelian.index') class='active-menu'
           @endif href="{{ route('pembelian.index') }}"><i class="fa fa-table"></i>Pembelian</a>
    </li>
@endif


@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'penjualan.index') class='active-menu'
           @endif href="{{ route('penjualan.index') }}"><i class="fa fa-table"></i>Penjualan</a>
    </li>
@endif


@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'produk.index') class='active-menu'
           @endif href="{{ route('produk.index') }}"><i class="fa fa-table"></i>Produk</a>
    </li>
@endif

<li>
    <a href="#"><i class="fa fa-sitemap"></i>Laporan <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level  @if(Request::segment(2) == 'laporan') collapse in @endif">
        @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'pelanggan.laporan.index') class='active-menu'
                   @endif href="{{ route('pelanggan.laporan.index') }}"><i class="fa fa-table"></i>Pelanggan</a>
            </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'pemasok.laporan.index') class='active-menu'
                   @endif href="{{ route('pemasok.laporan.index') }}"><i class="fa fa-table"></i>Pemasok</a>
            </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'pembelian.laporan.index') class='active-menu'
                   @endif href="{{ route('pembelian.laporan.index') }}"><i class="fa fa-table"></i>Pembelian</a>
            </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'penjualan.laporan.index') class='active-menu'
                   @endif href="{{ route('penjualan.laporan.index') }}"><i class="fa fa-table"></i>Penjualan</a>
            </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'produk.laporan.index') class='active-menu'
                   @endif href="{{ route('produk.laporan.index') }}"><i class="fa fa-table"></i>Produk</a>
            </li>
        @endif

    </ul>
</li>