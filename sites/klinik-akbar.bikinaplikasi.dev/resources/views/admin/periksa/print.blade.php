<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Print</title>
    <link rel="stylesheet" href="{{asset('assets')}}/dist/css/adminlte.min.css">

</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col mt-3" style="max-width: 375px">
                <div class="media">
                    <a class="d-flex mr-2" href="#">
                        <img src="{{ asset('image/logo.png') }}" alt="">
                    </a>
                    <div class="media-body">
                        <span class="d-block" style="font-weight: bold">PUSKESMAS KEBUN KOPI JAMBI</span>
                        <span class="d-block" style="font-size: 12px;"> Jl.AR Shaleh No.103 RT.09 Kel.Paal Merah. Kota
                            Jambi</span>
                        <span class="d-block" style="font-size: 12px;">
                            Telp : 085384040987 &bull; 081274400414
                        </span>
                    </div>
                </div>
                <hr style="border: 2px red solid">
            </div>
        </div>
        <div class="row">
            <div class="col text-center" style="font-size: 16px;font-weight: bold;">
                <div>Kartu Rawat Jalan</div>
                <div>Kode Periksa : PR-{{ $periksa['id'] }} </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-6">
                <table>
                    <tbody style="font-size: 14px">
                        <tr>
                            <td>Nama</td>
                            <td>&ensp;: {{ $periksa['pasien']['nama'] }} </td>
                        </tr>
                        <tr>
                            <td>Tanggal Lahir</td>
                            <td>&ensp;:
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $periksa['pasien']['tanggal_lahir'])->format('d/m/Y') }}
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>&ensp;: {{ $periksa['pasien']['alamat'] }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-6">
                <table>
                    <tbody style="font-size: 14px">
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>&ensp;:
                                @if(strtolower($periksa['pasien']['jenis_kelamin']) == 'l')
                                Laki-Laki
                                @else
                                Perempuan
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>Alergi Obat</td>
                            <td>&ensp;: {{ $periksa['pasien']['alergi_obat'] }}
                            </td>
                        </tr>
                        <tr>
                            <td>No Handphone</td>
                            <td>&ensp;: {{ $periksa['pasien']['tlpn'] }} </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col">
                <table class="table table-sm table-bordered">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Diagnosa</th>
                            <th>Obat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="125px">
                                {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $periksa['created_at'])->format('d/m/Y') }}
                            </td>
                            <td>
                                @php
                                $diagnosa = $periksa['diagnosa'];
                                $diagnosa = explode(',',$diagnosa);
                                @endphp
                                @foreach ($diagnosa as $item)
                                <div>{{$item}}</div>
                                @endforeach
                            </td>
                            <td>
                                @php
                                $obat = $periksa['obat'];
                                $obat = explode(',',$obat);
                                @endphp
                                @foreach ($obat as $item)
                                <div>{{$item}}</div>
                                @endforeach
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        {{-- <div class="row">
            <div class="col-6">
                <div class="text-lg font-weight-bold">Penyakit</div>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm">
                        <tbody>
                            @php
                            $diagnosa = $periksa['diagnosa'];
                            $diagnosa = explode(',',$diagnosa);
                            @endphp
                            @foreach ($diagnosa as $item)
                            <tr>
                                <td>{{ $item }}</td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
    </div>
    <div class="col-6">
        <div class="text-lg font-weight-bold">Obat</div>
        <div class="table-responsive">
            <table class="table table-sm table-bordered">
                <tbody>
                    @php
                    $obat = $periksa['obat'];
                    $obat = explode(',',$obat);
                    @endphp
                    @foreach ($obat as $item)
                    <tr>
                        <td>{{ $item }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    </div> --}}
    <div class="row">
        <div class="col text-right pr-3 border">
            <div style="font-size: 16px;font-weight:bold;">Biaya Periksa : Rp.{{ $periksa['biaya'] }}</div>
        </div>
    </div>
    </div>
</body>

</html>