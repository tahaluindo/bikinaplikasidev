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
                        <th>Kode Barang</th>
                        <th>Deskripsi Barang</th>
                        <th>Status</th>
                        <th>Harga</th>
                        <th>QTY</th>
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
                        <td>{{$item->date}}</td>
                        <td>{{$item->product->code}}</td>
                        <td>{{$item->product->name}}</td>
                        <td>@if($item->type == 'S') <span class="badge badge-danger">{{$item->type == 'S' ? 'Jual':'Beli'}}</span> @elseif($item->type == 'retur_barang') <span class="badge badge-info">{{ $item->type }}</span> @elseif($item->type == 'return_penjualan') <span class="badge badge-warning">{{ $item->type }}</span> @else <span class="badge badge-success">{{$item->type == 'S' ? 'Jual':'Beli'}}</span> @endif </td>
                        <td>Rp{{number_format($item->product->price, 0, ',', '.')}}</td>
                        <td>@if($item->type == 'S'){{$item->qty*-1}}@else{{$item->qty}}@endif</td>
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