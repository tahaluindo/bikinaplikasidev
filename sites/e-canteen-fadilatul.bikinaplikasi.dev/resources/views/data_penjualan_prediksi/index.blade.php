@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Produk Id</th><th>Tahun Id</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_penjualan_prediksi as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->produk_id }}</td><td>{{ $item->tahun_id }}</td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/data-penjualan-prediksi/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/data-penjualan-prediksi' . '/' . $item->id) }}"
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
    const locationHrefHapusSemua = "{{ url('data_penjualan_prediksi/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('data_penjualan_prediksi/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('data_penjualan_prediksi/create') }}";
    var columnOrders = [{{ $data_penjualan_prediksi_count }}];
    var urlSearch = "{{ url('data_penjualan_prediksi') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection