@if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'penjualan.index') class='active-menu'
                       @endif href="{{ route('penjualan.index') }}"><i class="zmdi zmdi-long-arrow-right"></i> penjualan</a>
                </li>
            @endif