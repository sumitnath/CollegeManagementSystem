<?php  include("inc/header.php"); ?>
<div class="container">
<hr>


<h1>College Dashboard!</h1>
<?php if($message= $this->session->flashdata('message')): ?>
  <div class="alert alert-dismissible alert-warning">
  <?php echo $message ?>
  </div>
<?php endif?>
<h3>


  <h3 class="display-4">Welcome to 
  <!-- PHP Foreach for single result?
 Run foreach loop just one time  -->
  <?php foreach($data as $law): ?> 
    <?php echo "$law->collegename" .', '."$law->branch"; ?>
    <?php break; ?>

<?php endforeach; ?>

  </h3>
<hr>
<?php echo anchor('admin/dashboard','Back',['class'=>'btn btn-primary'])?>
<div class="row">
<table class="table table-hover">
<thead>
<tr>

<th scope="col">College Name </th>
<th scope="col">Branch </th>
<th scope="col">Student Name </th>
<th scope="col">Email </th>
<th scope="col">Gender </th>
<th scope="col">Course </th>
<th scope="col">Action </th>
</tr>
</thead>
<tbody>
<?php if(count($data)): ?>

<?php foreach($data as $dat):?>
  <tr class="table-active">
 <?php  $dat->id ?>
<td> <?php echo $dat->collegename?></td>
<td> <?php echo $dat->branch?></td>
<td> <?php echo $dat->studentname?></td>
<td> <?php echo $dat->email?></td>
<td> <?php echo $dat->gender?></td>
<td> <?php echo $dat->course?></td>
<td> <?php echo anchor("admin/editStudent/{$dat->id}",' Edit Students',['class'=>'btn btn-outline-primary']) ?>&nbsp
<?php echo anchor("admin/deleteStudent/{$dat->id}",' Delete Students',['class'=>'btn btn-outline-danger']) ?></td>
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
