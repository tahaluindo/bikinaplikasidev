<div id="content">
    <div class="container-fluid">     
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                     <li><a href="#"><?php echo $kategori->nmkategori ?></a></li>
                </ul>
            </div>
        </div>

         <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="boxx">
                            <h1><?php echo $kategori->nmkategori ?></h1>
                            <p><?php echo $kategori->keterangan ?></p>
                        </div>

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
                                            <div class="frontx text-center">
                                               
                                                <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>">
                                                    <?php if(count($rgbr)) { ?>
                                                    <img src="<?php echo base_url('images/barang/'.$rgbr->urlgambar) ?>" alt="" class="img-responsivex" height="230" width="200"  style="padding: 5px">
                                                    <?php } ?>
                                                </a>
                                            </div>
                                           <!--  <div class="backx text-center">
                                               
                                                <a href="<?php //echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>">
                                                    <img src="<?php //echo base_url('images/barang/'.$rsbarang->urlgambar) ?>" alt="" class="img-responsivex" height="230" width="200"  style="padding: 5px">
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                  
                                 <!--    <a href="<?php //echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>" class="invisible">
                                        
                                         <img src="<?php //echo base_url('images/barang/'.$rsbarang->urlgambar) ?>" alt="" class="ximg-responsive" height="200" width="230">
                                    </a>
 -->
                                    <div class="text">
                                        <h3><a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>"><?php echo $rsbarang->nama_barang; ?></a></h3>
                                                                                                                        
                                        <?php if($rsbarang->promo == 'Y') { ?>
                                        <p class="price">
                                            <strike style="font-size: 10px">Rp. <?php echo number_format($rsbarang->harga,0,',','.'); ?>
                                            </strike>
                                            <br>
                                            <span style="font-size: 12px">Harga Promo</span><br>Rp. <?php echo number_format($rsbarang->hargapromo,0,',','.'); ?>
                                        </p>
                                        <?php } ?>

                                        <?php if($rsbarang->promo == 'N') { ?>

                                        <p class="price">
                                            <br><br>
                                            Rp. <?php echo number_format($rsbarang->harga,0,',','.'); ?></p>
                                        <?php } ?>

                                        <p class="buttons">
                                            <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>" class="btn btn-default">Detail</a>
                                            <!-- <a href="<?php //echo site_url('aplikasi/tambahcart/'.$rsbarang->id) ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Cart</a> -->
                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                            <?php  } ?>

                        </div>
                        <!-- /.products -->

                        <div class="pages">

                           <!--  <p class="loadMore">
                                <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                            </p> -->
                            <?php echo $this->pagination->create_links(); ?>
                           
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>