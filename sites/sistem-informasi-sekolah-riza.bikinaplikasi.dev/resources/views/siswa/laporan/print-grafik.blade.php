<h1 align="center" style="margin-bottom: 60px;">LAPORAN PENDAFTARAN SISWA PER TAHUN</h1>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<canvas id="myChart" width="400" height="400"></canvas>

@php
    $angkatans = $siswas->unique('angkatan')->sortByDesc('angkatan')->reverse()->pluck('angkatan');
@endphp

<div id="labels">{{ json_encode($angkatans->toArray()) }}</div>

<script>
    const ctx = document.getElementById('myChart').getContext('2d');

    const labels = JSON.parse(document.getElementById('labels').innerText);
    document.getElementById('labels').remove();
    
    const data = {
        labels: labels,
        datasets: [{
            label: 'Grafik Pendaftaran Siswa Perangkatan',
            backgroundColor: ['#142F43', '#FFAB4C', '#FF5F7E', '#B000B9'],
            borderColor: 'rgb(255, 99, 132)',
            data: [
                @foreach($angkatans as $item)
                @php $data[] = $siswas->where('angkatan', $item)->count(); @endphp
                @endforeach

                {{ implode(",", $data) }}
            ],
        }]
    };

    const config = {
        type: 'bar',
        data: data,
        options: {}
    };

    const myChart = new Chart(
        document.getElementById('myChart'),
        config
    );

    setTimeout(() => {

        window.print();
    }, 1500)
</script>

 