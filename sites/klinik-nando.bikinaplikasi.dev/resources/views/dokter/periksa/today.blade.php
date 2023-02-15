@extends('dokter.layout.app2')

@section('content')
    <div class="row">
        <div class="col-lg-8 p-r-0 title-margin-right">
            <div class="page-header">
                <div class="page-title">
                    <h1>Periksa</h1>
                </div>
            </div>
        </div>
        <!-- /# column -->
        <div class="col-lg-4 p-l-0 title-margin-left">
            <div class="page-header">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Periksa</a></li>
                        <li class="active">Home</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- /# column -->
    </div>
    <!-- /# row -->
    <div class="main-content">
        <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>Data Rekam Medic Hari ini<br>Tanggal : {{ \Carbon\Carbon::now()->format('d/m/Y') }}
                            </p>

                            <div class="row justify-content-between" style="margin-bottom: 10px;">

                                <div class="col-sm-12">
                                    <form method="POST" action="{{ url('dokter/periksa/today/cari') }}"
                                          class="form-inline pull-right">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputName2">Kata Kunci</label>
                                            <input name="cari" type="text" class="form-control" placeholder="Cari"
                                                   value="{{ isset($cari) ? $cari : '' }}">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </form>
                                </div>
                            </div>

                            @if (isset($cari))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Pencarian nama dengan kata kunci '{{$cari}}'</p>
                                    </div>
                                </div>
                            @endif
                            @if (empty($periksa))
                                <div class="row">
                                    <div class="col-sm-12">
                                        <p>Data Tidak Ada</p>
                                    </div>
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-hover text-nowrap ">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Nama</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Alergi Obat</th>
                                            <th>Gejala</th>
                                            <th>Status Periksa</th>
                                            <th>Rumah sakit rujukan</th>
                                            <th class="text-right">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($periksa as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item['pasien']['nama'] }}</td>
                                            <td>
                                                @if($item['pasien']['jenis_kelamin'] == 'L')
                                                Laki-Laki
                                                @else
                                                Perempuan
                                                @endif
                                            </td>
                                            <td> {{ $item['pasien']['alergi_obat'] }}</td>
                                            <td>
                                                @php
                                                $gejala = $item['gejala'];
                                                $gejala = explode(',',$gejala);
                                                @endphp
                                                @foreach ($gejala as $item2)
                                                {{-- <ul> --}}
                                                <li style="list-style-type: none">
                                                    <span class="badge badge-danger">{{$item2}}</span>
                                                </li>
                                                {{-- </ul> --}}
                                                @endforeach
                                            </td>
                                            <td>
                                                @if ($item['status_periksa'] == 0)
                                                <span class="badge badge-primary">Menunggu</span>
                                                @elseif ($item['status_periksa'] == 1)
                                                <span class="badge badge-warning">Pengecekan</span>
                                                @elseif($item['status_periksa'] == 2)
                                                <span class="badge badge-success">Selesai</span>
                                                @endif
                                            </td>

                                            <td>
                                                {{ $item['rumah_sakit_rujukan'] }}
                                            </td>

                                            <td class="text-right">
                                                <a class="btn btn-info btn-sm" role="button" onclick="var userAnswer = prompt('Inputkan nama rumah sakit.'); location.href = '?rumah_sakit_rujukan=' + userAnswer + '&periksa_id={{ $item['id'] }}'">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    Rujuk ke rumah sakit</a>

                                                <a class="btn btn-danger btn-sm"
                                                    href="{{ url('dokter/periksa/'. $item['id']) }}" role="button">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                    Periksa</a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
    </div>


@endsection

