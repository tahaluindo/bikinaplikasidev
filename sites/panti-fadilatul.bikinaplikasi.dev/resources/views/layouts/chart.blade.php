        var data = google.visualization.arrayToDataTable([
            ['E Canteen', 'Total', { role: 'style' }],

            ['Meja', {{ $mejas->count() }}, '#aad360'],['Menu', {{ $menus->count() }}, '#fff9d6'],['Penjual', {{ $penjuals->count() }}, '#193d5a'],['Pesanan', {{ $pesanans->count() }}, '#ff9c98']
        ]);

        var options = {
          title : 'E Canteen',
          vAxis: {title: 'Total'},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {6: {type: 'line'}}
        };