<div class="main-content" id="panel">
	<nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      	<div class="container-fluid">
        	<div class="collapse navbar-collapse" id="navbarSupportedContent">
          		<ul class="navbar-nav align-items-start  mr-auto ">
					<li class="nav-item d-xl-none">
						<div class="pr-3 sidenav-toggler sidenav-toggler-dark active" data-action="sidenav-pin" data-target="#sidenav-main">
							<div class="sidenav-toggler-inner">
								<i class="sidenav-toggler-line"></i>
								<i class="sidenav-toggler-line"></i>
								<i class="sidenav-toggler-line"></i>
							</div>
						</div>
					</li>
					<li class="nav-item d-sm-none">
						<a class="nav-link" href="#" data-action="search-show" data-target="#navbar-search-main">
							<i class="ni ni-zoom-split-in"></i>
						</a>
					</li>
          		</ul>

				<ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
					<li class="nav-item dropdown">
						<a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<div class="media align-items-center">
								<div class="media-body  ml-2  d-none d-lg-block">
                                <i class="fa fa-user fa-lg"></i>
									<span class="mb-0 text-sm  font-weight-bold">
<i class='fa fa-lg fa-user'><i><?php echo ucwords($this->session->userdata('username')); ?></span>
								</div>
							</div>
						</a>
						<div class="dropdown-menu dropdown-menu-right">
							<a href="home/profile" class="dropdown-item">
								<i class="ni ni-single-02"></i>
								<span>Profile</span>
							</a>
							<a href="<?php echo site_url('Auth/logout/'); ?>" class="dropdown-item">
								<i class="fa fa-times"></i>
								<span>Logout</span>
							</a>
						</div>
					</li>
				</ul>
        	</div>
      	</div>
    </nav>

    <div class="header bg-primary pb-6">
      	<div class="container-fluid">
        	<div class="header-body">
          		<div class="row align-items-center py-4">
            		<div class="col-lg-6 col-7">
						<nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
							<ol class="breadcrumb breadcrumb-links breadcrumb-dark">
								<li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
								<li class="breadcrumb-item active" aria-current="page">Profile</li>
							</ol>
						</nav>
            		</div>
          		</div>
        	</div>
      	</div>
    </div>

    <div class="container-fluid mt--6">
      	<div class="row">
        	<div class="col-6">
          		<div class="card">
					<div class='card-body'>
					<?php echo form_open('home/profile',array("class"=>"form-horizontal")); ?>
          	<div class="row">
              <div class="col-md-12">
                 <div class="box box-info">
                      <div class="box-header with-border">
                        <h3>Profile</h3>
                      </div>
                      <br>
                    	<div class="form-group">
                    		<label for="username" class="control-label"><span class="text-danger">*</span>Username</label>
                    		<div class="col-md-8">
                    			<input type="text" name="username" value="<?php echo $this->session->userdata('username'); ?>" placeholder="Username" class="form-control" id="username" />
                    			<span class="text-danger"><?php echo form_error('username');?></span>
                    		</div>
                    	</div>
                    	<div class="form-group">
                    		<label for="password" class="control-label"><span class="text-danger">*</span>Password</label>
                    		<div class="col-md-8">
                    			<input type="password" name="password" value="" class="form-control" id="password" placeholder="Password"/>
                    			<span class="text-danger"><?php echo form_error('password');?></span>
                    		</div>
                    	</div>
                      <div class="form-group">
                    		<label for="password" class="control-label"><span class="text-danger">*</span>Re-Password</label>
                    		<div class="col-md-8">
                    			<input type="password" name="password2" value="" class="form-control" id="password2" placeholder="Repeat Password"/>
                    			<span class="text-danger"><?php echo form_error('password2');?></span>
                    		</div>
                    	</div>

                    	<div class="form-group">
                    		<div class="col-sm-offset-9 col-sm-2">
                    			<button type="submit" name="btnsimpan" class="btn btn-success">Save</button>
                        </div>
                    	</div>
                      <br>
                    </div>
              </div>
          </div>
          <?php echo form_close(); ?>
					</div>
				</div>
        	</div>
    	</div>
	</div>
</div>


<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Profile</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Profile</li>
      </ol>
    </section>
