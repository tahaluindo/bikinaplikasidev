<div id="content">
    <div class="container-fluid">
        <div class="row">        
            <div class="col-md-12">
                <?php if($this->session->flashdata('berhasil') <> '') { ?>
                <p class="alert alert-info">
                    <strong><?php echo $this->session->flashdata('berhasil') ?></strong> 
                </p>
                <?php } ?>
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li><a href="#">Barang</a>
                    </li>
                   
                    <li><?php echo $barang->nama_barang; ?></li>
                </ul>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                   
                    <div class="col-md-12">

                        <?php 
                        $qu = "select * from gambarbarang where id_barang = ".$barang->id." limit 1";
                        $r = $this->db->query($qu)->row();

                        ?>
                        <div class="row" id="productMain">
                            <div class="col-sm-6 ">
                                <div id="mainImage" style="padding: 5px;">
                                    <div class="text-center">
                                        <?php if(count($r)) { ?>
                                        <img src="<?php echo base_url('images/barang/'.$r->urlgambar) ?>" alt="" class="img-responsivex" width="280" height="300">
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box">
                                    <h1 class="text-center"><?php echo $barang->nama_barang; ?></h1>
                                    <form method="post" action="<?php echo site_url('aplikasi/tambahcart/') ?>">
                                        <input type="hidden" name="idbarang" value="<?php echo $barang->id ?>">
                                        
                                        <div id="detBarang"></div>
                                        <div class="row">
                                            <div class="col-md-offset-4 col-md-4 text-center ">
                                             Warna : <input type="text" name="warna" class="form-control" />     
                                            </div>
                                        </div>
                                       
                                        <br>
                                        <p class="text-center buttons">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-shopping-cart"></i>Cart</button>
                                        </p>
                                    </form>
                                    Bahan : <?php echo $barang->bahan ?>
                                </div>

                                <?php 
                                $q = "select * from gambarbarang where id_barang = ".$barang->id."";
                                $hasil = $this->db->query($q);
                                ?>

                                <?php if($hasil->num_rows()) { ?>

                                <div class="row" id="thumbs">
                                   
                                    <?php foreach($hasil->result() as $rsgbrtbh) { ?>
                                    <div class="col-xs-4">
                                        <a href="<?php echo base_url('/images/barang/'.$rsgbrtbh->urlgambar) ?>" class="thumb">
                                            <img src="<?php echo base_url('/images/barang/'.$rsgbrtbh->urlgambar) ?>" alt="" class="img-responsive">
                                        </a>
                                        <br>
                                        Ket. Gambar : <?php echo $rsgbrtbh->warna ?>
                                    </div>
                                    <?php } ?>
                                </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="box" id="details">
                            <p>
                                <h4>Detail Produk</h4>
                                <?php echo $barang->keterangan; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
        function detailbarang(){ 
            setTimeout(detailbarang,10000);
            var urldetstok = '<?php echo site_url("aplikasi/detailbarangstok/$barang->id") ?>';
            $.get(urldetstok,{},function(data){
                $('#detBarang').html(data);
            },'html');
        }

        detailbarang();
    })
</script>