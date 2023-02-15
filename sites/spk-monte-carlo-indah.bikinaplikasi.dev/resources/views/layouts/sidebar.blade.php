@if(in_array(auth()->user()->level, ['Admin']))
<li>
    <a @if(Route::current()->action['as'] == 'data_penjualan_aktual.index') class='active-menu' @endif
        href="{{ route('data_penjualan_aktual.index') }}"><i class="fa fa-table"></i>Data Penjualan Aktual</a>
</li>
@endif

{{-- 
@if(in_array(auth()->user()->level, ['Admin']))
<li>
    <a @if(Route::current()->action['as'] == 'data_penjualan_prediksi.index') class='active-menu' @endif
        href="{{ route('data_penjualan_prediksi.index') }}"><i class="fa fa-table"></i>Data Penjualan Prediksi</a>
</li>
@endif --}}


@if(in_array(auth()->user()->level, ['Admin']))
<li>
    <a @if(Route::current()->action['as'] == 'hitung-prediksi.index') class='active-menu' @endif
        href="{{ route('hitung-prediksi.index') }}"><i class="fa fa-table"></i>Hitung Prediksi</a>
</li>
@endif


@if(in_array(auth()->user()->level, ['Admin']))
<li>
    <a @if(Route::current()->action['as'] == 'data-prediksi.index') class='active-menu' @endif
        href="{{ route('data-prediksi.index') }}"><i class="fa fa-table"></i>Data Prediksi</a>
</li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
<li>
    <a @if(Route::current()->action['as'] == 'produk.index') class='active-menu' @endif
        href="{{ route('produk.index') }}"><i class="fa fa-table"></i>Produk</a>
</li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
<li>
    <a @if(Route::current()->action['as'] == 'tahun.index') class='active-menu' @endif
        href="{{ route('tahun.index') }}"><i class="fa fa-table"></i>Tahun</a>
</li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
<li>
    <a @if(Route::current()->action['as'] == 'grafik.index') class='active-menu' @endif
        href="{{ route('grafik.index') }}"><i class="fa fa-table"></i>Grafik</a>
</li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
<li>
    <a @if(Route::current()->action['as'] == 'info.index') class='active-menu' @endif
        href="{{ route('info.index') }}"><i class="fa fa-table"></i>Info</a>
</li>
@endif

<!-- <li>
    <a href="#"><i class="fa fa-sitemap"></i>Laporan <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level  @if(Request::segment(2) == 'laporan') collapse in @endif">
        @if(in_array(auth()->user()->level, ['Admin']))
        <li>
            <a @if(Route::current()->action['as'] == 'data_penjualan_aktual.laporan.index') class='active-menu' @endif
                href="{{ route('data_penjualan_aktual.laporan.index') }}"><i class="fa fa-table"></i>Data Penjualan
                Aktual</a>
        </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
        <li>
            <a @if(Route::current()->action['as'] == 'data_penjualan_prediksi.laporan.index') class='active-menu' @endif
                href="{{ route('data_penjualan_prediksi.laporan.index') }}"><i class="fa fa-table"></i>Data Penjualan
                Prediksi</a>
        </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
        <li>
            <a @if(Route::current()->action['as'] == 'produk.laporan.index') class='active-menu' @endif
                href="{{ route('produk.laporan.index') }}"><i class="fa fa-table"></i>Produk</a>
        </li>
        @endif


        @if(in_array(auth()->user()->level, ['Admin']))
        <li>
            <a @if(Route::current()->action['as'] == 'tahun.laporan.index') class='active-menu' @endif
                href="{{ route('tahun.laporan.index') }}"><i class="fa fa-table"></i>Tahun</a>
        </li>
        @endif

    </ul>
</li> -->