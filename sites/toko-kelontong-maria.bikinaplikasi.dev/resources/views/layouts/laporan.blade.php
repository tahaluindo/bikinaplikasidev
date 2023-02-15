@if(in_array(auth()->user()->level, ['Admin', 'Karyawan']))
                <li>
                    <a @if(Route::current()->action['as'] == 'user.index') class='active-menu'
                       @endif href="{{ route('user.index') }}"><i class="zmdi zmdi-long-arrow-right"></i> user</a>
                </li>
            @endif