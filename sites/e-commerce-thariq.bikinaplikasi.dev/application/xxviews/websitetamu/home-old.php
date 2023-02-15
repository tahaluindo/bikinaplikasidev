
<div id="content">

    <div class="container-fluid">
        <div class="col-md-12">
            
            <div id="main-slider">
                <!-- <div class="item">
                    <img src="<?php //echo base_url() ?>templateuser/img/main-slider1.jpg" alt="" class="img-responsive">
                </div> -->
                <div class="item">
                    <img class="img-responsive" src="<?php echo base_url() ?>templateuser/img/1.jpeg" alt="">
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo base_url() ?>templateuser/img/2.jpeg" alt="">
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo base_url() ?>templateuser/img/3.jpeg" alt="">
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo base_url() ?>templateuser/img/4.jpeg" alt="">
                </div>
                <div class="item">
                    <img class="img-responsive" src="<?php echo base_url() ?>templateuser/img/5.jpeg" alt="">
                </div>
                
            </div>
            
            <!-- /#main-slider -->
        </div>
    </div>

    <div id="hot" >

        <div class="box">
           
            <div class="container">
                <div class="col-md-12">
                    <h2>TERBARU</h2>
                </div>
            </div>
            <br>

            <div class="container">
                <div class="product-slider">
                    <?php foreach($barang->result() as $rsbrg) { ?>
                   
                    <?php 
                    $idbrg = $rsbrg->id;
                    $qgbr = "SELECT * FROM gambarbarang WHERE id_barang = '$idbrg' ORDER BY id LIMIT 1";
                    $rgbr = $this->db->query($qgbr)->row()
                    ?>
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="xfront text-center">
                                        <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbrg->id) ?>">
                                            <?php if(count($rgbr)) { ?>
                                            <img src="<?php echo base_url('images/barang/'.$rgbr->urlgambar) ?>" alt="" class="img-responsivex" height="170" width="150"  style="padding: 5px">
                                            <?php } ?>
                                        </a>
                                    </div>
                                   
                                </div>
                            </div>
                           
                            <div class="text">
                                <h3><a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbrg->id) ?>"><?php echo $rsbrg->nama_barang; ?></a></h3>
                                
                                <?php if($rsbrg->promo == 'Y') { ?>
                                <p class="price">
                                    <strike style="font-size: 10px">Rp. <?php echo number_format($rsbrg->harga,0,',','.'); ?>
                                    </strike>
                                    <br>
                                    <span style="font-size: 12px">Harga Promo</span><br>Rp. <?php echo number_format($rsbrg->hargapromo,0,',','.'); ?>
                                </p>
                                <?php } ?>

                                <?php if($rsbrg->promo == 'N') { ?>

                                <p class="price">
                                    <br><br>
                                    Rp. <?php echo number_format($rsbrg->harga,0,',','.'); ?></p>
                                <?php } ?>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>
                    <?php } ?>
                </div>
                <!-- /.product-slider -->
            </div>
        </div>
    </div>


    <div id="hot" >

        <div class="box">
           
            <div class="container">
                <div class="col-md-12">
                    <h2>TERPOPULER</h2>
                </div>
            </div>
            <br>

            <div class="container">
                <div class="product-slider">
                    <?php foreach($populer->result() as $rsbrg) { ?>
                   
                    <?php 
                    $idbrg = $rsbrg->id;
                    $qgbr = "SELECT * FROM gambarbarang WHERE id_barang = '$idbrg' ORDER BY id LIMIT 1";
                    $rgbr = $this->db->query($qgbr)->row()
                    ?>
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="xfront text-center">
                                        <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbrg->id) ?>">
                                            <?php if(count($rgbr)) { ?>
                                            <img src="<?php echo base_url('images/barang/'.$rgbr->urlgambar) ?>" alt="" class="img-responsivex" height="170" width="150"  style="padding: 5px">
                                            <?php } ?>
                                        </a>
                                    </div>
                                   
                                </div>
                            </div>
                           
                            <div class="text">
                                <h3><a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbrg->id) ?>"><?php echo $rsbrg->nama_barang; ?></a></h3>
                                
                                <?php if($rsbrg->promo == 'Y') { ?>
                                <p class="price">
                                    <strike style="font-size: 10px">Rp. <?php echo number_format($rsbrg->harga,0,',','.'); ?>
                                    </strike>
                                    <br>
                                    <span style="font-size: 12px">Harga Promo</span><br>Rp. <?php echo number_format($rsbrg->hargapromo,0,',','.'); ?>
                                </p>
                                <?php } ?>

                                <?php if($rsbrg->promo == 'N') { ?>

                                <p class="price">
                                    <br><br>
                                    Rp. <?php echo number_format($rsbrg->harga,0,',','.'); ?></p>
                                <?php } ?>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>
                    <?php } ?>
                </div>
                <!-- /.product-slider -->
            </div>
        </div>
    </div>

    <?php foreach($kategori->result() as $kt) { ?>
        <?php 
        $q = "select * from barang where id_kategori = ".$kt->id;
        $barang = $this->db->query($q);
        ?>

        <?php if($barang->num_rows()) { ?>
        <div id="hot" >

            <div class="box">
               
                <div class="container">
                    <div class="col-md-12">
                        <h2><?php echo $kt->nmkategori ?></h2>
                    </div>
                </div>
                <br>

                <div class="container">
                    <div class="product-slider">
                        <?php foreach($barang->result() as $rsbrg) { ?>
                       
                        <?php 
                        $idbrg = $rsbrg->id;
                        $qgbr = "SELECT * FROM gambarbarang WHERE id_barang = '$idbrg' ORDER BY id LIMIT 1";
                        $rgbr = $this->db->query($qgbr)->row()
                        ?>
                        <div class="item">
                            <div class="product">
                                <div class="flip-container">
                                    <div class="flipper">
                                        <div class="xfront text-center">
                                            <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbrg->id) ?>">
                                                <?php if(count($rgbr)) { ?>
                                                <img src="<?php echo base_url('images/barang/'.$rgbr->urlgambar) ?>" alt="" class="img-responsivex" height="170" width="150"  style="padding: 5px">
                                                <?php } ?>
                                            </a>
                                        </div>
                                       
                                    </div>
                                </div>
                               
                                <div class="text">
                                    <h3><a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbrg->id) ?>"><?php echo $rsbrg->nama_barang; ?></a></h3>
                                    
                                    <?php if($rsbrg->promo == 'Y') { ?>
                                    <p class="price">
                                        <strike style="font-size: 10px">Rp. <?php echo number_format($rsbrg->harga,0,',','.'); ?>
                                        </strike>
                                        <br>
                                        <span style="font-size: 12px">Harga Promo</span><br>Rp. <?php echo number_format($rsbrg->hargapromo,0,',','.'); ?>
                                    </p>
                                    <?php } ?>

                                    <?php if($rsbrg->promo == 'N') { ?>

                                    <p class="price">
                                        <br><br>
                                        Rp. <?php echo number_format($rsbrg->harga,0,',','.'); ?></p>
                                    <?php } ?>
                                </div>
                                <!-- /.text -->
                            </div>
                            <!-- /.product -->
                        </div>
                        <?php } ?>
                    </div>
                    <!-- /.product-slider -->
                </div>
            </div>
        </div>
        <?php } ?>
    <?php } ?>
</div>