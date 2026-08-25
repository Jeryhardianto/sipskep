<?php 
class Verify extends Controller{
    public function index($email,$token){
     
      $data = [
       'email' => $email,
       'token' => $token
     ];
     
     //*Cek Token dan email apakah ada di db
     $verify    = $this->model('Verifikasi_model')->cekVerifyemail($data);
     if ($verify[0]['verify_email'] == '0') {
            $this->model('Verifikasi_model')->updateVerify($data);
            Flasher::setFlash('Email berhasil','terverifiaksi','green');
            header('Location:'.BASEURL.'auth/');
     }else {
           Flasher::setFlash('Email atau token','tidak valid','red');
           header('Location:'.BASEURL.'auth/');
           exit;
       }
      

    }
}