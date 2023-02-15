@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'fasilitas.index') class='active-menu'
           @endif href="{{ route('fasilitas.index') }}"><i class="fa fa-table"></i>Fasilitas</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'rumah.index') class='active-menu'
           @endif href="{{ route('rumah.index') }}"><i class="fa fa-table"></i>Rumah</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'tentang.index') class='active-menu'
           @endif href="{{ route('tentang.index') }}"><i class="fa fa-table"></i>Tentang</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'disukai.index') class='active-menu'
           @endif href="{{ route('disukai.index') }}"><i class="fa fa-table"></i>Disukai</a>
    </li>
@endif


@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'user.index') class='active-menu'
           @endif href="{{ route('user.index') }}"><i class="fa fa-table"></i>User</a>
    </li>
@endif
            
