
            @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'meja.index') class='active-menu' @endif href="{{ route('meja.index') }}"><i class="fa fa-table"></i>Meja</a>
            </li>
            @endif
            

            @if(in_array(auth()->user()->level, ['Admin', 'Penjual']))
            <li>
                <a @if(Route::current()->action['as'] == 'menu.index') class='active-menu' @endif href="{{ route('menu.index') }}"><i class="fa fa-table"></i>Menu</a>
            </li>
            @endif
            

            @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'penjual.index') class='active-menu' @endif href="{{ route('penjual.index') }}"><i class="fa fa-table"></i>Penjual</a>
            </li>
            @endif
            

            @if(in_array(auth()->user()->level, ['Admin', 'Penjual']))
            <li>
                <a @if(Route::current()->action['as'] == 'pesanan.index') class='active-menu' @endif href="{{ route('pesanan.index') }}"><i class="fa fa-table"></i>Pesanan</a>
            </li>
            @endif
            

            @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'user.index') class='active-menu' @endif href="{{ route('user.index') }}"><i class="fa fa-table"></i>User</a>
            </li>
            @endif
            
            
            @if(in_array(auth()->user()->level, ['Admin', 'Penjual']))
            <li>
                <a @if(Route::current()->action['as'] == 'pesanan.laporan.index') class='active-menu' @endif href="{{ route('pesanan.laporan.index') }}"><i class="fa fa-table"></i>Laporan Penjualan</a>
            </li>
            @endif
            
            
