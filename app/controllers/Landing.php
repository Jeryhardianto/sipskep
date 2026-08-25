<?php 
class Landing extends Controller{

    public function index(){
        $data['judul']      = 'SIPSKEP | Pelayanan Surat Kependudukan';
        $this->view('landing/index', $data);
    }

}
