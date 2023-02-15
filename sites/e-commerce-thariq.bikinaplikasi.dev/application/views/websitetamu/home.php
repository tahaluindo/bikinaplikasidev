<div id="content">

    <div class="container-fluid">
        <div class="col-md-8 col-md-offset-2">

            <div id="main-slider">
                <!-- <div class="item">
                    <img src="<?php //echo base_url() ?>templateuser/img/main-slider1.jpg" alt="" class="img-responsive">
                </div> -->

                <div class="item">
                    <img class="img-responsive" src="<?php echo base_url() ?>images/gambar_depan.jpeg" alt="">
                </div>

            </div>

            <!-- /#main-slider -->
        </div>
    </div>

    <?php if($produk_kategoris): ?>
    <?php foreach($produk_kategoris as $kategori => $produk_kategori): ?>
    <div id="hot">
        <div class="box">

            <div class="container">
                <div class="col-md-12">
                    <h2><?php echo $kategori; ?></h2>
                </div>
            </div>
            <br>

            <div class="container">
                <div class="product-slider">
                    <?php foreach($produk_kategori as $barang): ?>
                    <div class="item">
                        <div class="product">
                            <div class="flip-container">
                                <div class="flipper">
                                    <div class="xfront text-center">
                                        <a href="<?php echo site_url('aplikasi/detailbarang/'.$barang->id) ?>">
                                            <?php if(count($barang->urlgambar)): ?>
                                            <img src="<?php echo base_url('images/barang/'.$barang->urlgambar[0]['urlgambar']) ?>" alt=""
                                                class="img-responsivex" height="170" width="150" style="padding: 5px">
                                            <?php endif; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <div class="text">
                                <h3><a
                                        href="<?php echo site_url('aplikasi/detailbarang/'.$barang->id) ?>"><?php echo $barang->nama_barang; ?></a>
                                </h3>

                                <?php if($barang->promo == 'Y'): ?>
                                <p class="price">
                                    <strike style="font-size: 10px">Rp.
                                        <?php echo number_format($barang->harga,0,',','.'); ?>
                                    </strike>
                                    <br>
                                    <span style="font-size: 12px">Harga Promo</span><br>Rp.
                                    <?php echo number_format($barang->hargapromo,0,',','.'); ?>
                                </p>
                                <?php else: ?>
                                <p class="price">
                                    <br><br>
                                    Rp. <?php echo number_format($barang->harga,0,',','.'); ?></p>
                                <?php endif; ?>
                            </div>
                            <!-- /.text -->
                        </div>
                        <!-- /.product -->
                    </div>
                    <?php endforeach; ?>
                </div>
                <!-- /.product-slider -->
            </div>
        </div>
    </div>
    <?php endforeach; ?>
    <?php endif; ?>
</div>