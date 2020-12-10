<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to college management System</title>
<link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
<body>


	
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary " style= height:40px>
  <a class="navbar-brand text-center" style = "position:absolute; left:80px"  href="#">Welcome to college management System</a>

  <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Link</a></li>
      </ul>

 


    <ul class="navbar-nav" style = "position:absolute;right: 150px;">
  <?php $role_id = $this->session->userdata('role_id')?>
<?php echo $role_id; ?>
<?php if($role_id == '1'):?>
      <li class="nav-item dropdown show">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="true">Setting</a>
        <div class="dropdown-menu show">

        <?php echo anchor('admin/dashboard','Dashboard',["class"=>"dropdown-item"]);?>
        <a class="dropdown-item" href="#">View Co Admin</a>
        <?php echo anchor('home/logout','logout',["class"=>"dropdown-item"])?>
<?php else: ?> 
  
<?php endif;?>
     
      </li>
    </ul>



</nav>

















<div class="container">
