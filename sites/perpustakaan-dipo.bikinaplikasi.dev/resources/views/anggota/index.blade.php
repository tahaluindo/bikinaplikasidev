@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>No induk</th>
            <th>Nama</th>
            <th>Jenis Kelamin</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>Status</th>
            <th>Dibuat</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($anggota as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->no_induk }}</td>
            <td>{{ $item->nama }}</td>
            <td>{{ $item->jenis_kelamin }}</td>
            <td>{{ $item->alamat }}</td>
            <td>{{ $item->no_telepon }}</td>
            <td>{{ $item->status }}</td>
            <td>{{ \Carbon\Carbon::parse($item->dibuat)->format('d-M-Y') }}</td>

            <td class="text-center">
                <a class="label label-info" href="{{ url("/peminjaman?anggota_id=$item->id") }}">Peminjaman</a>
                <a class="label label-primary" href="{{ url('/anggota/' . $item->id . '/edit') }}">Edit</a>

                <form action="{{ url('/anggota' . '/' . $item->id) }}" method='post' style='display: inline;'
                    onsubmit="return confirm('Yakin akan menghapus data ini?')">
                    @method('DELETE')
                    @csrf
                    <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
                        style='cursor: pointer;'>Hapus</label>
                    <button type="submit" id='btnSubmit-{{ $item->id }}' style="display: none;"></button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    const locationHrefHapusSemua = "{{ url('anggota/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('anggota/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('anggota/create') }}";
    var columnOrders = [{{ $anggota_count }}];
    var urlSearch = "{{ url('anggota') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection