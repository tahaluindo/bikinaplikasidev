        var data = google.visualization.arrayToDataTable([
            ['Persediaan', 'Total', { role: 'style' }],

            ['Pelanggan', {{ $pelanggans->count() }}, '#aad360'],['Pemasok', {{ $pemasoks->count() }}, '#dac197'],['Pembelian', {{ $pembelians->count() }}, '#fff9d6'],['Penjualan', {{ $penjualans->count() }}, '#193d5a']
        ]);

        var options = {
          title : 'Persediaan',
          vAxis: {title: 'Total'},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {6: {type: 'line'}}
        };