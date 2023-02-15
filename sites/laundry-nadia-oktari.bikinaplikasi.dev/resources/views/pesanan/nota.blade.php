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
        @if(property_exists($pesanan, 'pelanggan'))
            <p>Nama : {{ $pesanan->pelanggan->nama }} <br>
                Alamat : {{ $pesanan->pelanggan->alamat }} </p>
        @endif
    </div>
    <div class="col-sm-6 col-xs-6">
        <p>Tgl Terima : {{ $pesanan->dipesan_pada }} <br>
            Tgl Ambil : {{ $pesanan->diambil_pada }} </p>
    </div>
</div>
<hr>
<p>No. Transaksi : {{ $pesanan->no }}</p>
<p>

    <strong>{{ $pesanan->paket->nama }}</strong>

<div>
    <p style="float:right">Total Bayar (Rp) : {{ toIdr($pesanan->total) }}</p>
</div>
<div class="">
    <p>Total Berat : {{ $pesanan->jumlah }} {{ $pesanan->paket->satuan }}</p>
    <p>Diskon (Rp): {{ $pesanan->diskon }}</p>
</div>

<p>
    @if(property_exists($pesanan, 'user'))
        <strong>Penginput: {{ $pesanan->user ? $pesanan->user->name : "" }}</strong><br>
    @else
        <strong>Penginput: {{ auth()->user()->name }}</strong><br>
    @endif
    <strong>NB: </strong>Apabila tanggal pemberitahuan barang tidak diambil akan dikenakan biaya admin

</body>

<script>
    window.print();
    window.close();
</script>

</html>
