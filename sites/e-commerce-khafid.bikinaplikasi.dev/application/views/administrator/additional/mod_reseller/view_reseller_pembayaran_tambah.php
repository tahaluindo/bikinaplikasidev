<?php 
    echo "<div class='col-md-12'>
              <div class='box box-info'>
                <div class='box-header with-border'>
                  <h3 class='box-title'>Tambah Data Pembayaran Reseller</h3>
                </div>
              <div class='box-body'>";

                $list_rekenings = [];

                foreach ($rb_rekening_reseller as $item) {
                    $list_rekenings[] = "<option value='$item[id_rekening_reseller]'>$item[no_rekening] ($item[pemilik_rekening])</option>";
                }

                $list_rekenings = "<select name='id_rekening' class='form-control'>". implode("", $list_rekenings)  ."</select>";

              $attributes = array('class'=>'form-horizontal','role'=>'form');
              echo form_open_multipart('administrator/pembayaran_reseller_simpan',$attributes);
          echo "<div class='col-md-12'>
                  <table class='table table-condensed table-bordered'>
                  <tbody>
                    <tr><th scope='row'>Total Transfer</th>                <td><input class='form-control' type='number' name='total_transfer'></td></tr>
                    <tr><th scope='row'>Ke Rekening</th>                <td>$list_rekenings</td></tr>
                    <tr><th scope='row'>Nama Pengirim</th>                <td><input class='form-control' type='text' name='nama_pengirim'></td></tr>
                    <tr><th scope='row'>Tanggal Transfer</th>                <td><input class='form-control' type='date' name='tanggal_transfer' value='<?php echo date('Y-m-d') ?></td></tr>
                    <tr><th scope='row'>Bukti Transfer</th>                <td><input class='form-control' type='file' name='bukti_transfer'></td></tr>
                    <tr><th scope='row'>Status Transaksi</th>                <td><input type='radio' value='Proses' name='status_transaksi' checked> Proses <input type='radio' value='Konfirmasi' name='status_transaksi'> Konfirmasi</td></tr>
                  </tbody>
                  </table>
                </div>
              </div>
              <div class='box-footer'>
                    <button type='submit' name='submit' class='btn btn-info'>Tambah</button>
                    <a href='index.php'><button type='button' class='btn btn-default pull-right'>Cancel</button></a>
                    
                  </div>
            </div>";

//                    <tr><th scope='row'>Jenis Kelamin</th>                <td><input type='radio' value='Laki-laki' name='d' checked> Laki-laki <input type='radio' value='Perempuan' name='d'> Perempuan</td></tr>
//                    <tr><th scope='row'>Alamat Lengkap</th>               <td><input class='form-control' type='text' name='e'></td></tr>
//                    <tr><th scope='row'>No Hp</th>                        <td><input class='form-control' type='number' name='f'></td></tr>
//                    <tr><th scope='row'>Alamat Email</th>                 <td><input class='form-control' type='email' name='g'></td></tr>
//                    <tr><th scope='row'>Kode Pos</th>                     <td><input class='form-control' type='number' name='h'></td></tr>
//                    <tr><th scope='row'>Keterangan</th>                   <td><input class='form-control' type='text' name='i'></td></tr>
//                    <tr><th scope='row'>Referral</th>                     <td><input class='form-control' type='text' name='j'></td></tr>
//                     <tr><th scope='row'>Foto</th>                        <td><input type='file' class='form-control' name='gg'></td></tr>
