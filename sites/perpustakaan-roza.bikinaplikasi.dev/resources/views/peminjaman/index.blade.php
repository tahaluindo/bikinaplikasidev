@extends('layouts.app3')

@section('content')
    <div class="container-fluid card">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap mt-3">
                    <h2 class="title-1">Peminjaman</h2>
                </div>
            </div>
        </div>

        <div class="row ">
            <div class="col-lg-12  mt-3">
                <div class="table-responsive m-b-40">
                    <table class="table" id='dataTable'>
                            <thead>
                            <tr>
                                <th width=2>#</th>
                                <th>Anggota Id</th>
                                <th>User Petugas Id</th>
                                <th>Tanggal</th>
                                <th>Tanggal Pengembalian</th>
                                <th>Status</th>
                                <th class="text-center">Aksi</th>
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

                                    <td class="text-center">
                                        @if(now()->lte(\Carbon\Carbon::parse($item->tanggal_pengembalian)) && (now()->diffInDays(Carbon\Carbon::parse($item->tanggal_pengembalian)) <= env('APP_MIN_HARI_KIRIM_PEMBERITAHUAN')) && $item->status == 'Berlangsung')
                                            <a class="badge badge-success"
                                               href="{{ str_replace('#no_telepon#', $item->anggota->no_telepon, env('APP_LINK_WA_PEMBERITAHUAN')) }}">Kirim
                                                Pemberitahuan</a>
                                        @endif

                                        <a class="badge badge-info" href="{{ url('/peminjaman/' . $item->id) }}">Detail
                                            / Pengembalian</a>
                                        <a class="badge badge-primary"
                                           href="{{ url('/peminjaman/' . $item->id . '/edit') }}">Edit</a>
                                        <form action="{{ url('/peminjaman' . '/' . $item->id) }}" method='post'
                                              style='display: inline;'
                                              onsubmit="return confirm('Yakin akan menghapus data ini?')">
                                            @method('DELETE')
                                            @csrf
                                            <label class="badge badge-danger" href="" for='btnSubmit-{{ $item->id }}'
                                                   style='cursor: pointer;'>Hapus</label>
                                            <button type="submit" id='btnSubmit-{{ $item->id }}'
                                                    style="display: none;"></button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                </div>
            </div>

        </div>
    </div>

    <script>
        const locationHrefHapusSemua = "{{ url('peminjaman/hapus_semua') }}?anggota_id={{ request('anggota_id') }}";
        const locationHrefAktifkanSemua = "{{ url('peminjaman/aktifkan_semua') }}?anggota_id={{ request('anggota_id') }}";
        const locationHrefCreate = "{{ url('peminjaman/create') }}?anggota_id={{ request('anggota_id') }}";
        var columnOrders = [{{ $peminjaman_count }}];
        var urlSearch = "{{ url('peminjaman') }}?anggota_id={{ request('anggota_id') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection
