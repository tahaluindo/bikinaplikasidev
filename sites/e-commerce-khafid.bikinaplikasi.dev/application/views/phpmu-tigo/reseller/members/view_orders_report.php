<p class='sidebar-title text-danger produk-title'> Laporan Data Pesanan Anda</p>
              <?php 
                if ($this->uri->segment(3)=='success'){
                  echo "<div class='alert alert-success'><b>SUCCESS</b> - Terima kasih telah Melakukan Konfirmasi Pembayaran!</div>";
                }elseif($this->uri->segment(3)=='orders'){
                  echo "<div class='alert alert-success'><b>SUCCESS</b> - Orderan anda sukses terkirim, silahkan melakukan pembayaran ke rekening reseller pesanan anda dan selanjutnya lakukan konfirmasi pembayaran!</div>";
                }
              ?>
              <table id='example2' style='overflow-x:scroll; width:96%' class="table table-striped table-condensed">
                <thead>
                  <tr>
                    <th width="20px">No</th>
                    <th>Kode Transaksi</th>
                    <th>Nama Lapak</th>
                    <th>Subtotal</th>
                    <th>Ongkir</th>
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


                    if ($row['proses']=='0'){ $proses = '<i class="text-danger">Pending</i>'; }elseif($row['proses']=='1'){ $proses = '<i class="text-success">Proses</i>'; }else{ $proses = '<i class="text-info">Konfirmasi</i>'; }

                    if($row['status_diterima'] == 'Sudah Diterima') {
                        $htmlTerimaBarang = "<div class='display: inline-block; margin-right: 5px !important;'>$row[status_diterima]</div>";
                        $proses = "";
                    } else {
                        $htmlTerimaBarang = "<a href='?update_status=Terima Barang&kode_transaksi=$row[kode_transaksi]' class='badge badge-success' onclick='return confirm(\"Yakin akan terima barang?\")' style='margin-right: 5px !important;'>Terima Barang</a>";
                    }

                    $total = $this->db->query("SELECT sum((a.harga_jual*a.jumlah)-a.diskon) as total FROM `rb_penjualan_detail` a where a.id_penjualan='$row[id_penjualan]'")->row_array();
                    echo "<tr><td>$no</td>
                              <td><span class='text-success'>$row[kode_transaksi]</span></td>
                              <td><a href='".base_url()."members/detail_reseller/$row[id_reseller]'>$row[nama_reseller]</a></td>
                              <td><span style='color:blue;'>Rp ".rupiah($total['total'])."</span></td>
                              <td><i style='color:green;'><b style='text-transform:uppercase'>$kurir</b> - Rp ".rupiah($row['ongkir'])."</i></td>
                              <td>$proses</td>
                              <td style='color:red;'>Rp ".rupiah($total['total']+$row['ongkir'])."</td>
                              <td width='130px'>";
                if ($row['proses']=='0'){
                  echo "<a style='margin-right:3px' class='btn btn-success btn-xs' title='Konfirmasi Pembayaran' href='".base_url()."konfirmasi?kode=$row[kode_transaksi]'>Konfirmasi</a> $htmlTerimaBarang";
                }else{
                  echo "<a style='margin-right:3px' class='btn btn-default btn-xs' href='".base_url()."konfirmasi?kode=$row[kode_transaksi]'  onclick=\"return confirm('Maaf, Pembayaran ini sudah dikonfirmasi, ingin konfirmasi ulang? ')\">Konfirmasi</a> $htmlTerimaBarang";
                }
              
              echo "<a class='btn btn-info btn-xs' title='Detail data pesanan' href='".base_url()."members/keranjang_detail/$row[id_penjualan]'><span class='glyphicon glyphicon-search'></span></a></td>
                          </tr>

                          ";
                      $no++;
                    }
                  ?>
                </tbody>
              </table>
