<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cetak Kartu Anggota</title>
</head>
<body>

<div class="" style="width: 360px; border-radius: 16px; border: 1px solid grey; height: 265px; padding: 10px;">
    <div style="border-bottom: 1px solid grey; height: 50px;">
        <img src="{{ url('image/logo.png') }}" height="40" style="float: left;">
        <h3 style="text-align: center; margin-bottom: 0px; margin-top: 0px;">Kartu Anggota Perpustakaan</h3>
        <h4 style="text-align: center; margin-top: 10px;">{{ env('APP_OBJECT_NAME') }}</h4>
    </div>

    <div style="margin-top: 10px;">
        <table>
            <tbody>
            <tr>
                <th style="text-align: left">Nama</th>
                <th>:</th>
                <td>{{ $anggota->nama }}</td>
            </tr>

            <tr>
                <th style="text-align: left">Id Anggota</th>
                <th>:</th>
                <td>{{ $anggota->no_identitas }}</td>
            </tr>

            <tr>
                <th style="text-align: left"> Jenis Kelamin</th>
                <th>:</th>
                <td>{{ $anggota->jenis_kelamin }}</td>
            </tr>

            <tr>
                <th style="text-align: left">Alamat</th>
                <th>:</th>
                <td>{{ $anggota->alamat }}</td>
            </tr>
            </tbody>
        </table>
    </div>

    <div>
        <div style="width: 40%; float: right; margin-top: 10px;">
            <strong>{{ env('APP_OBJECT_LOCATION') }}, {{ date("d-m-Y") }}</strong>
            <div style="margin-top: 4px;">Kepala Perpustakaan</div>
            <div style="margin-top: 50px;"></div>
            <strong>{{ env('APP_OBJECT_SIGNATURE') }}</strong>
        </div>
    </div>


</div>

<script>
    setTimeout(() => {
        print();
        close();
    }, 2000);
</script>

</body>
</html>
