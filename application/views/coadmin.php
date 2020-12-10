<?php  include("inc/header.php"); ?>
<div class="container">
<hr>

<h1>Co Admin Dashboard!</h1>
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

<hr>
<div class="row">
<table class="table table-hover">
<thead>
<tr>
<th scope="col">Student ID </th>
<th scope="col">College Name </th>
<th scope="col">Student Name </th>
<th scope="col">Email </th>
<th scope="col">Course </th>
<th scope="col">Gender </th>
<th scope="col">Branch </th>

</tr>
</thead>
<tbody>
<?php if(count($students)): ?>

<?php foreach($students as $student):?>
  <tr class="table-active">
<td> <?php echo $student->id?></td>
<td> <?php echo $student->collegename?></td>
<td> <?php echo $student->studentname?></td>
<td> <?php echo $student->email?></td>
<td> <?php echo $student->course?></td>
<td> <?php echo $student->gender?></td>
<td> <?php echo $student->branch?></td>

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
