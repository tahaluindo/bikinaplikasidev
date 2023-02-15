

            @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'kos.index') class='active-menu' @endif href="{{ route('kos.index') }}"><i class="fa fa-table"></i>Kos</a>
            </li>
            @endif
            

            @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'tentang.index') class='active-menu' @endif href="{{ route('tentang.index') }}"><i class="fa fa-table"></i>Tentang</a>
            </li>
            @endif
            
            @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'disukai.index') class='active-menu' @endif href="{{ route('disukai.index') }}"><i class="fa fa-table"></i>Disukai</a>
            </li>
            @endif
            

            @if(in_array(auth()->user()->level, ['Admin']))
            <li>
                <a @if(Route::current()->action['as'] == 'user.index') class='active-menu' @endif href="{{ route('user.index') }}"><i class="fa fa-table"></i>User</a>
            </li>
            @endif
            
