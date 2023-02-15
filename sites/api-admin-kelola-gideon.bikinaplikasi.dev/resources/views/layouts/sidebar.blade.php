@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'user.index') class='active-menu'
           @endif href="{{ route('user.index') }}"><i class="fa fa-table"></i>User</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'berita.index') class='active-menu'
           @endif href="{{ route('berita.index') }}"><i class="fa fa-table"></i>Berita</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'berita-kategori.index') class='active-menu'
           @endif href="{{ route('berita-kategori.index') }}"><i class="fa fa-table"></i>Berita Kategori</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'bible.index') class='active-menu'
           @endif href="{{ route('bible.index') }}"><i class="fa fa-table"></i>Bible</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'bible.index') class='active-menu'
           @endif href="{{ route('bible.index') }}"><i class="fa fa-table"></i>Bible Reading</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin', 'Pendeta']))
    <li>
        <a @if(Route::current()->action['as'] == 'care-group.index') class='active-menu'
           @endif href="{{ route('care-group.index') }}"><i class="fa fa-table"></i>Care group</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'care-group-kategori.index') class='active-menu'
           @endif href="{{ route('care-group-kategori.index') }}"><i class="fa fa-table"></i>Care group kategori</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'care-group-lokasi.index') class='active-menu'
           @endif href="{{ route('care-group-lokasi.index') }}"><i class="fa fa-table"></i>Care group lokasi</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'care-group-pertanyaan.index') class='active-menu'
           @endif href="{{ route('care-group-pertanyaan.index') }}"><i class="fa fa-table"></i>Care group pertanyaan</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin', 'Pendeta']))
    <li>
        <a @if(Route::current()->action['as'] == 'care-group-user.index') class='active-menu'
           @endif href="{{ route('care-group-user.index') }}"><i class="fa fa-table"></i>Care group user</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'care-group-video.index') class='active-menu'
           @endif href="{{ route('care-group-video.index') }}"><i class="fa fa-table"></i>Care group video</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'ebook.index') class='active-menu'
           @endif href="{{ route('ebook.index') }}"><i class="fa fa-table"></i>E-book</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'ebook-kategori.index') class='active-menu'
           @endif href="{{ route('ebook-kategori.index') }}"><i class="fa fa-table"></i>E-book Kategori</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'bible-reading.index') class='active-menu'
           @endif href="{{ route('bible-reading.index') }}"><i class="fa fa-table"></i>Bible Reading</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'gereja.index') class='active-menu'
           @endif href="{{ route('gereja.index') }}"><i class="fa fa-table"></i>Gereja</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin', 'Pendeta']))
    <li>
        <a @if(Route::current()->action['as'] == 'gerejaku.index') class='active-menu'
           @endif href="{{ route('gerejaku.index') }}"><i class="fa fa-table"></i>Gerejaku</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'gerejaku-kategori.index') class='active-menu'
           @endif href="{{ route('gerejaku-kategori.index') }}"><i class="fa fa-table"></i>Gerejaku Kategori</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin', 'Pendeta']))
    <li>
        <a @if(Route::current()->action['as'] == 'jemaat.index') class='active-menu'
           @endif href="{{ route('jemaat.index') }}"><i class="fa fa-table"></i>Jemaat</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'lagu-sion.index') class='active-menu'
           @endif href="{{ route('lagu-sion.index') }}"><i class="fa fa-table"></i>Lagu Sion</a>
    </li>
@endif

@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'pendeta.index') class='active-menu'
           @endif href="{{ route('pendeta.index') }}"><i class="fa fa-table"></i>Pendeta</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'renungan.index') class='active-menu'
           @endif href="{{ route('renungan.index') }}"><i class="fa fa-table"></i>Renungan</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'renungan-kategori.index') class='active-menu'
           @endif href="{{ route('renungan-kategori.index') }}"><i class="fa fa-table"></i>Renungan Kategori</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'settings.index') class='active-menu'
           @endif href="{{ route('settings.index') }}"><i class="fa fa-table"></i>Settings</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'slider.index') class='active-menu'
           @endif href="{{ route('slider.index') }}"><i class="fa fa-table"></i>Slider</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'slider.index') class='active-menu'
           @endif href="{{ route('sekolah-sabat.index') }}"><i class="fa fa-table"></i>Sekolah Sabat</a>
    </li>
@endif
{{--@if(in_array(auth()->user()->level, ['Admin']))--}}
{{--    <li>--}}
{{--        <a @if(Route::current()->action['as'] == 'tentang.index') class='active-menu'--}}
{{--           @endif href="{{ route('tentang.index') }}"><i class="fa fa-table"></i>Tentang</a>--}}
{{--    </li>--}}
{{--@endif--}}
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'user.index') class='active-menu'
           @endif href="{{ route('user.index') }}"><i class="fa fa-table"></i>User</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'video.index') class='active-menu'
           @endif href="{{ route('video.index') }}"><i class="fa fa-table"></i>Video</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'video-kategori.index') class='active-menu'
           @endif href="{{ route('video-kategori.index') }}"><i class="fa fa-table"></i>Video kategori</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'we-care.index') class='active-menu'
           @endif href="{{ route('we-care.index') }}"><i class="fa fa-table"></i>We Care</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'we-care-hero.index') class='active-menu'
           @endif href="{{ route('we-care-hero.index') }}"><i class="fa fa-table"></i>We Care Hero</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'we-care-kategori.index') class='active-menu'
           @endif href="{{ route('we-care-kategori.index') }}"><i class="fa fa-table"></i>We Care Kategori</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'we-care-slider.index') class='active-menu'
           @endif href="{{ route('we-care-slider.index') }}"><i class="fa fa-table"></i>We Care Slider</a>
    </li>
@endif
@if(in_array(auth()->user()->level, ['Admin']))
    <li>
        <a @if(Route::current()->action['as'] == 'qrcode.index') class='active-menu'
           @endif href="{{ route('qrcode.index') }}"><i class="fa fa-table"></i>Qr Code</a>
    </li>
@endif