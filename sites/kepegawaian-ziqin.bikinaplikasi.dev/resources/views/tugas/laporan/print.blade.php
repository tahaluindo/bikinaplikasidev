<?php date_default_timezone_set('Asia/Jakarta'); ?>
    <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Laporan</title>
    <style>
        table {
            border-collapse: collapse;
        }

        thead > tr {
            background-color: #0070C0;
            color: #f1f1f1;
        }

        thead > tr > th {
            background-color: #0070C0;
            color: #fff;
            padding: 10px;
            border-color: #fff;
        }

        th, td {
            padding: 2px;
            font-size: 12px;
        }

        th {
            color: #222;
        }

        body {
            font-family: Calibri;
        }

        #logo {
            position: absolute;
            right: 0;
            top: 0;
            width: 100px;
            height: 100px;
            margin-right: 20px;
            margin-top: 15px;
        }

        .tanda-tangan {
            margin-top: 500px;
            margin-bottom: 20px;
            position: relative;
            bottom: 0;
            right: 0;
            margin-top: 30px;
        }

        .tanda-tangan div {
            width: 300px;
            text-align: center;
            float: right;
        }

        .tanda-tangan-box {
            height: 80px;
        }

        * {
            color-adjust: exact !important;
            -webkit-print-color-adjust: exact !important;
            print-color-adjust: exact !important;
        }
    </style>
</head>

<body onload="window.print()">

<h2 align='center'>{{ env('OBJECT_NAME') }}</h2>

<img id='logo' src="{{ url('image/logo.png') }}" alt="" style="height: 75px; width: 75px;">

<h3 align="center">LAPORAN TUGAS</h3>

<table width="100%" border="1" style='margin-bottom: 250px;'>
    <thead>
    <tr>
        <th width=3>No.</th>
        <th>Pegawai</th>
        <th>No. Surat Tugas</th>
        <th>Tugas</th>
        <th>Tanggal</th>
        <th>Catatan</th>
    </tr>
    </thead>

    <tbody>
    @foreach($tugass as $tugas)
        <tr>
            <th>{{ $loop->iteration }}.</th>
            <td>{{ $tugas->pegawai->nama }}</td>
            <td>{{ $tugas->nomor_st }}</td>
            <td>{{ $tugas->tugas }}</td>
            <td>{{ $tugas->created_at }}</td>
            <td>{{ $tugas->catatan }}</td>
        </tr>
    @endforeach
    </tbody>
</table>

<div class='tanda-tangan'>
    <div class='tanda-tangan-kanan'>
        <div>Batanghari, Jambi</div>
        <div>{{ date('d-m-Y') }}</div>

        <div class='tanda-tangan-box'>

        </div>

        <div>{{ env('OBJECT_SIGNATURE') }}</div>
    </div>
</div>
</body>
</html>
