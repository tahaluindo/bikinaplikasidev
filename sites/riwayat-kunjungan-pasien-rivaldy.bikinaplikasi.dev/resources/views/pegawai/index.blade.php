@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>User Id</th><th>Nama</th><th>Tanggal Lahir</th><th>Alamat</th><th>Jenis Kelamin</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pegawai as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->user->name }}</td><td>{{ $item->nama }}</td><td>{{ $item->tanggal_lahir }}</td><td>{{ $item->alamat }}</td><td>{{ $item->jenis_kelamin }}</td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/pegawai/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/pegawai' . '/' . $item->id) }}"
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
    const locationHrefHapusSemua = "{{ url('pegawai/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('pegawai/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('pegawai/create') }}";
    var columnOrders = [{{ $pegawai_count }}];
    var urlSearch = "{{ url('pegawai') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection