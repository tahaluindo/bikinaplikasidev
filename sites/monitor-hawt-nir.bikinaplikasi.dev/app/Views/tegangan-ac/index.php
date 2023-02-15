<?= $this->extend('partials/layout') ?>

<?= $this->section('content') ?>
<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">Arus Wind Turbine
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Arus Wind Turbine</a></li>
            <li class="active">Data</li>
        </ol>
    </div>

    <div id="page-inner">
        <div class="row">
            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="card-panel text-center">
                    <h4>Arus Wind Turbine</h4>
                    <div class="easypiechart" id="easypiechart-orange" data-percent="55"><span class="percent"><span
                                id='tegangan-wind-turbine'>3</span>
                            V</span>
                    </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-4 col-md-4">
                <div class="card-panel text-center">
                    <h4>Download Data</h4>

                    <a href='<?= base_url() ?>/sensor/download'>
                        <div class="easypiechart" id="easypiechart-orange" data-percent="55"><span class="percent"><i
                                    class='fa fa-download'></i>
                                Download</span>
                        </div>
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class="chart-area">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas id="myAreaChart" style="height: 621px; display: block; width: 1543px;"
                                class="chartjs-render-monitor" width="1543" height="621"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>

<?= $this->section('chart') ?>
<script type="application/javascript" src="<?= base_url() ?>/assets/js/demo/chart-tegangan-wind-turbine.php"></script>
<?= $this->endSection() ?>