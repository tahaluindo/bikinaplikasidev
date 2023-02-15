@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Pasien Id</th><th>Penyakit Id</th><th>Catatan</th><th>Tanggal Berobat</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($riwayat_berobat as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->pasien->nama }}</td>
            <td>
                <a href='{{ route('saran-obat.index') }}?penyakit_id={{ $item->penyakit_id }}'>
                    {{ $item->penyakit->nama }}
                </a>
            </td>
            <td>{{ $item->catatan }}</td>
            <td>{{ $item->tanggal_berobat }}</td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/riwayat-berobat/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/riwayat-berobat' . '/' . $item->id) }}"
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
    const locationHrefHapusSemua = "{{ url('riwayat_berobat/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('riwayat_berobat/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('riwayat_berobat/create') }}";
    var columnOrders = [{{ $riwayat_berobat_count }}];
    var urlSearch = "{{ url('riwayat_berobat') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection