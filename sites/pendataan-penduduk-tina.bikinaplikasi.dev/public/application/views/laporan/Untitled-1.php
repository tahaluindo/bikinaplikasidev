<tr>
                <td colspan=3>Total</td>
                <?php foreach($agamas as $index => $agama): ?>
                
                <td><?php echo $jumlah_penduduk_lk[$agama][$index]; ?></td>
                <td><?php echo $jumlah_penduduk_pr[$agama][$index]; ?></td>
                <td><?php echo $jumlah_penduduk[$agama][$index]; ?></td>
                <?php endforeach; ?>

                <td><?php echo $total_penduduk_lk; ?></td>
                <td><?php echo $total_penduduk_pr; ?></td>
                <td><?php echo $total_penduduk; ?></td>
            </tr>