<?php  include("inc/header.php"); ?>


<h1>Welcome to college management System!</h1>
<div class="jumbotron">
  <h2 class="display-3" style="text-align:center"> Admin & Co Admin !</h2>
  <hr>
<div class="my-4">
<div class="row">
<?php echo gettype($adminExsist) ?>

<?php if($adminExsist >0): ?>

  <?php else : ?>
    <div class="col-lg-4">
<?php echo anchor("Home/registeradmin","ADMIN REGISTER",['class'=> 'btn btn-primary']);?>
  </div>
  <?php endif;?>
  <div class="col-lg-4">
  <?php echo anchor("Home/adminlogin", "ADMIN LOGIN", ['class'=>'btn btn-primary']);?>
    </div>
  
</div>

</div>
</div>



<?php include('inc/footer.php')?>
