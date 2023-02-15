@extends('layouts.app')

@section('content')

    @if(request()->tahun_id)
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      // myChart1
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data1 = google.visualization.arrayToDataTable([
          ['Bulan', 'Volume'],
          @foreach ($data_penjualan_prediksi->data_penjualan_prediksi_details as $item)
            ['{{ $item->bulan }}',  {{ $item->volume }}],
          @endforeach
        ]);

        var data2 = google.visualization.arrayToDataTable([
          ['Bulan', 'Harga Per Kg'],
          @foreach ($data_penjualan_prediksi->data_penjualan_prediksi_details as $item)
            ['{{ $item->bulan }}',  {{ $item->harga_per_kg }}],
          @endforeach
        ]);

        var data3 = google.visualization.arrayToDataTable([
          ['Bulan', 'Penjualan'],
          @foreach ($data_penjualan_prediksi->data_penjualan_prediksi_details as $item)
            ['{{ $item->bulan }}',  {{ $item->harga_per_kg * $item->volume }}],
          @endforeach
        ]);

        var data4 = google.visualization.arrayToDataTable([
          ['Tahun', 'Penjualan'],
          @foreach ($data_penjualan_prediksi_tahun as $item)
            ['{{ $item->tahun }}',  {{ $item->data_penjualan_prediksi_details->sum('volume') * $item->data_penjualan_prediksi_details->sum('harga_per_kg') }}],
          @endforeach
        ]);

        var options1 = {
          title: 'Volume',
          hAxis: {title: 'Bulan',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var options2 = {
          title: 'Harga Per Kg',
          hAxis: {title: 'Bulan',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var options3 = {
          title: 'Penjualan',
          hAxis: {title: 'Bulan',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        var options4 = {
          title: 'Penjualan',
          hAxis: {title: 'Tahun',  titleTextStyle: {color: '#333'}},
          vAxis: {minValue: 0}
        };

        // Volume
        var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
        chart.draw(data1, options1);

        // Harga Per Kg
      var chart2 = new google.visualization.LineChart(document.getElementById('chart_div2'));
        chart2.draw(data2, options2);
      

        // Nilai Rp
      var chart3 = new google.visualization.LineChart(document.getElementById('chart_div3'));
        chart3.draw(data3, options3);
      

        // Nilai Rp pertahun
      var chart4 = new google.visualization.LineChart(document.getElementById('chart_div4'));
        chart4.draw(data4, options4);
      }
      
    </script>
    @endif

    <div class='row container-fluit'>
        <div class="col-md-12">
            <div id="chart_div" style="width: 100%; height: 500px; display: inline-block;"></div>
        </div>
        <div class="col-md-12">
            <div id="chart_div2" style="width: 100%; height: 500px; display: inline-block;"></div>
        </div>

        <div class="col-md-12">
            <div id="chart_div3" style="width: 100%; height: 500px; display: inline-block;"></div>
        </div>
        {{-- <div class="col-md-12">
            <div id="chart_div4" style="width: 100%; height: 500px; display: inline-block;"></div>
        </div> --}}
    </div>

            
@endsection
