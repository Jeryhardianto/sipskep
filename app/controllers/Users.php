<?php 
class Users extends Controller{
    public function index(){
     
      $data['judul']      = 'Users | SIPSKEP';
      
      $data['users'] = $this->model('User_model')->getAllUsers();
       $this->view('template/header', $data);
       $this->view('admin/users', $data);
       $this->view('template/footer');
    }
}