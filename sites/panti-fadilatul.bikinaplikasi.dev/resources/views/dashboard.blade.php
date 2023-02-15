@extends("layouts/app2")

@section("content")
    <div class="content pb-0">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7f-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">{{ toIdr($donaturs->sum('jumlah')) }}</div>
                                    <div class="stat-heading">Pemasukan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="pe-7f-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">{{ toIdr($pengeluarans->sum('jumlah')) }}</div>
                                    <div class="stat-heading">Pengeluaran</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7f-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">{{ $anak_asuhs->count() }}</div>
                                    <div class="stat-heading">Anak Asuh</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="pe-7f-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text">{{ $pengurus->count() }}</div>
                                    <div class="stat-heading">Pengurus</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">

                    </div>
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="card-body">

                                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                                <script type="text/javascript">
                                    google.charts.load('current', {'packages': ['corechart']});
                                    google.charts.setOnLoadCallback(drawChart);

                                    function drawChart() {
                                        var data = google.visualization.arrayToDataTable([
                                            ['Tanggal', 'Pemasukan', 'Pengeluaran'],

                                                @foreach($grafiks as $item)
                                            ['{{ $item['tanggal'] }}', {{ $item['pemasukan'] }}, {{ $item['pengeluaran'] }}],
                                            @endforeach
                                        ]);

                                        var options = {
                                            title: 'Grafik Pemasukan / Pengeluaran 14 Hari Terakhir',
                                            curveType: 'function',
                                            legend: {position: 'bottom'}
                                        };

                                        var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));

                                        chart.draw(data, options);
                                    }
                                </script>
                                <div id="curve_chart" height="100%"></div>

                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card-body">
                                <div class="progress-box progress-1">
                                    <h4 class="por-title">Pemasukan</h4>
                                    <div class="por-txt">{{ $donaturs->count() }} Donatur</div>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-flat-color-1" role="progressbar"
                                             style="width: 100%;"
                                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>

                                <div class="progress-box progress-2">
                                    <h4 class="por-title">Pengeluaran</h4>
                                    <div class="por-txt">{{ $pengeluarans->count() }} Pengeluaran</div>
                                    <div class="progress mb-2" style="height: 5px;">
                                        <div class="progress-bar bg-flat-color-4" role="progressbar"
                                             style="width: 100%;"
                                             aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body"></div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <div class="orders">
            <div class="row">
                <div class="col-xl-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="box-title">Donatur </h4>
                        </div>
                        <div class="card-body--">
                            <div class="table-stats order-table ov-h">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th width=2>#</th>
                                        <th>Nama</th>
                                        <th>Nama Pemilik Rekening</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal</th>
                                        <th>Pesan</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($donaturs as $item)
                                        <tr data-id='{{ $item->id }}'>
                                            <td>
                                                {{ $loop->iteration }}
                                            </td>

                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nama_pemilik_rekening }}</td>
                                            <td>{{ toIdr($item->jumlah) }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->pesan }}</td>

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


    </div>
@endsection