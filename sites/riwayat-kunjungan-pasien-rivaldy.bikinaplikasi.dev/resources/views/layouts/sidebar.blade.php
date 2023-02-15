
            @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'pegawai.index') class='active-menu' @endif href="{{ route('pegawai.index') }}"><i class="fa fa-table"></i>Pegawai</a>
            </li>
            @endif
            
            @if(in_array(auth()->user()->level, ['Admin', 'Pegawai']))
            <li>
                <a @if(Route::current()->action['as'] == 'pasien.index') class='active-menu' @endif href="{{ route('pasien.index') }}"><i class="fa fa-table"></i>Pasien</a>
            </li>
            @endif
                      
            @if(in_array(auth()->user()->level, ['Admin', 'Pegawai']))
            <li>
                <a @if(Route::current()->action['as'] == 'riwayat_berobat.index') class='active-menu' @endif href="{{ route('riwayat_berobat.index') }}"><i class="fa fa-table"></i>Riwayat Berobat</a>
            </li>
            @endif
            
            @if(in_array(auth()->user()->level, ['Admin', 'Pegawai']))
            <li>
                <a @if(Route::current()->action['as'] == 'penyakit.index') class='active-menu' @endif href="{{ route('penyakit.index') }}"><i class="fa fa-table"></i>Penyakit</a>
            </li>
            @endif      

            @if(in_array(auth()->user()->level, ['Admin', 'Pegawai']))
            <li>
                <a @if(Route::current()->action['as'] == 'obat.index') class='active-menu' @endif href="{{ route('obat.index') }}"><i class="fa fa-table"></i>Obat</a>
            </li>
            @endif

            @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'user.index') class='active-menu' @endif href="{{ route('user.index') }}"><i class="fa fa-table"></i>User</a>
            </li>
            @endif
            
