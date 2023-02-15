<!-- Bootstrap core CSS -->
<link href="{{ asset('dist/css/bootstrap.css') }}" rel="stylesheet">

<!-- Bootstrap 4 -->
<script src="{{ asset('dist/js/bootstrap.min.js') }}"></script>

<style>
    * {
        color-adjust: exact !important;
        -webkit-print-color-adjust: exact !important;
        print-color-adjust: exact !important;
    }
</style>

<main role="main">
    <div class="container-fluid">
        <div class="row">
            <div class="table-responsive mb-4">
                <table id="dataTables" class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Supplier</th>
                            <th>Kode Barang</th>
                            <th>Deskripsi Barang</th>
                            <th>Harga Satuan</th>
                            <th>Harga Grosiran</th>
                            <th>Stok Minimum</th>
                            <th>Total Stok</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(count($data['parse']) == 0)
                        <tr>
                            <td colspan="9"> No Data </td>
                        </tr>
                        @else
                        @foreach ($data['parse'] as $item)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$item[0]->product->supplier->name}}</td>
                            <td>{{$item[0]->product->code}}</td>
                            <td>{{$item[0]->product->name}}</td>
                            <td>Rp{{number_format($item[0]->product->price, 0, ',', '.')}}</td>
                            <td>Rp{{number_format($item[0]->product->price_grosiran, 0, ',', '.')}}</td>
                            <td>{{$item[0]->product->warn_stock}}</td>
                            <td>{{$item[0]->total_stock()}}</td>
                            <td>
                                @if($item[0]->total_stock() <= $item[0]->product->warn_stock)
                                    <span class="badge badge-danger">Stok Rendah</span>
                                    @else
                                    <span class="badge badge-success">Aman</span>
                                    @endif
                            </td>
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