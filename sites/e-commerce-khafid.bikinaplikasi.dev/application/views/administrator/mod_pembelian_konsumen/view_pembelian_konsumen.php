<section class="col-lg-7 connectedSortable">
              <div class="box box-success">
              <div class="box-header">
              <i class="fa fa-th-list"></i>
              <h3 class="box-title">Transaksi Penjualan Terbaru <a href="?urut_berdasarkan=penjual" class="btn btn-success">Urut Berdasarkan Penjual</a> <a href="?urut_berdasarkan=pembeli" class="btn btn-info">Urut Berdasarkan Pembeli</a></h3>
                  <div class="box-tools pull-right">
                     <button class="btn btn-box-tool btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse"><i class="fa fa-minus"></i></button>
                      <button class="btn btn-box-tool btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove"><i class="fa fa-times"></i></button>
                  </div>

                  <form class='form-horizontal' action='' method='get' style="margin-top: 10px;">

                      <input type='date' name='tanggal_awal' value='<?=date("Y-m-d"); ?>'>
                      <input type='date' name='tanggal_akhir' value='<?=date("Y-m-d"); ?>'>

                      <input type="submit" value="cari" name="cari">
                      <input type="submit" value="print" name="print">

                  </form>

              </div>
              <div class="box-body">
                <table class="table table-bordered table-striped table-condensed">
                    <thead>
                      <tr>
                        <th style='width:40px'>No</th>
                        <th>Kode Transaksi</th>
                        <th>Kurir</th>
                        <th>Status</th>
                        <th>Penjual</th>
                        <th>Pembeli</th>
                        <th>Total + Ongkir</th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                    $no = 1;
                    $record = $this->model_reseller->penjualan_list_konsumen(null,'administrator');
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
                              <td><a href='".base_url().$this->uri->segment(1)."/detail_penjualan/$row[id_penjualan]'>$row[kode_transaksi]</a></td>
                              <td><span style='text-transform:uppercase'>$kurir</span> - $row[service]</td>
                              <td>$proses</td>
                              <td><span style='text-transform:uppercase'>$row[nama_reseller]</td>
                              <td><span style='text-transform:uppercase'>$row[nama_lengkap]</td>
                              <td style='color:red;'>Rp ".rupiah($total['total']+$row['ongkir'])."</td>
                          </tr>";
                      $no++;
                    }
                  ?>
                  </tbody>
                </table>
                <a class='btn btn-default btn-block' href='<?php echo base_url().$this->uri->segment(1); ?>/pembelian_konsumen?view=lihat_semua'>Lihat Semua</a>
              </div>
              </div>
            </section>