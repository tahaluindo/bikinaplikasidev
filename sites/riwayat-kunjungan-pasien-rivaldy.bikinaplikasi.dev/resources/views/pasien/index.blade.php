@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Nama</th><th>Umur</th><th>Alamat</th><th>Jenis Kelamin</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pasien as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->nama }}</td><td>{{ $item->umur }}</td><td>{{ $item->alamat }}</td><td>{{ $item->jenis_kelamin }}</td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/pasien/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/pasien' . '/' . $item->id) }}"
                    method='post' style='display: inline;'
                    onsubmit="return confirm('Yakin akan menghapus data ini?')">
                    @method('DELETE')
                    @csrf
                    <label class="label label-danger" href="" for='btnSubmit-{{ $item->id }}'
                        style='cursor: pointer;'>Hapus</label>
                    <button type="submit" id='btnSubmit-{{ $item->id }}'
                        style="display: none;"></button>
                </form>
                <a class="label label-info"
                    href="{{ url('/riwayat_berobat?pasien_id=' . $item->id) }}">Riwayat Berobat</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
    const locationHrefHapusSemua = "{{ url('pasien/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('pasien/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('pasien/create') }}";
    var columnOrders = [{{ $pasien_count }}];
    var urlSearch = "{{ url('pasien') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection