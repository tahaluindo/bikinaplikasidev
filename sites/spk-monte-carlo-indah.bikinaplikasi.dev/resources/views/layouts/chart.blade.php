        var data = google.visualization.arrayToDataTable([
            ['SISTEM PREDIKSI', 'Total', { role: 'style' }],

            ['Data Penjualan Aktual', {{ $data_penjualan_aktuals->count() }}, '#aad360'],['Data Penjualan Prediksi', {{ $data_penjualan_prediksis->count() }}, '#fff9d6'],['Produk', {{ $produks->count() }}, '#193d5a'],['Tahun', {{ $tahuns->count() }}, '#ff9c98']
        ]);

        var options = {
          title : 'SISTEM PREDIKSI',
          vAxis: {title: 'Total'},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {6: {type: 'line'}}
        };