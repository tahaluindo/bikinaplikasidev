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
    <h3>Nota Peminjaman Buku</h3>
    <h3>Hp : {{ env('APP_OBJECT_PHONE') }}</h3>
</center>
<hr>

<div class="row">
    <div class="col-sm-6 col-xs-6">
        <p>Nama : {{ $anggota->nama }} <br>
            Jenis Kelamin : {{ $anggota->jenis_kelamin }} <br>
            Alamat : {{ $anggota->alamat }} <br>
            No Telpon : {{ $anggota->no_telpon }} <br>
            Status : {{ $anggota->status }} <br>
    </div>
    <div class="col-sm-6 col-xs-6">
        <p>Tgl Terima : {{ $peminjaman->tanggal }} <br>
            Tgl Harus Dikembalikan : {{ $peminjaman->tanggal_pengembalian }} </p>
    </div>
</div>
<hr>
<p>No. Order : {{ $peminjaman->id }}</p>
<p>

<table>
    <thead>
        <tr>
            <th>NO.</th>
            <th>Buku</th>
        </tr>
    </thead>

    <tbody>
        @foreach($peminjaman->detail_peminjaman as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->buku->judul }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div>
    <p style="float:right">Total Buku : {{ $peminjaman->detail_peminjaman->count() }}</p>
</div>

</body>

<script>
    setTimeout(() => {
        window.print();
        window.close();
    }, 3000);
</script>

</html>
