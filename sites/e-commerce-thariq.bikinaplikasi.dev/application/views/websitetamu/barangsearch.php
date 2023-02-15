<div id="content">
    <div class="container-fluid">     
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    
                    <div class="col-md-12">
                        <?php if($barang->num_rows()) { ?>
                            <p class="alert alert-info">
                                <strong>Pencarian dengan Kata kunci <u><i><?php echo $cari ?></i></u> menemukan barang sebanyak : <?php echo $barang->num_rows() ?></strong> 
                            </p>
                            <div class="row products">
                            

                                <?php foreach($barang->result() as $rsbarang) {?>
                                    <?php 
                                    $idbrg = $rsbarang->id;
                                    $qgbr = "SELECT * FROM gambarbarang WHERE id_barang = '$idbrg' ORDER BY id LIMIT 1";
                                    $rgbr = $this->db->query($qgbr)->row()
                                    ?>
                                <div class="col-md-4 col-sm-6">
                                <div class="product" >
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front text-center">
                                               
                                                
                                                <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>">
                                                    <img src="<?php echo base_url('images/barang/'.$rgbr->urlgambar) ?>" alt="" class="img-responsivex" height="230" width="200"  style="padding: 5px">
                                                </a>
                                            </div>
                                            <div class="back text-center">
                                               
                                                <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>">
                                                    <img src="<?php echo base_url('images/barang/'.$rgbr->urlgambar) ?>" alt="" class="img-responsivex" height="230" width="200"  style="padding: 5px">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                  
                                    <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>" class="invisible">
                                        
                                         <img src="<?php echo base_url('images/barang/'.$rgbr->urlgambar) ?>" alt="" class="ximg-responsive" height="200" width="230">
                                    </a>

                                    <div class="text">
                                        <h3><a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>"><?php echo $rsbarang->nama_barang; ?></a></h3>
                                        
                                        <?php if($rsbarang->promo == 'Y' && $this->session->userdata('iduser') != '') { ?>
                                        <p class="price">
                                            <strike style="font-size: 11px">Rp. <?php echo number_format($rsbarang->harga,0,',','.'); ?>
                                            </strike>
                                            <br>
                                            <span style="font-size: 12px">Potongan Harga</span><br>Rp. <?php echo number_format($rsbarang->hargapromo,0,',','.'); ?>
                                        </p>
                                        <?php } else { ?>

                                        <p class="price">
                                            <br><br>
                                            Rp. <?php echo number_format($rsbarang->harga,0,',','.'); ?></p>
                                        <?php } ?>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                            <?php  } ?>
                            </div>
                        <?php } else { ?>
                            <p class="alert alert-info">
                                <strong>Kata kunci <u><i><?php echo $cari ?></i></u> tidak ditemukan, gunakan kata kunci lain...</strong> 
                            </p>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>