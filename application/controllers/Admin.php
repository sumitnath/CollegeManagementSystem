<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller {
 function __construct(){
   parent::__construct();
   if(!$this->session->userdata('user_id')){
    redirect('home/signin');
  }

 }

function dashboard(){
$admin = ($this->session->userdata('role_id') == 1);
if($admin){
    $users = $this->queries->Collegedetail();
    $this->load->view('dashboard',['users'=>$users]);
} else{
 redirect('coadmin/dashboard');
}
}
function addCollege(){
$this->load->view('addCollege');
}

function createCollege(){
  $this->form_validation->set_rules('collegeName','College Name','trim|required');
    $this->form_validation->set_rules('branch','Branch','trim|required');
    $this->form_validation->set_error_delimiters('<div class="error alert text-danger">','</div>');
    if($this->form_validation->run()== True){
       if($userexist= $this->queries->createCollege_m()){
       $this->session->set_flashdata('message','Successfully College added');
       redirect('admin/dashboard');
       }else{
         $this->session->set_flashdata('message','Failed to add college');
        $this->addCollege();
       }
    }else{
      $this->addCollege();
      echo validation_errors();
     
    }
   
 }
function addCoAdmin(){
  $roles =$this->queries->getRoles();
  $colleges = $this->queries->getcollege();
  $this->load->view('addCoAdmin',['roles'=>$roles,'colleges'=>$colleges]);

}
function CoAdminSignup(){
  $this->form_validation->set_rules('username','Username','required');
  $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[tbl_users.email]');
  $this->form_validation->set_rules('gender','Gender','required');
  $this->form_validation->set_rules('role_id','Role','required');
  $this->form_validation->set_rules('college_id','college','required');
  $this->form_validation->set_rules('password','Password','trim|required');
  $this->form_validation->set_rules('password1','Confirm password','trim|required|matches[password]');
  $this->form_validation->set_error_delimiters('<div class="error alert text-danger">','</div>');
  if($this->form_validation->run()== True){
     if($this->queries->CoAdminSignup_M()){
     $this->session->set_flashdata('message','Successfully Co Admin registered');
     redirect('admin/dashboard');
     }else{
       $this->session->set_flashdata('message','Failed to registered');
       $this->addCoAdmin();
     }
  }else{
    $this->addCoAdmin();
    
  }
}
function addStudent(){
  $colleges = $this->queries->getcollege();
  $this->load->view('addStudent_v',['colleges'=>$colleges]);
  }
function createstudent(){
  $this->form_validation->set_rules('studentname','Student Name','trim|required');
  $this->form_validation->set_rules('email','Email','trim|required|valid_email|is_unique[tbl_student.email]');
  $this->form_validation->set_rules('gender','Gender','required');
  $this->form_validation->set_rules('college_id','College Name','required');
  $this->form_validation->set_rules('course','Course','required');
  if($this->form_validation->run()=== True){
     if($this->queries->addStudent_M()){
       $this->session->set_flashdata('message','Student data successfully inserted');
       redirect('admin/dashboard');
     }else{
      $this->session->set_flashdata('message','Student data not inserted');
      $this->addStudent();
     }
  }else{

    $this->addStudent();
  }
}

function viewcollege($college_id){
$data = $this->queries->viewcollege_M($college_id);
$this->load->view('viewcollege_v',['data'=>$data]);
}
  
function editStudent($id){
    $data= $this->queries->editStudent_M($id);
    $colleges = $this->queries->getcollege();
  $this->load->view('editStudent_v',['data'=>$data,'colleges'=>$colleges]);
  }

  function updateStudent($id){
  
    $this->form_validation->set_rules('studentname','Student Name','trim|required');
    $this->form_validation->set_rules('email','Email','trim|required|valid_email');
    $this->form_validation->set_rules('gender','Gender','required');
    $this->form_validation->set_rules('college_id','College Name','required');
    $this->form_validation->set_rules('course','Course','required');
    if($this->form_validation->run()=== True){
       if( $this->queries->updateStudent_M($id)){
         $this->session->set_flashdata('message','Student data successfully Updated'); 
         redirect('admin/dashboard');
       }else{
        $this->session->set_flashdata('message','Student data not inserted');
        $this->editStudent($id);
       }
    }else{
   $this->editStudent($id);
    }
  }

 function deleteStudent($id){
$this->queries->deleteStudent_M($id);
redirect('admin/dashboard');
 }

}


