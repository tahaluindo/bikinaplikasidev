@if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'siswa.index') class='active-menu'
                       @endif href="{{ route('siswa.index') }}"><i class="zmdi zmdi-long-arrow-right"></i> siswa</a>
                </li>
            @endif