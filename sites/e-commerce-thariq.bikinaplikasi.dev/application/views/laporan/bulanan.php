<div id="page-wrapper">
    <div class="well">
    <div class="row" style="padding-top: 10px">
        <div class="col-lg-6">
            <p style="font-size: 24px">DATA TRANSAKSI BULANAN</p>
        </div>
        <div class="col-lg-6">
            <div class="row">
                <div class="col-md-6">
                    <select name="bulan" id="bulan" class="form-control">
                        <option value="">--Bulan--</option>
                        <?php foreach($bulan as $key => $val) { ?>
                        <option 
                        value="<?php echo $key ?>"
                        <?php echo ($key == $this->session->userdata('bt_bulan') ? 'selected' : '') ?>
                        >
                            <?php echo $val ?>
                        </option>
                        <?php } ?>
                       
                    </select>
                </div>
                <div class="col-md-6">
                    <select name="tahun" id="tahun" class="form-control">
                        <option value="">--Tahun--</option>
                        <?php for($i = date('Y'); $i > 2016; $i--) { ?>
                        <option 
                        value="<?php echo $i ?>"
                        <?php echo ($i == $this->session->userdata('bt_tahun') ? 'selected' : '')?>
                        >
                            <?php echo $i ?>        
                        </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div class="row">
        <div class="col-lg-12" id="tampilbulanan">
            
        </div>
        
    </div>
    </div>
</div>
<!-- /#page-wrapper -->   

<script>
$(document).ready(function(){
    $(function(){
        var tahun = $('#tahun').val();
        var bulan = $('#bulan').val();
        getBulanan(bulan,tahun);
    });

    $('#bulan').on('change',function(e){
        e.preventDefault();
        var bulan = $(this).val();
        var tahun = $('#tahun').val();
        //console.log(bulan + ' ' + tahun);
        getBulanan(bulan,tahun);
    });

    $('#tahun').on('change',function(e){
        e.preventDefault();
        var tahun = $(this).val();
        var bulan = $('#bulan').val();
        //console.log(bulan + ' ' + tahun);
        getBulanan(bulan,tahun);
    });

    function getBulanan(bln,thn) {
        var url = "<?php echo site_url('laporan/bulan_tampil') ?>";

        $.post(url,{'bulan':bln,'tahun':thn},function(data){
            $('#tampilbulanan').html(data);
        });
    }
})
</script>