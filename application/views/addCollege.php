<?php  include("inc/header.php"); ?>
<div class="container">

<h1>Add College!</h1>
<hr>
<?php if($message= $this->session->flashdata('message')): ?>
  <div class="alert alert-dismissible alert-warning">
  <?php echo $message ?>
  </div>
<?php endif?>
<?php echo form_open('admin/createCollege');?>



<div class="row">
<div class="col-md-6">
<div class="form-group">
 <label for="collegeName" class="col-md-3 control-label"> College Name
 </label>
 <div class="col-md-9">
 <?php echo form_input(['name'=>'collegeName','class'=>'form-control','placeholder'=>'College Name','value'=>set_value('collegeName') ]) ?>
 </div>
    <div class="col-md-6">
    <?php echo form_error('collegeName','<div class="error alert text-danger">', '</div>') ?>
    </div>
</div>
</div>
</div>



<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="branch" class="col-md-6 control-label">Branch
      </label>
      <div class="col-md-9">
      <?php echo form_input(['name'=>'branch','class'=>'form-control','placeholder'=>' Branch' ]) ?>
      </div>
      <div class="col-md-8">
        <?php echo form_error('branch','<div class="error alert text-danger">', '</div>') ?>
        </div>
    </div>
  </div>
</div>
<?php echo form_submit('submit', 'Add!',['class'=>'btn btn-primary']);?>
<?php echo anchor('home','Back',['class'=>'btn btn-primary'])?>
<?php echo form_close() ?>
</div>
<?php include('inc/footer.php')?>
