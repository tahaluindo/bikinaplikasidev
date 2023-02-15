<div id="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a>
                    </li>
                    <li>Checkout</li>
                </ul>
            </div>
        </div>

         <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12" id="checkout">

                        <div class="box">
                            <form method="post" action="<?php echo site_url('webuser/prosescheckout') ?>">
                                <h1>Proses Pembelian</h1>
                                
                                <div class="content">
                                    
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="company">Nama Penerima</label>
                                                <input type="text" name="nama_penerima" value="<?php echo $user->nama ?>" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Alamat Penerima</label>
                                                <input type="text" name="alamat_penerima" value="<?php echo $user->alamat ?>" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="company">No Telp Penerima</label>
                                                <input type="text" name="notelp_penerima" value="<?php echo $user->notelp ?>" class="form-control" >
                                            </div>
                                            <div class="form-group">
                                                <label for="company">Expedisi Pengiriman</label>
                                                <select name="expedisi" required  class="form-control">
                                                  <option value="JNE">JNE</option>
                                                  <option value="J&T">J&T</option>
                                                 <!--  <option value="Gojek">Gojek</option>
                                                  <option value="Grab">Grab</option> -->
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Ongkos Kirim (Per Kilo)</label>
                                                <div class="input-group">
                                                  <input type="text" class="form-control" name="tujuan" id="tujuan" value="" required>
                                                      <div class="input-group-btn">
                                                          <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                                              <span class="caret"></span>
                                                          </button>
                                                          <ul class="dropdown-menu dropdown-menu-right" role="menu"></ul>
                                                      </div>
                                                </div>
                                           
                                                <input type="hidden" name="ongkos_kirim" id="ongkos_kirim" class="form-control" id="company">
                                           
                                                <input type="hidden" name="id_ongkir" id="id_ongkir" class="form-control" id="company">
                                            
                                        </div>
                                        
                                    </div>
                                    <hr>

                                    <?php  

                                    ?>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <table class="table">
                                                <tr>
                                                    <th width="300">Total Belanja</th>
                                                    <td width="20">:</td>
                                                    <th>Rp. <?php echo number_format($this->cart->total(),0,',','.'); ?></th>
                                                </tr>
                                                <tr>
                                                    <th>Total Berat</th>
                                                    <td>:</td>
                                                    <th><?php echo $totalberat; ?> Kg</th>
                                                </tr>
                                                <tr>
                                                    <th>Ongkos Kirim (Perkilo)</th>
                                                    <td>:</td>
                                                    <th>Rp. <span id="xongkir">0</span></th>
                                                </tr>
                                                <tr>
                                                    <th>Berat * Ongkos Kirim</th>
                                                    <td>:</td>
                                                    <th>Rp. <span id="xberatxongkir">0</span></th>
                                                </tr>
                                                <tr>
                                                    <th>Total Pembayaran</th>
                                                    <td>:</td>
                                                    <th>Rp. <span id="xtotalbayar"></span></th>
                                                </tr>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                                
                                <div class="box-footer">
                                    <div class="pull-left">
                                        <a href="<?php echo site_url('aplikasi/transaksi') ?>" class="btn btn-default"><i class="fa fa-chevron-left"></i>Kembali Ke Keranjang Belanja</a>
                                    </div>
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary">Proses<i class="fa fa-chevron-right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
      
      var totalbayar = '<?php echo number_format($this->cart->total(),0,',','.') ?>';
      
      $('#xtotalbayar').text(totalbayar); 

      $(function(){
        
      });

      $("#tujuan").bsSuggest({
          url: "<?php echo site_url('webuser/dataOngkir') ?>",
          // effectiveFields: ["nama", "jabatan"],
          searchFields: [ "nama"],
          effectiveFieldsAlias:{id:"ID",kode:"Kode",provinsi: "Provinsi",kabupate:"Kabupaten",biaya:"Biaya"},
          ignorecase: true,
          showHeader: true,
          showBtn: false,     
          delayUntilKeyup: true, 
          idField: "biaya",
          keyField: "nama",
          clearable: true
      }).on('onDataRequestSuccess', function (e, result) {
          console.log('onDataRequestSuccess: ', result);
      }).on('onSetSelectValue', function (e, keyword, data) {
            $('#id_ongkir').val(data.id);
            $('#ongkos_kirim').val(data.biaya);
            $('#tujuan').val(data.provinsi + ' - ' + data.kabupaten + ' - ' + data.biaya);
            $("#xongkir").text(data.biaya);

            var biaya = parseInt(data.biaya) * parseInt('<?php echo ceil($totalberat) ?>');
            $('#xberatxongkir').text(biaya);
            var total = parseInt(<?php echo $this->cart->total() ?>);
            $('#xtotalbayar').text(biaya + total);
      }).on('onUnsetSelectValue', function () {
          console.log("onUnsetSelectValue");
      });


  });
</script>