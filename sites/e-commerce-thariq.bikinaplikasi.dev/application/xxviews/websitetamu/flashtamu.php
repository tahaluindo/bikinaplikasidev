<?php if($this->session->flashdata('berhasil') != '') { ?>
<div class="alert alert-success">
    <?php echo $this->session->flashdata('berhasil') ?>
</div>
<?php } ?>

<?php if($this->session->flashdata('gagal') != '') { ?>
<div class="alert alert-danger">
    <?php echo $this->session->flashdata('gagal') ?>
</div>
<?php } ?>