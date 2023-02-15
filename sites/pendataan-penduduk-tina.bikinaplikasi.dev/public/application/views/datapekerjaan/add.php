<div class="container-fluid  dashboard-content">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="page-header">
				<h3 class="mb-2">Kependudukan</h3>
				<p class="pageheader-text">Lorem ipsum dolor sit ametllam fermentum ipsum eu porta
					consectetur adipiscing
					elit.Nullam vehicula nulla ut egestas rhoncus.</p>
				<div class="page-breadcrumb">
					<nav aria-label="breadcrumb">
						<ol class="breadcrumb">
							<li class="breadcrumb-item active"><a href="{{ url('') }}/#" class="breadcrumb-link">Tambah
									Pekerjaan</a>
							</li>
						</ol>
					</nav>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
			<div class="card">
				<div class="card-body">
				<?php echo form_open('DataPekerjaan/add', array("class"=>"form-horizontal" , "enctype" => 'multipart/form-data')); ?>
					<div class="row">
						<div class="col-md-12">
							<div class="box box-info">
								<div class="box-header with-border">
									<?php echo $this->session->flashdata('msg'); ?>
									<h3>Input Data Pekerjaan</h3>
								</div>
								<div class="box-body">
									<div class="form-group">
										<label for="keterangan" class="control-label"><span
												class="text-danger">*</span>Keterangan</label>
										<div class="col-md-10">
											<input type="text" name="keterangan"
												value="<?php echo $this->input->post('keterangan'); ?>"
												class="form-control form-control-sm" id="keterangan" />
											<span class="text-danger"><?php echo form_error('keterangan');?></span>
										</div>
									</div>

									<div class="form-group">
										<div class="col-sm-offset-11 col-sm-1">
											<button type="submit" class="btn btn-success">Save</button>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<?php echo form_close(); ?>
				</div>
				<div id="sparkline-1"></div>
			</div>
		</div>
	</div>
</div>