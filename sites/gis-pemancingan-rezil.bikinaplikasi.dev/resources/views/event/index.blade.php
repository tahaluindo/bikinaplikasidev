@extends('layouts.app')

@section('content')
    @if(auth()->user()->level == 'Pengunjung')
        <a href="{{ route('event.create') }}" class="btn btn-primary">Tambah</a>
    @endif
    <p>
    
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Map</th>
            <th>User Penyelenggara</th>
            <th>Nama</th>
            <th>Deskripsi</th>
            <th>Dari Tanggal</th>
            <th>Sampai Tanggal</th>
            <th>Status</th>
            <th>Gambar</th>
            @if(auth()->user()->level == 'Admin')
                <th class="text-center">Aksi</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($event as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->map->nama }}</td>
                <td>{{ $item->map->user->name }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->dari_tanggal }}</td>
                <td>{{ $item->sampai_tanggal }}</td>
                <td>{{ $item->status }}</td>
                <td>
                    @if($item->gambar)
                        <a href="{{ url($item->gambar) }}">
                            <img src="{{ url($item->gambar) }}" width="50" height="50">
                        </a>
                    @endif
                </td>

                @if(auth()->user()->level == 'Admin')
                    <td class="text-center">
                        <a class="label label-primary"
                           href="{{ url('/event/' . $item->id . '/edit') }}">Edit</a>
                        <form action="{{ url('/event' . '/' . $item->id) }}"
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
            const locationHrefHapusSemua = "{{ url('event/hapus_semua') }}";
            const locationHrefAktifkanSemua = "{{ url('event/aktifkan_semua') }}";
            const locationHrefCreate = "{{ url('event/create') }}";
            var columnOrders = [{{ 0 }}];
            var urlSearch = "{{ url('event') }}";
            var q = "{{ $_GET['q'] ?? '' }}";
            var placeholder = "Filter...";
            var tampilkan_buttons = true;
            var button_manual = true;
        </script>
    @endif
@endsection