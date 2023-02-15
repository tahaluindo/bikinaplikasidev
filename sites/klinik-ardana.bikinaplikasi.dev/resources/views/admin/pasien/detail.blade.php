@extends('layout.app2')

@section('content')
    <div id="page-wrapper">
        <div class="header">
            <h1 class="page-header">
                Pasien
            </h1>
            <ol class="breadcrumb">
                <li><a href="{{ url('') }}/">Home</a></li>
                <li><a href="{{ url('') }}/" class="active">Pasien</a></li>
            </ol>

        </div>
        <div id="page-inner">
            <div class="row">
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default">
                        <div class="panel-body">

                            <div class="row">
                                <div class="col-sm-12 col-sm-12 col-md-12 d-flex align-items-stretch">
                                    <div class="panel bg-light shadow border panel-default">
                                        <div class="panel-body p-2">
                                            <div class="table-responsive">
                                                <table>
                                        <tbody>
                                        <tr>
                                            <td>Kode</td>
                                            <td>&ensp;: KD-{{$pasien['id']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>&ensp;: {{$pasien['nama']}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Lahir</td>
                                            <td>&ensp;:
                                                {{ \Carbon\Carbon::createFromFormat('Y-m-d', $pasien['tanggal_lahir'])->format('d/m/Y') }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jenis Kelamin</td>
                                            <td>&ensp;:
                                                @if($pasien['jenis_kelamin'] == 'L')
                                                    Laki-Laki
                                                @else
                                                    Perempuan
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>&ensp;: {{ $pasien['alamat'] }}</td>
                                        </tr>
                                        <tr>
                                            <td>Telepon</td>
                                            <td>&ensp;: {{ $pasien['tlpn'] }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                            </div>
                                        </div>

                                    </div>
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
            $('#datemask').inputmask('dd/mm/yyyy', {'placeholder': 'dd/mm/yyyy'})

            $('[data-mask]').inputmask()

        })
    </script>
@endsection