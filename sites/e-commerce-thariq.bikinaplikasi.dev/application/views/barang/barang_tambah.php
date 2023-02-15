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

                                <select class="form-control input-sm" id="id_kategori"  name="id_kategori" required>
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
                            
                            <div id="barangumum">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Ukuran S</label>
                                            <input min=0 type="number" name="ukurans" value="0" class="form-control input-sm" placeholder="Ukuran S" requiredx />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Ukuran M</label>
                                            <input  min=0 type="number" name="ukuranm" value="0" class="form-control input-sm" placeholder="Ukuran M" requiredx />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Ukuran L</label>
                                            <input  min=0 type="number" name="ukuranl" value="0" class="form-control input-sm" placeholder="Ukuran L" requiredx />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Ukuran XL</label>
                                            <input  min=0 type="number" name="ukuranxl" value="0" class="form-control input-sm" placeholder="Ukuran XL" requiredx />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- <div id="barangjilbab">
                                <div class="form-group">
                                    <label>Ukuran</label>
                                    <input type="text" name="ukuran" class="form-control input-sm" placeholder="Ukuran" requiredx/>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="number" name="jumlah" class="form-control input-sm" placeholder="Jumlah" requiredx value="0"/>
                                </div>
                            </div> -->

                            <div class="form-group">
                                <label>Promo</label>
                                <select class="form-control input-sm" name="promo" id="promo" required>
                                    <option value="N">Tidak</option>
                                    <option value="Y">Ya</option>
                                </select>
                            </div>
                            
                            <div class="form-group" id="hargapromo" style="display: none">
                                <label>Harga Promo</label>
                                <input type="number" name="hargapromo" value="0" class="form-control input-sm" placeholder="Harga Promo"/>
                            </div>

                            <div class="form-group">
                                <label>Bahan</label>
                                <input type="text" name="bahan" class="form-control input-sm" placeholder="Bahan" <?php echo hanyaHuruf() ?>/>
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

<script type="text/javascript">
$(document).ready(function(){
    
    $('#promo').on('change',function(){
        var pro = $(this).val();
        if( pro == 'Y') {
            $('#hargapromo').show();
        } else {
            $('#hargapromo').hide();
        }
    });

    

    $('#id_kategori').on('change',function(){
        var kategori = $( "#id_kategori option:selected").text();
        var kat = $.trim(kategori);
      
        if(kat == 'Jilbab' || kat == 'jilbab' || kat == 'Hijab' || kat == 'hijab') {
           $('#barangumum').hide();
           $('#barangjilbab').show();
        } else {
           $('#barangumum').show();
           $('#barangjilbab').hide();
        }
    })
})
</script>