<div class="panel panel-default sidebar-menu">

    <div class="panel-heading">
        <h3 class="panel-title"><?php echo $user->nama ?></h3>
    </div>

    <div class="panel-body">

        <ul class="nav nav-pills nav-stacked">
            <li class="active">
                <a href="<?php echo site_url('webuser') ?>"><i class="fa fa-list"></i> My orders</a>
            </li>
            
            <li>
                <a href="<?php echo site_url('webuser/akunuser') ?>"><i class="fa fa-user"></i> My account</a>
            </li>
            <li>
                <a href="<?php echo site_url('webuser/logout') ?>"><i class="fa fa-sign-out"></i> Logout</a>
            </li>
        </ul>
    </div>

</div>