<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            TAMBAH DATA BARANG
        </h3>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="#">BARANG</a></li>
            <li class="active">TAMBAH DATA BARANG</li>
        </ol>                         
    </div>

    <div id="page-inner"> 
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card-title">
                                    <div class="title">TAMBAH DATA BARANG</div>
                                </div>
                            </div>
                            <div class="col-md-6 text-right">
                                <a href="<?php echo site_url('barang') ?>" class="btn btn-primary btn-sm pull-right">Kembali</a> 
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo site_url('barang/simpanBarang') ?>">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama_barang" class="form-control input-sm" placeholder="Nama" required <?php echo hanyaHuruf() ?>/>
                            </div>
                            <div class="form-group">
                                <label>Kategori</label>

                                <select class="form-control input-sm" name="id_kategori" required>
                                    <option value="">- Pilih Kategori -</option>
                                    <?php foreach($kategori->result() as $kat) { ?>
                                    <option value="<?php echo $kat->id ?>">
                                        <?php echo $kat->nmkategori ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label>Harga</label>
                                <input type="number" name="harga" class="form-control input-sm" placeholder="Harga" required />
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ukuran S</label>
                                        <input type="number" name="ukurans" class="form-control input-sm" placeholder="Ukuran S" required />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ukuran M</label>
                                        <input type="number" name="ukuranm" class="form-control input-sm" placeholder="Ukuran M" required />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ukuran L</label>
                                        <input type="number" name="ukuranl" class="form-control input-sm" placeholder="Ukuran L" required />
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ukuran XL</label>
                                        <input type="number" name="ukuranxl" class="form-control input-sm" placeholder="Ukuran XL" required />
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label>Bahan</label>
                                <input type="text" name="bahan" class="form-control input-sm" placeholder="Bahan" required <?php echo hanyaHuruf() ?>/>
                            </div>
                            <div class="form-group">
                                <label>Berat (dalam satuan gram)</label>
                                <input type="number" name="berat" class="form-control input-sm" placeholder="Berat" required />
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <textarea rows="5" name="keterangan" class="form-control" placeholder="Keterangan"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>