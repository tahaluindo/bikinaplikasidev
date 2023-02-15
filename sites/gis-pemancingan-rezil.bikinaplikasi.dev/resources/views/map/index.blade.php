@extends('layouts.app')

@section('content')
    <a href="{{ route('map.persebaran') }}" class="btn btn-primary">Lihat Titik Lokasi</a>

    @if(auth()->user()->level == 'Pengunjung')
        <a href="{{ route('map.create') }}" class="btn btn-primary">Tambah</a>
    @endif
    <p>

    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Jenis</th>
            <th>User</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th>Lat</th>
            <th>Lng</th>
            <th>Status</th>
            <th>Range Harga</th>
            <th>Gambar</th>
            @if(auth()->user()->level == 'Admin')
                <th class="text-center">Aksi</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($map as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->jenis->nama }}</td>
                <td>{{ $item->user->name }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->alamat }}</td>
                <td>{{ $item->lat }}</td>
                <td>{{ $item->lng }}</td>
                <td>{{ $item->status }}</td>
                <td>{{ $item->range_harga }}</td>
                <td>
                    @if($item->gambars)
                        @foreach(json_decode($item->gambars) as $itemGambar)
                            <a href="{{ url($itemGambar) }}">
                                <img src="{{ url($itemGambar) }}" width="50" height="50">
                            </a>
                        @endforeach
                    @endif
                </td>

                @if(auth()->user()->level == 'Admin')
                    <td class="text-center">
                        <a class="label label-primary"
                           href="{{ url('/map/' . $item->id . '/edit') }}">Edit</a>
                        <form action="{{ url('/map' . '/' . $item->id) }}"
                              method='post' style='display: inline;'
                              onsubmit="return confirm('Yakin akan menghapus data ini?')">
                            @method('DELETE')
                            @csrf
                            <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
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

    @if(auth()->user()->level == 'Admin')
        <script>
            const locationHrefHapusSemua = "{{ url('map/hapus_semua') }}";
            const locationHrefAktifkanSemua = "{{ url('map/aktifkan_semua') }}";
            const locationHrefCreate = "{{ url('map/create') }}";
            var columnOrders = [{{ 0 }}];
            var urlSearch = "{{ url('map') }}";
            var q = "{{ $_GET['q'] ?? '' }}";
            var placeholder = "Filter...";
            var tampilkan_buttons = true;
            var button_manual = true;
        </script>
    @endif
@endsection