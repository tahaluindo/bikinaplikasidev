            <div class="col-xs-12">  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Data Transaksi Penjualan / Orderan Konsumen</h3>
                  <form class='form-horizontal' action='' method='get'>

                      <input type='date' name='tanggal_awal' value='<?=date("Y-m-d"); ?>'>
                      <input type='date' name='tanggal_akhir' value='<?=date("Y-m-d"); ?>'>

                      <input type="submit" value="cari">
                      <input type="submit" value="print" name="print">

                  </form>
                  
                  
                  <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>reseller/tambah_penjualan'>Tambah Penjualan</a>
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class='table-responsive'>
                  <table id="example1" class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Kode Transaksi</th>
                        <th>Nama Konsumen</th>
                        <th>Kurir</th>
                        <th>Status</th>
                        <th>Total + Ongkir</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php 
                    $no = 1;
                    foreach ($record->result_array() as $row){
                      
                      $row['service'] = preg_replace('/POS|JNE/', '', $row['service']);
                      if(preg_match('/jne/i', $row['kurir'])) {

                        $kurir = 'SI EXSPRESS';
                      }

                      if(preg_match('/pos/i', $row['kurir'])) {

                        $kurir = 'SAGHARA EXSPRESS';
                      }

                      if(preg_match('/tiki/i', $row['kurir'])) {

                        $kurir = 'ANTIMES EXSPRESS ';
                      }


                    if ($row['proses']=='0'){ $proses = '<i class="text-danger">Pending</i>'; $status = 'Proses'; $icon = 'star-empty'; $ubah = 1; }elseif($row['proses']=='1'){ $proses = '<i class="text-success">Proses</i>'; $status = 'Pending'; $icon = 'star text-yellow'; $ubah = 0; }else{ $proses = '<i class="text-info">Konfirmasi</i>'; $status = 'Proses'; $icon = 'star'; $ubah = 1; }
                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='$row[id_penjualan]'")->row_array();
                    echo "<tr><td>$no</td>
                              <td>$row[kode_transaksi]</td>
                              <td><a href='".base_url()."reseller/detail_konsumen/$row[id_konsumen]'>$row[nama_lengkap]</a></td>
                              <td><span style='text-transform:uppercase'>$kurir</span> - $row[service]</td>
                              <td>$proses</td>
                              <td style='color:red;'>Rp ".rupiah($total['total']+$row['ongkir'])."</td>
                              <td><center>
                                <a class='btn btn-success btn-xs' title='Detail Data' href='".base_url()."reseller/detail_penjualan/$row[id_penjualan]'><span class='glyphicon glyphicon-search'></span> Detail</a>
                                <a class='btn btn-primary btn-xs' title='$status Data' href='".base_url()."reseller/proses_penjualan/$row[id_penjualan]/$ubah' onclick=\"return confirm('Apa anda yakin untuk ubah status jadi $status?')\"><span class='glyphicon glyphicon-$icon'></span></a>
                                <a class='btn btn-warning btn-xs' title='Edit Data' href='".base_url()."reseller/edit_penjualan/$row[id_penjualan]'><span class='glyphicon glyphicon-edit'></span></a>
                                <a class='btn btn-danger btn-xs' title='Delete Data' href='".base_url()."reseller/delete_penjualan/$row[id_penjualan]' onclick=\"return confirm('Apa anda yakin untuk hapus Data ini?')\"><span class='glyphicon glyphicon-remove'></span></a>
                              </center></td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
                </div>
              </div>
              </div>
              </div>
              