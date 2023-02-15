@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'meja.index') @endif href="{{ route('dashboard') }}"><i
                class="fa fa-dashboard"></i>&nbsp;Dashboard</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'user.index') class='active-menu'
           @endif href="{{ route('user.index') }}"><i class="fa fa-table"></i>&nbsp;User</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'anak-asuh.index') class='active-menu'
           @endif href="{{ route('anak-asuh.index') }}"><i class="fa fa-table"></i>&nbsp;Anak Asuh</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'pengurus.index') class='active-menu'
           @endif href="{{ route('pengurus.index') }}"><i class="fa fa-table"></i>&nbsp;Pengurus</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'donatur.index') class='active-menu'
           @endif href="{{ route('donatur.index') }}"><i class="fa fa-table"></i>&nbsp;Donatur</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'pengeluaran.index') class='active-menu'
           @endif href="{{ route('pengeluaran.index') }}"><i class="fa fa-table"></i>&nbsp;Pengeluaran</a>
    </li>
@endif

{{--@if(in_array(auth()->user()->level, ['Admin']))--}}
{{--    <li>--}}
{{--        <a @if(Route::current()->action['as'] == 'buku-tamu.index') class='active-menu'--}}
{{--           @endif href="{{ route('buku-tamu.index') }}"><i class="fa fa-table"></i>&nbsp;Buku Tamu</a>--}}
{{--    </li>--}}
{{--@endif--}}

@if(in_array(auth()->user()->level, ['Admin', 'Ketua']))
    <li class="menu-item-has-children dropdown">
        <a @if(Route::current()->action['as'] == 'laporan.pengeluaran' || Route::current()->action['as'] == 'laporan.pemasukan')
           @endif class='dropdown-toggle' data-toggle="dropdown"><i
                class="fa fa-print"></i>&nbsp;Laporan</a>
        <ul class="sub-menu children dropdown-menu">
            <li><i class="fa fa-dollar-sign"></i><a href="{{ route("laporan.donatur") }}">Donatur</a></li>
            <li><i class="fa fa-money-bill-wave"></i><a href="{{ route("laporan.pengeluaran") }}">Pengeluaran</a></li>
            <li><i class="fa fa-money-bill-wave"></i><a href="{{ route("laporan.anak-asuh") }}">Anak Asuh</a></li>
        </ul>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin', 'Ketua']))
    <li class="menu-item-has-children dropdown">
        <a  class='dropdown-toggle @if(Request::segment(1) == 'pengaturan') active-menu @endif' data-toggle="dropdown"><i
                class="fa fa-gear"></i>&nbsp;Pengaturan</a>
        <ul class="sub-menu children dropdown-menu">
{{--            <li><i class="fa fa-dollar-sign"></i><a href="{{ route("pengaturan.visi") }}">Visi</a></li> --}}
{{--            <li><i class="fa fa-dollar-sign"></i><a href="{{ route("pengaturan.misi") }}">Misi</a></li> --}}
            <li><i class="fa fa-dollar-sign"></i><a href="{{ route("pengaturan.kegiatan-panti") }}">Kegiatan Panti</a></li>
            <li><i class="fa fa-dollar-sign"></i><a href="{{ route("pengaturan.profil") }}">Profil</a></li>
            <li><i class="fa fa-dollar-sign"></i><a href="{{ route("pengaturan.rekening-donasi") }}">Rekening Donasi</a></li>
        </ul>
    </li>
@endif