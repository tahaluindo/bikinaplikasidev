<div id="page-wrapper">
    <div class="well">
    <div class="row" style="padding-top: 10px">
        <div class="col-lg-6">
            <p style="font-size: 24px">DATA TRANSAKSI HARIAN</p>
        </div>
        <div class="col-lg-6">
            <input type="text" name="tanggal" id="tanggal" class="form-control tanggal" placeholder="Tanggal" value="">
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12" id="tampilharian">
            
        </div>
        
    </div>
    </div>
</div>
<!-- /#page-wrapper -->   

<script>
$(document).ready(function(){
    $('#tanggal').on('change',function(e){
        e.preventDefault();
        var tgl = $(this).val();
        var url = "<?php echo site_url('laporan/harian_tampil') ?>";
        //alert(tgl);
        //console.log(tgl);

        $.post(url,{'tanggal':tgl},function(data){
            $('#tampilharian').html(data);
        });
    });
})
</script>