<div id="page-wrapper">
    <div class="well">
    <div class="row" style="padding-top: 10px">
        <div class="col-lg-6">
            <p style="font-size: 24px">DATA TRANSAKSI TAHUNAN</p>
        </div>
        <div class="col-lg-6">
            <select name="tahun" id="tahun" class="form-control">
                <option value="">--Tahun--</option>
                <?php for($i = date('Y'); $i >= 2017; $i--) { ?>
                <option value="<?php echo $i ?>"><?php echo $i ?></option>
                <?php } ?>
            </select>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12" id="tampiltahunan">
                        
        </div>
        
    </div>
    </div>
</div>
<!-- /#page-wrapper --> 

<script>
$(document).ready(function(){
    
    $('#tahun').on('change',function(e){
        e.preventDefault();
        var thn = $(this).val();
        
        var url = "<?php echo site_url('laporan/tahun_tampil') ?>";

        $.post(url,{'tahun':thn},function(data){
            $('#tampiltahunan').html(data);
        });
    });
})
</script>  