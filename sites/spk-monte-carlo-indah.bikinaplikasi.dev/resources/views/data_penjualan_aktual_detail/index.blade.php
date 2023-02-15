@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>#</th>
            <th>Detail Penjualan Aktual Id</th><th>Volume Januari</th><th>Volume Februari</th><th>Volume Maret</th><th>Volume April</th><th>Volume Mei</th><th>Volume Juni</th><th>Volume Juli</th><th>Volume Agustus</th><th>Volume September</th><th>Volume Oktober</th><th>Volume November</th><th>Volume Desember</th><th>Harga Per Kg Januari</th><th>Harga Per Kg Februari</th><th>Harga Per Kg Maret</th><th>Harga Per Kg April</th><th>Harga Per Kg Mei</th><th>Harga Per Kg Juni</th><th>Harga Per Kg Juli</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_penjualan_aktual_detail as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->detail_penjualan_aktual_id }}</td><td>{{ $item->volume_januari }}</td><td>{{ $item->volume_februari }}</td><td>{{ $item->volume_maret }}</td><td>{{ $item->volume_april }}</td><td>{{ $item->volume_mei }}</td><td>{{ $item->volume_juni }}</td><td>{{ $item->volume_juli }}</td><td>{{ $item->volume_agustus }}</td><td>{{ $item->volume_september }}</td><td>{{ $item->volume_oktober }}</td><td>{{ $item->volume_november }}</td><td>{{ $item->volume_desember }}</td><td>{{ $item->harga_per_kg_januari }}</td><td>{{ $item->harga_per_kg_februari }}</td><td>{{ $item->harga_per_kg_maret }}</td><td>{{ $item->harga_per_kg_april }}</td><td>{{ $item->harga_per_kg_mei }}</td><td>{{ $item->harga_per_kg_juni }}</td><td>{{ $item->harga_per_kg_juli }}</td>

            <td class="text-center">
                <a class="label label-primary"
                    href="{{ url('/data_penjualan_aktual_detail/' . $item->id . '/edit') }}">Edit</a>
                <form action="{{ url('/data_penjualan_aktual_detail' . '/' . $item->id) }}"
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
    const locationHrefHapusSemua = "{{ url('data_penjualan_aktual_detail/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('data_penjualan_aktual_detail/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('data_penjualan_aktual_detail/create') }}";
    var columnOrders = [{{ $data_penjualan_aktual_detail_count }}];
    var urlSearch = "{{ url('data_penjualan_aktual_detail') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection