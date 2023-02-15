@extends('layouts.app')

@section('content')
    <table class="table" id='dataTable'>
        <thead>
        <tr>
            <th width=2>#</th>
            <th>Produk Id</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
            <th class="text-center">Aksi</th>
        </tr>
        </thead>
        <tbody>
        @foreach($penjualan_detail as $item)
            <tr data-id='{{ $item->id }}'>
                <td>
                    {{ $loop->iteration }}
                </td>

                <td>{{ $item->produk->nama }}</td>
                <td>{{ toIdr($item->harga) }}</td>
                <td>{{ $item->jumlah }}</td>
                <td>{{ toIdr($item->total) }}</td>

                <td class="text-center">
                    <a class="label label-primary"
                       href="{{ url('/penjualan-detail/' . $item->id . '/edit') }}">Edit</a>
                    <form
                        action="{{ url('/penjualan-detail' . '/' . $item->id . "?penjualan_id=" . request()->penjualan_id) }}"
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


        <tr>
            <td>
                <strong>Total</strong>
            </td>

            <td></td>
            <td></td>
            <td>{{ $penjualan_detail->sum('jumlah') }}</td>
            <td>{{ toIdr($penjualan_detail->sum('total')) }}</td>

            <td class="text-right">

            </td>
        </tr>
        </tbody>
    </table>

    <script>
        const locationHrefHapusSemua = "{{ url('penjualan-detail/hapus_semua') }}";
        const locationHrefAktifkanSemua = "{{ url('penjualan-detail/aktifkan_semua') }}";
        const locationHrefCreate = "{{ url('penjualan-detail/create') . "?penjualan_id=" . request()->penjualan_id }}";
        var columnOrders = [{{ $penjualan_detail_count  - 1}}];
        var urlSearch = "{{ url('penjualan-detail') }}";
        var q = "{{ $_GET['q'] ?? '' }}";
        var placeholder = "Filter...";
        var tampilkan_buttons = true;
        var button_manual = true;
    </script>
@endsection