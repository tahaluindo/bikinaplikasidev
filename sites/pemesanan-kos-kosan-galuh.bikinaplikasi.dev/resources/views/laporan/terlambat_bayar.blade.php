@extends('layouts.index')

@section('content')

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <div class='row'>
                    <div class='col-md-6 col-sm-6 col-xs-6'>
                        <h2>Laporan Terlambat Bayar</h2>
                    </div>

                    <div class='col-md-6 col-sm-6 col-xs-6'>
                        <form class="right" action="{{ route('showFromPeriode') }}" method="post">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <div class="form-group">
                                        <div>
                                            <label for="bulan">Periode: </label>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="month" name="bulan" id='bulan' value='{{ Request::input('bulan') ?? date('Y-m') }}' class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                                    <button type="submit" class="btn btn-primary btn-lg m-l-15 waves-effect">Go</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                </h2>
                <ul class="header-dropdown m-r--5">

                </ul>
            </div>
            <div class="body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Penyewa</th>
                                <th>Tanggal Sewa</th>
                                <th>Jatuh Tempo</th>
                                <th>Terlambat</th>
                                <th>Keterangan</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($datas as $data)
                            {{--terlambat--}}
                            @php
                                $data->terlambat = Carbon\Carbon::parse($data->jatuh_tempo)->diffForHumans();
                            @endphp

                            <tr>
                                <td><b>{{ $loop->iteration }}</b></td>
                                <td>{{ $data->penyewa->nama }}</td>
                                <td>{{ $data->terakhir_bayar }}</td>
                                <td>{{ date('Y-m-d h:i:s A', strtotime($data->jatuh_tempo)) }}</td>
                                <td class='text-danger'>{{ $data->terlambat }}</td>
                                <td>{{ $data->keterangan }}</td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- #END# Exportable Table -->

<script type="text/javascript">

    var exportOptions = {
        columns: [0,1,2,3,4]
    };
</script>

@endsection
