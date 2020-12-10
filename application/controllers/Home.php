<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
 function __construct(){
   parent::__construct();
   //$this->load->queries()
 }

	public function index()	{
    $adminExsist = $this->queries->checkAdminExits(); 
   $this->load->view('home',['adminExsist'=>$adminExsist]);
  }
  
  function registeradmin(){
    $adminExsist = $this->queries->checkAdminExits(); 
    if($adminExsist){
     redirect('home/adminlogin');
    }
   $roles =$this->queries->getRoles();
    $this->load->view('register',['roles'=>$roles]);
  }

         
  function signup(){
   $this->form_validation->set_rules('username','Username','required');
   $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[tbl_users.email]');
   $this->form_validation->set_rules('gender','Gender','required');
   $this->form_validation->set_rules('role_id','Role','required');
   $this->form_validation->set_rules('password','Password','trim|required');
   $this->form_validation->set_rules('password1','Confirm password','trim|required|matches[password]');
   $this->form_validation->set_error_delimiters('<div class="error alert text-danger">','</div>');
   if($this->form_validation->run()== True){
      if($this->queries->registeradmin()){
      $this->session->set_flashdata('message','Successfully registered');
      redirect('home/registeradmin');
      }else{
        $this->session->set_flashdata('message','Failed to registered');
        redirect('home/registeradmin','refresh');
      }
   }else{
     $this->registeradmin();
     
   }
 
   }

   function adminlogin(){
     if($this->session->userdata('role_id')){
       redirect('admin/dashboard');
     }
    $this->load->view('login'); 
   }

   
   function signin(){
    $this->form_validation->set_rules('email','Email','trim|required');
    $this->form_validation->set_rules('password','Password','trim|required');
    $this->form_validation->set_error_delimiters('<div class="error alert text-danger">','</div>');
    if($this->form_validation->run()== True){
       if($userexist= $this->queries->adminSignin()){
            if ($userexist->role_id == 1){
            $sessdata = array(
              'user_id'  => $userexist->user_id,
              'email'     => $userexist->email,
              'username' => $userexist->username,
              'gender'     => $userexist->gender,
              'role_id' => $userexist->role_id
            );
            $this->session->set_userdata($sessdata );
            $this->session->set_flashdata('message','Successfully Logged In');
          redirect('admin/dashboard');
          }else if($userexist->role_id >1){
            $sessdata = array(
              'user_id'  => $userexist->user_id,
              'email'     => $userexist->email,
              'username' => $userexist->username,
              'gender'     => $userexist->gender,
              'role_id' => $userexist->role_id,
              'college_id'=> $userexist->college_id
            );
            $this->session->set_userdata($sessdata );
            $this->session->set_flashdata('message','Successfully Logged In');
          redirect('Coadmin/dashboard');
          }

       }else{
         $this->session->set_flashdata('message','Failed to login, check email/password');
         redirect('home/adminlogin','refresh');
       }
    }else{
      $this->adminlogin();
      echo validation_errors();
     
    }
     //
  }
 function logout(){
    $this->session->sess_destroy();
   $this->adminlogin();
    }

}
