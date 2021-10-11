<?php 
class SuratNikah extends Controller{
    public function __construct()
    {
    if ($_SESSION['level']  != '5' || $_SESSION['status'] != 'logged') {
            header('Location:'.BASEURL.'auth/errorpage');
            exit;
        }
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index(){
     
        $data['judul']      = 'Surat Keterangan Nikah | SIPSKEP';
 
    
        $this->view('users/template/header', $data);
        $this->view('users/suratNikah-view', $data);
        $this->view('users/template/footer');
    }
    
    public function tambah(){
     
        $data['judul']      = 'Tambah Surat Keterangan Nikah | SIPSKEP';
 
    
        $this->view('users/template/header', $data);
        $this->view('users/suratNikah-add', $data);
        $this->view('users/template/footer');
    }
    


}