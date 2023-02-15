@extends('layouts.app')

@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Nama</th>
            <th>No Hp</th>
            <th>Alamat</th>
            <th class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($pemasok as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->nama }}</td>
                <td>{{ $item->no_hp }}</td>
                <td>{{ $item->alamat }}</td>

                <td class="text-center">
                    <a class="label label-primary"
                       href="{{ url('/pemasok/' . $item->id . '/edit') }}">Edit</a>
                    <form action="{{ url('/pemasok' . '/' . $item->id) }}"
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
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        const locationHrefHapusSemua = "{{ url('pemasok/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('pemasok/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('pemasok/create') }}";
        var columnOrders = [{{ $pemasok_count }}];
        var urlSearch = "{{ url('pemasok') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection