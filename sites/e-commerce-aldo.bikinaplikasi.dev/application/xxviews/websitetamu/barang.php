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
                    <div class="col-md-3">
                        <?php $this->load->view('websitetamu/kategorikiri') ?>
                    </div>
                    <div class="col-md-9">
                        <div class="row products">
                            <?php foreach($barang->result() as $rsbarang) {?>
                            <div class="col-md-4 col-sm-6">
                                <div class="product">
                                    <div class="flip-container">
                                        <div class="flipper">
                                            <div class="front">
                                                <!-- <a href="detail.html">
                                                    <img src="img/product1.jpg" alt="" class="img-responsive">
                                                </a> -->
                                                <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>">
                                                    <img src="<?php echo base_url('images/barang/'.$rsbarang->urlgambar) ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                            <div class="back">
                                                <!-- <a href="detail.html">
                                                    <img src="img/product1_2.jpg" alt="" class="img-responsive">
                                                </a> -->
                                                <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>">
                                                    <img src="<?php echo base_url('images/barang/'.$rsbarang->urlgambar) ?>" alt="" class="img-responsive">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <a href="detail.html" class="invisible">
                                        <img src="img/product1.jpg" alt="" class="img-responsive">
                                    </a> -->
                                     <a href="<?php echo site_url('aplikasi/detailbarang/'.$rsbarang->id) ?>" class="invisible">
                                        <!-- <img src="<?php //echo base_url() ?>templateuser/img/product1.jpg" alt="" class="img-responsive"> -->
                                         <img src="<?php echo base_url('images/barang/'.$rsbarang->urlgambar) ?>" alt="" class="img-responsive">
                                    </a>
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
                                            <a href="<?php echo site_url('aplikasi/tambahcart/'.$rsbarang->id) ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Tambah Cart</a>
                                        </p>
                                    </div>
                                    <!-- /.text -->
                                </div>
                                <!-- /.product -->
                            </div>
                            <?php  } ?>

                        </div>
                        <!-- /.products -->

                        <!-- <div class="pages">

                            <p class="loadMore">
                                <a href="#" class="btn btn-primary btn-lg"><i class="fa fa-chevron-down"></i> Load more</a>
                            </p>

                            <ul class="pagination">
                                <li><a href="#">&laquo;</a>
                                </li>
                                <li class="active"><a href="#">1</a>
                                </li>
                                <li><a href="#">2</a>
                                </li>
                                <li><a href="#">3</a>
                                </li>
                                <li><a href="#">4</a>
                                </li>
                                <li><a href="#">5</a>
                                </li>
                                <li><a href="#">&raquo;</a>
                                </li>
                            </ul>
                        </div> -->


                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container -->
</div>
<!-- /#content -->