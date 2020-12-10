<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coadmin extends MY_Controller {
  function __construct(){
    parent::__construct();
  
   }
  
public function dashboard(){
$college_id =$this->session->userdata('college_id');
$students = $this->queries->viewcollege_M($college_id);

$this->load->view('coadmin',['students'=>$students]);
}

}
