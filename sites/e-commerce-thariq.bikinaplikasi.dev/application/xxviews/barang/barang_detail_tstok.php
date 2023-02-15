<div id="page-wrapper">
    <div class="well">
    <div class="row" style="padding-top: 10px">
        <div class="col-lg-10">
            <p style="font-size: 24px">TAMBAH STOK UKURAN : <span class="text text-success"><?php echo strtoupper($ukuran) ?></span></p>
        </div>
        <div class="col-lg-2">
            <a href="<?php echo site_url('barang/barangDetail/'.$barang->id) ?>" class="btn btn-primary btn-sm pull-right">Kembali</a>
        </div>
        
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-6">
            <table>
                <tr>
                    <th width="200">Nama</th>
                    <th width="10">:</th>
                    <th><?php echo $barang->nama_barang ?></th>
                </tr>
                <tr>
                    <th>Tipe barang</th>
                    <th>:</th>
                    <th><?php echo $barang->nmkategori ?></th>
                </tr>
                <tr>
                    <th>Bahan</th>
                    <th>:</th>
                    <th><?php echo $barang->bahan ?></th>
                </tr>
                <tr>
                    <th>Berat (satuan gram)</th>
                    <th>:</th>
                    <th><?php echo number_format($barang->berat,0,',','.') ?></th>
                </tr>
                <tr>
                    <th>Spesifikasi</th>
                    <th>:</th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <td colspan="3">
                        <?php echo $barang->keterangan ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><br></td>
                </tr>
                <tr>
                    <td>
                        <form action="<?php echo site_url('barang/barangTambahStok') ?>" method="post" autocomplete="off">
                            
                            <input type="hidden" name="id" value="<?php echo $barang->id ?>">
                            <input type="hidden" name="ukuran" value="<?php echo $ukuran ?>">
                            <div class="form-group">
                                <label>Stok Lama</label>
                                <input type="text" name="stoklama" value="<?php echo $stoklama ?>" class="form-control" disabled>
                            </div>
                            <div class="form-group">
                                <label>Tambah Stok Ukuran <?php echo strtoupper($ukuran) ?></label>
                                <input type="number" name="stokbaru" value="" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                            </div>
                        </form>
                    </td>
                </tr>
            </table>
            
        </div>
        <div class="col-lg-6">
           
        </div>
    </div>
</div>
<!-- /#page-wrapper -->   

