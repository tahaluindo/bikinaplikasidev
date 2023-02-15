@if(auth()->user()->level == 'Admin')
<li>
    <a @if(Route::current()->action['as'] == 'user.index') class='active-menu' @endif
        href="{{ route('user.index') }}"><i class="fa fa-table"></i>User</a>
</li>
@endif

<li>
    <a @if(Route::current()->action['as'] == 'anggota.index') class='active-menu' @endif
        href="{{ route('anggota.index') }}"><i class="fa fa-table"></i>Anggota</a>
</li>

<li>
    <a @if(Route::current()->action['as'] == 'buku.index') class='active-menu' @endif
        href="{{ route('buku.index') }}"><i class="fa fa-table"></i>Buku</a>
</li>
<li>
    <a @if(Route::current()->action['as'] == 'peminjaman.index') class='active-menu' @endif
        href="{{ route('peminjaman.index') }}"><i class="fa fa-table"></i>Peminjaman</a>
</li>
<li>
    <a @if(Route::current()->action['as'] == 'pengembalian.index') class='active-menu' @endif
        href="{{ route('pengembalian.index') }}"><i class="fa fa-table"></i>Pengembalian</a>
</li>
<li>
    <a href="#"><i class="fa fa-sitemap"></i>Laporan <span class="fa arrow"></span></a>
    <ul class="nav nav-second-level  @if(Request::segment(2) == 'laporan') collapse in @endif">
        
        <li>
            <a @if(Route::current()->action['as'] == 'anggota.laporan.index') class='active-menu' @endif
                href="{{ route('anggota.laporan.index') }}"><i class="fa fa-table"></i>Anggota</a>
        </li>
        <li>
            <a @if(Route::current()->action['as'] == 'buku.laporan.index') class='active-menu' @endif
                href="{{ route('buku.laporan.index') }}"><i class="fa fa-table"></i>Buku</a>
        </li>
        <li>
            <a @if(Route::current()->action['as'] == 'peminjaman.laporan.index') class='active-menu' @endif
                href="{{ route('peminjaman.laporan.index') }}"><i class="fa fa-table"></i>Peminjaman</a>
        </li>
        {{-- <li>
            <a @if(Route::current()->action['as'] == 'detail_peminjaman.laporan.index') class='active-menu' @endif
                href="{{ route('detail_peminjaman.laporan.index') }}"><i class="fa fa-table"></i>Detail Peminjaman</a>
        </li> --}}
        <li>
            <a @if(Route::current()->action['as'] == 'pengembalian.laporan.index') class='active-menu' @endif
                href="{{ route('pengembalian.laporan.index') }}"><i class="fa fa-table"></i>Pengembalian</a>
        </li>
    </ul>
</li>