<!-- Bootstrap core CSS -->
<link href="{{ asset('dist/css/bootstrap.css') }}" rel="stylesheet">

<!-- Bootstrap 4 -->
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>

<style>
    *{ color-adjust: exact !important; -webkit-print-color-adjust: exact !important; print-color-adjust: exact !important; }
</style>

<main role="main">
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive">
                <table id="dataTables" class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Pelanggan</th>
                        <th>Barang</th>
                        <th>Total Berat</th>
                        <th>Ongkir</th>
                        <th>Qty</th>
                        <th>Harga Satuan</th>
                        <th>Total</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($data['parse']->count() == 0)
                    <tr>
                        <td colspan="8"> No Data </td>
                    </tr>
                    @else
                    @foreach ($data['parse'] as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->penjualan->tanggal}}</td>
                        <td>{{$item->penjualan->user->name}}</td>
                        <td>{{$item->product->name}}</td>
                        <td>{{number_format($item->penjualan->total_berat, 0, ',', '.')}}g</td>
                        <td>Rp{{number_format($item->penjualan->ongkir, 0, ',', '.')}}</td>
                        <td>{{$item->qty}}</td>
                        <td>Rp{{number_format($item->harga_satuan, 0, ',', '.')}}</td>
                        <td>Rp{{number_format($item->harga_total, 0, ',', '.')}}</td>
                        @if($item->penjualan->status == "Selesai")
                        <td><span class='badge badge-success'>{{ $item->penjualan->status }}</span></td>
                        @else
                        <td>{{ $item->penjualan->status }}</td>
                        @endif
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    print();
</script>