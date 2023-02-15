        var data = google.visualization.arrayToDataTable([
            ['SISTEM INFORMASI PERPUSTAKAAN', 'Total', { role: 'style' }],

            ['anggota', {{ $anggotas->count() }}, '#aad356'],['buku', {{ $bukus->count() }}, '#dac197'],['pengembalian', {{ $pengembalians->count() }}, '#aad356'],['peminjaman', {{ $peminjamans->count() }}, '#193d5a'],['pengembalian', {{ $pengembalians->count() }}, '#f88600'],['user', {{ $users->count() }}, '#facdab']
        ]);

        var options = {
          title : 'SISTEM INFORMASI PERPUSTAKAAN',
          vAxis: {title: 'Total'},
          hAxis: {title: ''},
          seriesType: 'bars',
          series: {6: {type: 'line'}}
        };