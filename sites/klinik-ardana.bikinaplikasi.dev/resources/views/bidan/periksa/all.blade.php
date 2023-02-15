@extends('bidan.layout.app2')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Periksa
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Periksa</a></li>
            </ol>

        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <p>Data Rekam Medic Semua
                            </p>

                            <div class="row justify-content-between" style="margin-bottom: 10px;">

                                <div class="col-sm-12">
                                    <form method="POST" action="{{ url('bidan/periksa/all/cari') }}"
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
                                        <th>Tanggal Periksa</th>
                                        <th>Nama</th>
                                        <th>Pemeriksa</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Alergi Obat</th>
                                        <th>Gejala</th>
                                        <th>Status Periksa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($periksa as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item['created_at'])->format('d/m/Y') }}
                                            </td>
                                            <td>{{ $item['pasien']['nama'] }}</td>
                                            <td>{{ $item['bidan']['nama'] }}</td>
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

        <footer><p>Copyright © 2021 {{ env('APP_NAME') }}. All right reserved.

        </footer>
    </div>
    </div>
@endsection

@section('script')

    <!-- Select2 -->
    <script src="{{ asset('assets') }}/plugins/select2/js/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="{{ asset('assets') }}/plugins/moment/moment.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/inputmask/min/jquery.inputmask.bundle.min.js"></script>

    <script>
        $(function () {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            //Datemask dd/mm/yyyy
            $('#datemask').inputmask('dd/mm/yyyy', {
                'placeholder': 'dd/mm/yyyy'
            })

            $('[data-mask]').inputmask()

        })
    </script>
@endsection
