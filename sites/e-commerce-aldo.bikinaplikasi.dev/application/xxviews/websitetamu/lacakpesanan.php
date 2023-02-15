<div id="content">
    <div class="container-fluid">     
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url(); ?>">Home</a></li>
                    <li><a href="#">Lacak Pesanan</a></li>
                </ul>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class="row">
                    
                    <div class="col-md-12">
                        
                        <div class="row products" style="min-height: 350px">
                            
                            <div class="col-md-6 col-sm-6">
                                
                                <div class="input-group">
                                    <input type="text" class="form-control" name="qresi" placeholder="Masukan no resi..." id="qresi">
                                    <span class="input-group-btn">
                                        <button type="submit" id="cari" class="btn btn-primary"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>    
                            </div>
                                                        
                            <div class="col-md-12">
                                <hr>
                                <div id="hasil"></div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
    $('#cari').on('click',function(){
        var vl = $('#qresi').val();
        var url = '<?php echo site_url("aplikasi/cariresi") ?>';

        $.get(url,{qresi:vl},function(data){
            $('#hasil').html(data);
        },'html');
    })
});
</script>