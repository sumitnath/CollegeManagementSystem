<?php  include("inc/header.php"); ?>
<div class="container">

<h1>Admin Login!</h1>
<hr>
<?php if($message= $this->session->flashdata('message')): ?>
  <div class="alert alert-dismissible alert-warning">
  <?php echo $message ?>
  </div>
<?php endif?>
<?php echo form_open('home/signin');?>



<div class="row">
<div class="col-md-6">
<div class="form-group">
 <label for="email" class="col-md-3 control-label"> Email
 </label>
 <div class="col-md-9">
 <?php echo form_input(['name'=>'email','class'=>'form-control','placeholder'=>'Email','value'=>set_value('email') ]) ?>
 </div>
    <div class="col-md-6">
    <?php echo form_error('email','<div class="error alert text-danger">', '</div>') ?>
    </div>
</div>
</div>
</div>



<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="password" class="col-md-6 control-label">Password
      </label>
      <div class="col-md-9">
      <?php echo form_password(['name'=>'password','class'=>'form-control','placeholder'=>' Password' ]) ?>
      </div>
      <div class="col-md-8">
        <?php echo form_error('password','<div class="error alert text-danger">', '</div>') ?>
        </div>
    </div>
  </div>
</div>
<?php echo form_submit('submit', 'Login!',['class'=>'btn btn-primary']);?>
<?php echo anchor('home','Back',['class'=>'btn btn-primary'])?>
<?php echo form_close() ?>
</div>
<?php include('inc/footer.php')?>
