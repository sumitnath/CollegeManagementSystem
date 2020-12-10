<?php  include("inc/header.php"); ?>
<div class="container">

<h1>Add Students!</h1>
<hr>
<?php if($message= $this->session->flashdata('message')): ?>
  <div class="alert alert-dismissible alert-warning">
  <?php echo $message ?>
  </div>
<?php endif?>
<?php echo form_open('admin/createstudent');?>

<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="studentname" class="col-md-3 control-label"> Student Name
      </label>
        <div class="col-md-9">
        
        <?php echo form_input(['name'=>'studentname','class'=>'form-control','placeholder'=>'Student Name','value'=> set_value('studentname')]) ?>
        </div>
        <div class="col-md-8">
        <?php echo form_error('studentname','<div class="error alert text-danger">', '</div>') ?>
        </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-md-6">
  <div class="form-group">
  <label class="col-md-3 control-label"> College Name
  </label>
  <div class="col-md-12">
   <select name="college_id" class="col-md-9">
   <option value=""> Select </option> 
  <?php foreach($colleges as $college) :?>
 <option value=<?php echo $college->college_id?>><?php echo $college->collegename?></option>
  <?php endforeach; ?>
  </select>
  </div>
  <div class="col-md-8">
        <?php echo form_error('role_id','<div class="error alert text-danger">', '</div>') ?>
        </div>
  </div>
  </div>
</div>

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
  <label for="gender" class="col-md-3 control-label"> Gender
  </label>
  <div class="col-md-9">
  <?php $option = array('male'=>'Male','female'=>'Female') ?>
  <?php echo form_dropdown(['name'=>'gender','class'=>'form-control','placeholder'=>'Gender', ],$option,'male') ?>
  </div>
  <div class="col-md-8">
        <?php echo form_error('gender','<div class="error alert text-danger">', '</div>') ?>
        </div>
  </div>
  </div>
</div>
<div class="row">
  <div class="col-md-6">
    <div class="form-group">
      <label for="course" class="col-md-6 control-label">Course
      </label>
      <div class="col-md-9">
      <?php echo form_input(['name'=>'course','class'=>'form-control','placeholder'=>' Course' ]) ?>
      </div>
      <div class="col-md-8">
        <?php echo form_error('course','<div class="error alert text-danger">', '</div>') ?>
        </div>
    </div>
  </div>
</div>

<?php echo form_submit('submit', 'Register!',['class'=>'btn btn-primary']);?>
<?php echo anchor('home','Back',['class'=>'btn btn-primary'])?>
<?php echo form_close() ?>
</div>
<?php include('inc/footer.php')?>
