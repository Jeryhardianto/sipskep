<?php 
class Verifikasi_model{
    //private $table = 'users';
    private $db;
    
      public function __construct(){
        $this->db = new Database;
        
   }
    public function cekVerifyemail($data){
       $query = "SELECT * FROM pengguna WHERE email=:email AND token=:token";
       $this->db->query($query);
       $this->db->bind('email', $data['email']);
       $this->db->bind('token', $data['token']);
       return $this->db->resultSet();
   }

  //  public function cekPengguna($data){
  //      $query = "SELECT * FROM pengguna WHERE email=:email AND token=:token";
  //      $this->db->query($query);
  //      $this->db->bind('email', $data['email']);
  //      $this->db->bind('token', $data['token']);
       
  //      $this->db->execute();
  //     return $this->db->rowCount();
  //  }

   public function updateVerify($data){

    $query = "UPDATE pengguna SET verify_email=:verify_email  
    WHERE email=:email AND token=:token";

    $this->db->query($query);
    $this->db->bind('verify_email', '1');
    $this->db->bind('email', $data['email']);
    $this->db->bind('token', $data['token']);

    $this->db->execute();
    return $this->db->rowCount();
  }

  




}