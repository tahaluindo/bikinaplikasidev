<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Struk Transaksi</title>
    <link rel="stylesheet" type="text/css" href="./asset/css/bootstrap.min.css">
    <style media="screen">
        table, th, td, tr {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th, td {
            padding: 5px;
            text-align: left;
        }

        hr {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<center><h1>{{ env('APP_OBJECT_NAME') }}</h1>
    <h3>{{ env('APP_OBJECT_DESCRIPTION') }}</h3>
    <h3>Hp : {{ env('APP_OBJECT_PHONE') }}</h3>
</center>
<hr>

<div class="row">
    <div class="col-sm-6 col-xs-6">
        <p>Nama : {{ isset($penjualan->pelanggan) ? $penjualan->pelanggan->nama: "" }} <br>
            No Hp : {{ isset($penjualan->pelanggan) ? $penjualan->pelanggan->no_hp : "" }} </p>
    </div>
    <div class="col-sm-6 col-xs-6">
        <p>Tanggal : {{ $penjualan->created_at }} <br>
    </div>
</div>
<hr>
<p>No. Order : {{ $penjualan->id }}</p>
<p>
<table>
    <thead>
    <tr>
        <th width=2>#</th>
        <th>Produk Id</th>
        <th>Harga</th>
        <th>Jumlah</th>
        <th>Total</th>
    </tr>
    </thead>
    <tbody>
    @foreach($penjualan->penjualan_details as $item)
        <tr data-id='{{ $item->id }}'>
            <td>
                {{ $loop->iteration }}
            </td>

            <td>{{ $item->produk->nama }}</td>
            <td>{{ toIdr($item->harga) }}</td>
            <td>{{ $item->jumlah }}</td>
            <td>{{ toIdr($item->total) }}</td>

        </tr>
    @endforeach


    <tr>
        <td>
            <strong>Total</strong>
        </td>

        <td></td>
        <td></td>
        <td>{{ $penjualan->penjualan_details->sum('jumlah') }}</td>
        <td>{{ toIdr($penjualan->penjualan_details->sum('total')) }}</td>

        <td class="text-right">

        </td>
    </tr>
    </tbody>
</table>

<div>
    <p style="float:right">Total Bayar (Rp) : {{ toIdr($penjualan->penjualan_details->sum('total')) }}</p>
</div>

</body>

<script>
    window.print();
    window.close();
</script>

</html>
