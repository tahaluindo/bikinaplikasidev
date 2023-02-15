@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'user.index') class='active-menu'
           @endif href="{{ route('user.index') }}"><i class="fa fa-table"></i>User</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'spot.index') class='active-menu'
           @endif href="{{ route('spot.index') }}"><i class="fa fa-table"></i>Spot</a>
    </li>
@endif
