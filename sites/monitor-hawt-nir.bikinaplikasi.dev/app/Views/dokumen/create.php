<?= $this->extend('partials/layout') ?>

<?= $this->section('content') ?>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Tambah</h3>
                        </div>
                        <form method="post" action="store" enctype="multipart/form-data">

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="nama_penanda_tangan">Nama Penanda Tangan</label>
                                    <input type="text" class="form-control" id="nama_penanda_tangan"
                                           placeholder="Nama Penanda Tangan" name="nama_penanda_tangan" value="<?= old('nama_penanda_tangan') ?>">

                                    <?php

                                    if ($validation->hasError('nama_penanda_tangan')) {

                                        echo $validation->getError('nama_penanda_tangan');
                                    }

                                    ?>
                                </div>


                                <div class="form-group">
                                    <label for="judul_dokumen">Judul Dokumen</label>
                                    <input type="text" class="form-control" id="judul_dokumen"
                                           placeholder="Judul Dokumen" name="judul_dokumen" value="<?= old('judul_dokumen') ?>">

                                    <?php

                                    if ($validation->hasError('judul_dokumen')) {

                                        echo $validation->getError('judul_dokumen');
                                    }

                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="lampiran_dokumen_asli">Lampiran Dokumen Asli (PDF)</label>
                                    <input type="file" name="lampiran_dokumen_asli" id="lampiran_dokumen_asli" class="form-control" name="lampiran_dokumen_asli">

                                    <?php

                                    if ($validation->hasError('lampiran_dokumen_asli')) {

                                        echo $validation->getError('lampiran_dokumen_asli');
                                    }

                                    ?>
                                </div>

                                <div class="form-group">
                                    <label for="lampiran_tanda_tangan_asli">Lampiran Tanda Tangan Asli (JPG,PNG)</label>
                                    <input type="file" name="lampiran_tanda_tangan_asli" id="lampiran_tanda_tangan_asli" class="form-control" name="lampiran_tanda_tangan_asli">

                                    <?php

                                    if ($validation->hasError('lampiran_tanda_tangan_asli')) {

                                        echo $validation->getError('lampiran_tanda_tangan_asli');
                                    }

                                    ?>
                                </div>

                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="reset" class="btn btn-warning">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?= $this->endSection() ?>