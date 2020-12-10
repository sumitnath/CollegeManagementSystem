<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Queries extends CI_Model {

  function getRoles(){
    $roles =$this->db->get('tbl_role');
    if($roles->num_rows() > 0){
      return $roles->result();
    }
  }
function registeradmin(){   
  $data= $this->input->post();
  unset($data['submit']);
  $data['password']=sha1($this->input->post('password')); 
  $data['password1']=sha1($this->input->post('password1'));
    $user = $this->db->insert('tbl_users',$data);
return $user;
}

function checkAdminExits(){
    $chkAdmin= $this->db->where(['role_id'=>'1'])
        ->get('tbl_users');
  if($chkAdmin->num_rows() > 0){
    return $chkAdmin->num_rows();
  }
}

function adminSignin(){
  $data['email']= $this->input->post('email');
  $data['password']= sha1($this->input->post('password'));
  $logadmin = $this->db->where($data)
     ->get('tbl_users');
  if($logadmin->num_rows() > 0){
    return $logadmin->row();
      }
  }
 function createCollege_m(){
  $data= $this->input->post();
    unset($data['submit']);
    $query= $this->db->insert('tbl_college',$data);
     return $query;
 }

function getcollege(){
$college = $this->db->get('tbl_college');
  if($college->num_rows()>0){
    return $college->result();
  }
}

function CoAdminSignup_M(){
 $data= $this->input->post();
  unset($data['submit']);
  $data['password']=sha1($this->input->post('password')); 
  $data['password1']=sha1($this->input->post('password1'));
 
  return $this->db->insert('tbl_users',$data);  
}

function Collegedetail(){
  $this->db->select(['tbl_users.user_id','tbl_users.username','tbl_college.college_id','tbl_college.collegename','tbl_college.branch','tbl_role.rolename','tbl_users.email','tbl_users.gender']);
  $this->db->from('tbl_college');
  $this->db->join('tbl_users','tbl_college.college_id=tbl_users.college_id');
  $this->db->join('tbl_role','tbl_role.role_id= tbl_users.role_id');
  $query =$this->db->get();
  return $query->result();
}

function addStudent_M(){
  $data =$this->input->post();
  unset($data['submit']);
 return $this->db->insert('tbl_student',$data);
}
//add two tbls and using where to get desired data
function viewcollege_M($college_id){
  $this->db->select(['tbl_student.id','tbl_student.studentname','tbl_student.gender','tbl_student.course','tbl_student.email','tbl_college.collegename','tbl_college.branch']);
  $this->db->from('tbl_college');
  $this->db->join('tbl_student','tbl_college.college_id=tbl_student.college_id');
  $this->db->where('tbl_student.college_id',$college_id);
  return $this->db->get() ->result();
}

function editStudent_M($id){
 $this->db->select(['tbl_student.id','tbl_student.college_id','tbl_student.studentname','tbl_student.gender','tbl_student.course','tbl_student.email','tbl_college.collegename','tbl_college.branch']);
 $this->db->from('tbl_student');
 $this->db->join('tbl_college','tbl_college.college_id=tbl_student.college_id');

return $this->db->where('tbl_student.id',$id)
  ->get()->row_array();
}

 function updateStudent_M($id){
  $data =$this->input->post();
  unset($data['submit']);
  $this->db->where('id',$id);
  $query =$this->db->update('tbl_student',$data);
 return $query;
 }

function deleteStudent_M($id){
  $this->db->where('id', $id);
 return $this->db->delete('tbl_student');
}

}
?>

