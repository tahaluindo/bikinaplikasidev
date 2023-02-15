(function ($) {
    "use strict";
    const ctx = document.getElementById("sales-chart").getContext('2d');
    const gradientStroke1 = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke1.addColorStop(0, "#f53c79");
    gradientStroke1.addColorStop(1, "#f0ae00");
    const gradientStroke2 = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke2.addColorStop(0, "#4400eb");
    gradientStroke2.addColorStop(1, "#44ecf5");
    const gradientStroke3 = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStroke3.addColorStop(0, "#36b9d8");
    gradientStroke3.addColorStop(1, "#4bffa2");
    ctx.height = 200;
    new Chart(ctx, {
        type: 'line',
        legend: {display: false},
        data: {
            labels: grafik_pengembalian_tahun,
            type: 'line',
            defaultFontFamily: 'Poppins',
            datasets: [{
                label: "Pengembalian Pengiriman paket",
                data: grafik_pengembalian_pengiriman_paket,
                backgroundColor: 'transparent',
                borderColor: "#1BC167",
                borderWidth: 4,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: "#fff",
                pointBackgroundColor: "#1BC167",
            }, {
                label: "Pengembalian Rental Mobil",
                data: grafik_pengembalian_rental_mobil,
                backgroundColor: 'transparent',
                borderColor: "#508FF4",
                borderWidth: 4,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: '#fff',
                pointBackgroundColor: "#508FF4",
            }]
        },
        options: {
            responsive: true,
            tooltips: {
                display: false,
                mode: 'index',
                titleFontSize: 10,
                titleFontColor: '#706F9A',
                bodyFontColor: '#706F9A',
                backgroundColor: '#fff',
                titleFontFamily: '"Muli", sans-serif',
                bodyFontFamily: '"Muli", sans-serif',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {display: false, labels: {usePointStyle: true, fontFamily: 'Montserrat',},},
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {display: false, drawBorder: false},
                    scaleLabel: {display: false, labelString: 'Month'}
                }],
                yAxes: [{
                    display: true,
                    gridLines: {display: false, drawBorder: false},
                    scaleLabel: {display: false,},
                    ticks: {max: 25, min: 0, stepSize: 5}
                }]
            },
            title: {display: false, text: 'Normal Legend'}
        }
    });
})(jQuery);
(function ($) {
    "use strict";
    const ctx = document.getElementById("doughutChart").getContext('2d');
    ctx.height = 220;
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            defaultFontFamily: 'Poppins',
            datasets: [{
                data: jenis_tiket_terjual_count,
                backgroundColor: backgroundColor1,
                hoverBackgroundColor: backgroundColor1
            }],
        },
        options: {responsive: true}
    });
})(jQuery);
(function ($) {
    "use strict";
    const ctx = document.getElementById("doughutChart2").getContext('2d');
    ctx.height = 220;
    new Chart(ctx, {
        type: 'pie',
        data: {
            defaultFontFamily: 'Poppins',
            datasets: [{
                data: jenis_mobil_dirental_count,
                backgroundColor: backgroundColor2,
                hoverBackgroundColor: backgroundColor2
            }],
        },
        options: {responsive: true}
    });
})(jQuery);
