var options = {
    series: [{name: 'series1', data: grafikLabaBersihData}],
    chart: {height: 350, type: 'area', toolbar: {show: false}},
    dataLabels: {enabled: false},
    stroke: {curve: 'smooth'},
    xaxis: {
        type: 'datetime',
        categories: grafikLabaBersihBulan
    },
    tooltip: {x: {format: 'dd/MM/yy HH:mm'},},
};
var chart = new ApexCharts(document.querySelector("#area_active"), options);
chart.render();
