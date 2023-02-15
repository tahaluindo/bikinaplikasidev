@extends('layouts.app2')

@section('content')
    <div class="content-header sty-one">
        <h1>Peminjaman</h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><i class="fa fa-angle-right"></i> Peminjaman</li>
        </ol>
    </div>

    <div class="content">
        <div class="row">

            <div class="col-xl-12">
                <div class="info-box">
                    <div class="table-responsive">
                        <table class="table" id='dataTable'>
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Anggota Id</th>
                                <th>User Petugas Id</th>
                                <th>Tanggal</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                                @if(!in_array(auth()->user()->level, ['Siswa', 'Guru']))
                                    <th class="text-center">Aksi</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($peminjaman as $item)
                                <tr data-id='{{ $item->id }}'>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>

                                    <td>{{ $item->anggota->nama }}</td>
                                    <td>{{ $item->user_petugas->name }}</td>
                                    <td>{{ $item->tanggal }}</td>
                                    <td>{{ $item->tanggal_pengembalian }}</td>
                                    <td>{{ $item->status  }}</td>

                                    @if(!in_array(auth()->user()->level, ['Siswa', 'Guru']))
                                        <td class="text-center">
                                            @if(now()->lte(\Carbon\Carbon::parse($item->tanggal_pengembalian)) && (now()->diffInDays(Carbon\Carbon::parse($item->tanggal_pengembalian)) <= env('APP_MIN_HARI_KIRIM_PEMBERITAHUAN')) && $item->status == 'Berlangsung')
                                                <a class="badge badge-success"
                                                   href="{{ str_replace('#no_telepon#', $item->anggota->no_telepon, env('APP_LINK_WA_PEMBERITAHUAN')) }}">Kirim
                                                    Pemberitahuan</a>
                                            @endif

                                            <a class="badge badge-warning"
                                               href="{{ url("/peminjaman/cetak/$item->id") }}" target="_blank">Cetak</a>

                                            <a class="badge badge-info" href="{{ url('/peminjaman/' . $item->id) }}">Detail
                                                / Pengembalian</a>
                                            <a class="badge badge-primary"
                                               href="{{ url('/peminjaman/' . $item->id . '/edit') }}">Edit</a>
                                            <form action="{{ url('/peminjaman' . '/' . $item->id) }}" method='post'
                                                  style='display: inline;'
                                                  onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                                @method('DELETE')
                                                @csrf
                                                <label class="badge badge-danger" href=""
                                                       for='btnSubmit-{{ $item->id }}'
                                                       style='cursor: pointer;'>Hapus</label>
                                                <button type="submit" id='btnSubmit-{{ $item->id }}'
                                                        style="display: none;"></button>
                                            </form>
                                        </td>
                                    @endif
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "{{ url('peminjaman/hapus_semua') }}?anggota_id={{ request('anggota_id') }}";
        const locationHrefAktifkanSemua = "{{ url('peminjaman/aktifkan_semua') }}?anggota_id={{ request('anggota_id') }}";
        const locationHrefCreate = "{{ url('peminjaman/create') }}?anggota_id={{ request('anggota_id') }}";
        var columnOrders = [{{ $peminjaman_count - 2 }}];
        var urlSearch = "{{ url('peminjaman') }}?anggota_id={{ request('anggota_id') }}";
        var q = "{{ $_GET['q'] ?? '' }}?anggota_id={{ request('anggota_id') }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;

        @if(in_array(auth()->user()->level, ['Siswa', 'Guru']))
        var tampilkan_buttons = false;
        var button_manual = false;
        @endif
    </script>
@endsection

