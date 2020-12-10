<?php  include("inc/header.php"); ?>
<div class="container">
<hr>

<h1>Admin Dashboard!</h1>
<?php echo $this->session->userdata('email'); ?>
<?php if($message= $this->session->flashdata('message')): ?>
  <div class="alert alert-dismissible alert-warning">
  <?php echo $message ?>
  </div>
<?php endif?>
<h3>
Welcome <b>
<?php echo $this->session->userdata('username'); ?>
</b> </h3>
<hr>
<?php echo anchor('admin/addCollege','Add College',['class'=>'btn btn-primary']) ?> 
<?php echo anchor('admin/addCoAdmin','Add Co-Admin',['class'=>'btn btn-primary','style'=>'margin-right:5px']) ?>
<?php echo anchor('admin/addStudent','Add Student',['class'=>'btn btn-primary']) ?>
<hr>
<div class="row">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">ID </th>
<th scope="col">College Name </th>
<th scope="col">Username </th>
<th scope="col">Email </th>
<th scope="col">Role </th>
<th scope="col">Gender </th>
<th scope="col">Branch </th>
<th scope="col">Action </th>
</tr>
</thead>
<tbody>
<?php if(count($users)): ?>

<?php foreach($users as $user):?>
  <tr class="table-active">
<td> <?php echo $user->college_id?></td>
<td> <?php echo $user->collegename?></td>
<td> <?php echo $user->username?></td>
<td> <?php echo $user->email?></td>
<td> <?php echo $user->rolename?></td>
<td> <?php echo $user->gender?></td>
<td> <?php echo $user->branch?></td>
<td> <?php echo anchor("admin/viewcollege/{$user->college_id}",' View Students',['class'=>'btn btn-outline-primary']) ?></td>
</tr>
<?php endforeach;?>

<?php else :?>
<?php
echo "No record found";
?>
<?php endif; ?>
</tbody>

</table>
</div>








<?php include('inc/footer.php')?>
