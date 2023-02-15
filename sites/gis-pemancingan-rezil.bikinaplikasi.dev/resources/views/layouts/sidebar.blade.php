@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'jenis.index') class='active-menu'
           @endif href="{{ route('jenis.index') }}"><i class="fa fa-table"></i>Jenis</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin', 'Pengunjung']))
    <li>
        <a @if(Route::current()->action['as'] == 'map.index') class='active-menu'
           @endif href="{{ route('map.index') }}"><i class="fa fa-table"></i>Map</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin', 'Pengunjung']))
    <li>
        <a @if(Route::current()->action['as'] == 'event.index') class='active-menu'
           @endif href="{{ route('event.index') }}"><i class="fa fa-table"></i>Event</a>
    </li>
@endif
