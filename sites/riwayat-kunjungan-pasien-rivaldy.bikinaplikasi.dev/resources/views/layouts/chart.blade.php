        var data = google.visualization.arrayToDataTable([
            ['Riwayat Kunjungan Pasien', 'Total', { role: 'style' }],

            ['Pasien', {{ $pasiens->count() }}, '#aad360'],['Pegawai', {{ $pegawais->count() }}, '#fff9d6'],['Obat', {{ $obats->count() }}, '#193d5a'],['Penyakit', {{ $penyakits->count() }}, '#ff9c98']
        ]);

        var options = {
          title : 'Riwayat Kunjungan Pasien',
          vAxis: {title: 'Total'},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {6: {type: 'line'}}
        };