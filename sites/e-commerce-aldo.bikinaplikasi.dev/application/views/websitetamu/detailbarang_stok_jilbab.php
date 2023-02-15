<p class="goToDescription">
    <input type="hidden" class="form-control" name="optradio" value="X"/>
    <div class="row text-center">
         <h5>Ukuran :  <?php echo $barang->ukuran ?></h5>
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

