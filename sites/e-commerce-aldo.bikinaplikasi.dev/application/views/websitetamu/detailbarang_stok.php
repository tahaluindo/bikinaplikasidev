<p class="goToDescription">
    <div class="row">
        <div class="col-md-6 text-right">
            <h5>Pilih Ukuran :</h5>        
        </div>
        <div class="col-md-3">
            <select class="form-control" name="optradio" required style="width: 100px">
                <option value="">--Pilih--</option>
                <?php if ($barang->ukurans < 1) { ?>
                    <option value="S" disabled>S (Stok Kosong)</option>
                <?php } else { ?>
                    <option value="S">S (<?php echo $barang->ukurans ?>)</option>
                <?php } ?>

                <!--  -->
                <?php if ($barang->ukuranm < 1) { ?>
                    <option value="M" disabled>M (Stok Kosong)</option>
                <?php } else { ?>
                    <option value="M">M (<?php echo $barang->ukuranm ?>)</option>
                <?php } ?>

                <!--  -->
                <?php if ($barang->ukuranl < 1) { ?>
                    <option value="L" disabled>L (Stok Kosong)</option>
                <?php } else { ?>
                    <option value="L">L (<?php echo $barang->ukuranl ?>)</option>
                <?php } ?>

                <!--  -->
                <?php if ($barang->ukuranxl < 1) { ?>
                    <option value="XL" disabled>XL (Stok Kosong)</option>
                <?php } else { ?>
                    <option value="XL">XL (<?php echo $barang->ukuranxl ?>)</option>
                <?php } ?>
            </select>        
        </div>
    </div>
    <br>
    <div class="row text-center">
        Berat Barang : <?php echo ($barang->berat/1000) ?> Kg
    </div>                                       
</p>

<?php if($barang->promo == 'Y' && $this->session->userdata('iduser') != '') { ?>
<p class="price">
    <strike style="font-size: 15px">Rp. <?php echo number_format($barang->harga,0,',','.'); ?>
    </strike>
    <br>
    <span style="font-size: 12px">Potongan Harga</span><br>Rp. <?php echo number_format($barang->hargapromo,0,',','.'); ?>
</p>
<?php } else { ?>

<p class="price">
    <br>
    Rp. <?php echo number_format($barang->harga,0,',','.'); ?>
</p>
<?php } ?>
<!-- <p class="price">Rp. <?php //echo number_format($barang->harga,0,',','.'); ?></p> -->

