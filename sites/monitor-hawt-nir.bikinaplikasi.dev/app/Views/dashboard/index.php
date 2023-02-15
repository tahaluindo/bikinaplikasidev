<?= $this->extend('partials/layout') ?>

<?= $this->section('content') ?>
<div id="page-wrapper">
            <div class="header">
                <h1 class="page-header">Selamat Datang di Monitoring Horizontal Axial Wind Turbine (HAWT)</h1>

            </div>
            <div id="page-inner">
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="cirStats">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="card-panel text-center">
                                        <h4>Kecepatan Angin</h4>
                                        <div class="easypiechart" id="easypiechart-orange" data-percent="55"><span
                                                class="percent"><?= $sensor->kecepatan_angin ?> m/s</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="card-panel text-center">
                                        <h4>Arus Wind Turbine</h4>
                                        <div class="easypiechart" id="easypiechart-blue" data-percent="82"><span class="percent"><?= $sensor->arus_wind_turbine ?>
                                                V</span>
                                            <canvas width="110"></canvas></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="card-panel text-center">
                                        <h4>Arus ATS</h4>
                                        <div class="easypiechart" id="easypiechart-red" data-percent="46"><span class="percent"><?= $sensor->arus_ats ?>
                                                V</span>
                                            <canvas width="110" height="110"></canvas></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="card-panel text-center">
                                        <h4>Tegangan Wind Turbine</h4>
                                        <div class="easypiechart" id="easypiechart-teal" data-percent="84"><span class="percent"><?= $sensor->tegangan_wind_turbine ?>
                                                A</span>
                                            <canvas width="110" height="110"></canvas><canvas height="110"></canvas></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="card-panel text-center">
                                        <h4>Tegangan ATS</h4>
                                        <div class="easypiechart" id="easypiechart-orange" data-percent="55"><span
                                                class="percent"><?= $sensor->tegangan_ats ?> A</span>
                                            <canvas width="110" height="110"></canvas></div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4 col-md-4">
                                    <div class="card-panel text-center">
                                        <h4>Daya Wind Turbine</h4>
                                        <div class="easypiechart" id="easypiechart-orange" data-percent="55"><span
                                                class="percent"><?= $sensor->daya_wind_turbine ?> W</span>
                                            <canvas width="110" height="110"></canvas></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/.row-->
                    <!--/.row-->
                </div>

                <div class="row">
                    <div class="col-md-12">

                    </div>
                </div>
            </div>
        </div>

<?= $this->endSection() ?>
