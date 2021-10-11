<?php 
class Home_admin extends Controller{
    public function __construct()
    {
       
        if ($_SESSION['level']  != '1' || $_SESSION['status'] != 'logged') {
            header('Location:'.BASEURL.'auth/errorpage');
            exit;
        }
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index(){
    
        $data['judul']      = 'Dashboard | SIPSKEP';
 
       $this->view('admin/template/header', $data);
       $this->view('admin/index', $data);
       $this->view('admin/template/footer');
    }
    
  
}