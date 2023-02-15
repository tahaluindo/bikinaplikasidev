<?= $this->extend('partials/layout') ?>

<?= $this->section('content') ?>

<div id="page-wrapper">
    <div class="header">
        <h1 class="page-header">Pusat Informasi
        </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li><a href="#">Pusat Informasi</a></li>
            <li class="active">Data</li>
        </ol>
    </div>
    
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <div class='text-center'>
                            <img src="<?php base_url(); ?>/assets/img/logo.png" class='logo-pusat-informasi'>
                        </div>

                        <div class='row'>
                            <div class='col-md-8 col-md-offset-2 text-justify'>

                                Horizontal Axial Wind Turbine (HAWT) dapat didefinisikan sebagai suatu sistem pembangkit Hybrid yang memadukan antara PLTB dengan jaringan listrik PLN. Kombinasi ini bertujuan untuk memanfaatkan energi angin sebagai sumber tenaga listrik serta meminimalkan penggunaan energi listrik dari sumber tenaga konvensional. Sistem ini secara khusus akan mengisi baterai atau accumulator (akumulator) yang secara terus-menerus ketika dibutuhkan. Sensor-sensor akan mendeteksi adanya daya masuk dari pembangkit yang digunakan kemudian akan diolah menggunakan mikrokontroler dan hasilnya akan ditampilkan pada website yang dapat diakses kapan saja.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>