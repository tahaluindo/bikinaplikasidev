<?= $this->extend('partials/layout') ?>

<?= $this->section('content') ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-6">
                                <form class="float-right" method="get" action="">
                                    <select name="berdasarkan" style="padding: 3px !important;" required>
                                        <option value="">--Berdasarkan--</option>
                                        <?php
                                            foreach ($columns as $key => $value) {
                                                if(!in_array($value->Field, ['user_id'])) {

                                                    if(isset($_GET['berdasarkan'])) {
                                                        $selected = $_GET['berdasarkan'] == $value->Field ? "selected" : "";

                                                        echo "<option value='$value->Field' $selected>$value->Field</option>";
                                                    } else {
                                                        echo "<option value='$value->Field'>$value->Field</option>";
                                                    }
                                                }
                                            }
                                        ?>
                                    </select>
                                    <input type="text" name="q" placeholder="Cari..." required value="<?= isset($_GET['q']) ? $_GET['q'] : ""?>">
                                    <input type="submit" value="Cari" class="btn btn-primary btn-sm" style="margin-top: -2.5px !important;">
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Nama Penanda Tangan</th>
                                <th>Judul Dokumen</th>
                                <th>Waktu Penanda Tangan</th>
                                <th>Lampiran Dokumen Asli</th>
                                <th>Lampiran Tanda Tangan Asli</th>
                                <th>Dokumen QrCode</th>
                                <th style="width: 40px">Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($items as $iteration => $item): ?>
                                <tr>
                                    <?php if(isset($_GET['page']) && $_GET['page'] != 1): ?>
                                        <td><?= (($_GET['page'] * 5) + $iteration+1) - 5 ?></td>
                                    <?php else: ?>
                                        <td><?= $iteration+1  ?></td>
                                    <?php endif ?>
                                    <td><?= $item->nama_penanda_tangan ?></td>
                                    <td><?= $item->judul_dokumen ?></td>
                                    <td><?= $item->waktu_penanda_tangan ?></td>

                                    <td>
                                        <a href="<?= base_url("uploads/lampiran_dokumen_aslis/$item->lampiran_dokumen_asli") ?>" width="50"
                                           height="50">Download</a>
                                    </td>

                                    <td>
                                        <img src="<?= base_url("uploads/lampiran_tanda_tangan_aslis/$item->lampiran_tanda_tangan_asli") ?>" width="50"
                                             height="50">
                                    </td>

                                    <td>
                                        <a href="<?= base_url("uploads/lampiran_dokumen_qrcodes/$item->lampiran_dokumen_qrcode") ?>" width="50"
                                           height="50">Download</a>
                                    </td>

                                    <td>
                                        <a href="<?= "dokumen/$item->id/delete" ?>" class="text-danger" onclick
                                        ='return confirm("Yakin akan menghapus data ini!")'>Delete</a>

                                    </td>
                                </tr>
                            <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">
                        <style>
                            ul.pagination li {
                                padding: 5px;
                                background: white;
                                border: 1px solid #5fc5e8;
                                margin-right: 2.5px;
                            }

                            ul.pagination li.active {
                                background: #5fc5e8;
                                color: white;
                            }

                            ul.pagination li.active a {
                                color: white !important;
                            }


                            ul.pagination li.active:hover {
                                background: white;
                            }

                            ul.pagination li.active:hover a {
                                color: black !important;
                            }
                        </style>
                        Total data: <?= $items_count ?>

                        <?= $pager->links() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
