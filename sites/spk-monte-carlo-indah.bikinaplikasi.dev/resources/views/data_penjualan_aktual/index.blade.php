@extends('layouts.app')

@section('content')
<table class="table" id='dataTable'>
    <thead>
        <tr>
            <th width=2>No</th>
            <th>Tahun</th>
            <th>Bulan</th>
            <th>Nama</th>
            <th>Volume</th>
            <th>Harga Per Kg</th>
            <th>Nilai (Rp)</th>
            <th class="text-center">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data_penjualan_aktual as $item)
            @foreach ($item->data_penjualan_aktual_details as $data_penjualan_aktual_detail)

                <tr data-id='{{ $data_penjualan_aktual_detail->id }}'>
                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>{{ $item->tahun->tahun }}</td>
                    <td>{{ $data_penjualan_aktual_detail->bulan }}</td>
                    <td>{{ $item->produk->nama }}</td>
                    <td>{{ number_format($data_penjualan_aktual_detail->volume, 2, ',', '.') }}</td>
                    <td>{{ toIdr($data_penjualan_aktual_detail->harga_per_kg) }}</td>
                    <td>{{ toIdr($data_penjualan_aktual_detail->nilai) }}</td>

                    <td class="text-center">
                        <a class="label label-primary"
                            href="{{ url('/data_penjualan_aktual/' . $item->id . '/edit') }}">Edit</a>
                        <form action="{{ url('/data_penjualan_aktual' . '/' . $data_penjualan_aktual_detail->id) }}"
                            method='post' style='display: inline;'
                            onsubmit="return confirm('Yakin akan menghapus data ini?')">
                            @method('DELETE')
                            @csrf
                            <label class="label label-danger" href="" for='btnSubmit-{{ $data_penjualan_aktual_detail->id }}'
                                style='cursor: pointer;'>Hapus</label>
                            <button type="submit" id='btnSubmit-{{ $data_penjualan_aktual_detail->id }}'
                                style="display: none;"></button>
                        </form>
                    </td>
                </tr>
            @endforeach
        @endforeach
    </tbody>
</table>

<script>
    const locationHrefHapusSemua = "{{ url('data_penjualan_aktual/hapus_semua') }}";
    const locationHrefAktifkanSemua = "{{ url('data_penjualan_aktual/aktifkan_semua') }}";
    const locationHrefCreate = "{{ url('data_penjualan_aktual/create') }}";
    var columnOrders = [{{ $data_penjualan_aktual_count }}];
    var urlSearch = "{{ url('data_penjualan_aktual') }}";
    var q = "{{ $_GET['q'] ?? '' }}";
    var placeholder = "Filter...";
    var tampilkan_buttons = true;
    var button_manual = true;
</script>
@endsection