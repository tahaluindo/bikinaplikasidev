        var data = google.visualization.arrayToDataTable([
            ['Persediaan', 'Total', { role: 'style' }],

            ['Map', {{ $maps->count() }}, '#aad360'],['Jenis', {{ $jeniss->count() }}, '#dac197']]
        ]);

        var options = {
          title : 'Gis',
          vAxis: {title: 'Total'},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {6: {type: 'line'}}
        };