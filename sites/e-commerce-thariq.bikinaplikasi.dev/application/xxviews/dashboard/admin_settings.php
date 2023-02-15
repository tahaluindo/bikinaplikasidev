<div id="page-wrapper" >
    <div class="header"> 
        <h3 class="page-header">
            SETTINGS ADMIN
        </h3>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="#">SETTINGS</a></li>
            <li class="active">SETTINGS ADMIN</li>
        </ol>                         
    </div>

    <div id="page-inner"> 
        <div class="row">
            <div class="col-xs-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-6">
                                
                            </div>
                            <div class="col-md-6 text-right">
                                
                            </div>
                        </div>
                        
                    </div>
                    <div class="panel-body">
                        <form method="post" action="<?php echo site_url('dashboard/editAdmin/'.$user->id) ?>">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" value="<?php echo $user->nama ?>" class="form-control input-sm" placeholder="Nama" required />
                            </div>
                                           
                            <div class="form-group">
                                <label>Username</label>
                                <input type="text" name="username" value="<?php echo $user->username ?>" class="form-control input-sm" placeholder="Username" required />
                            </div>
                            <div class="form-group">
                                <label>Password (Kosongkan Jika tidak diganti)</label>
                                <input type="password" name="password" class="form-control input-sm" placeholder="Password"/>
                            </div>
                            
                           

                             <div class="form-group">
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>