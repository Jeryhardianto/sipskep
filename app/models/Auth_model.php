<?php 
class Auth_model{
    //private $table = 'users';
    private $db;
    
      public function __construct(){
        $this->db = new Database;
        
   }



   public function cekUser($email){
       $query = "SELECT * FROM pengguna WHERE email=:email";
       $this->db->query($query);
       $this->db->bind('email', $email);
     
       
       $this->db->execute();
      return $this->db->rowCount();
   }
   public function setSession($email){
       $query = "SELECT * FROM pengguna WHERE email=:email ";
       $this->db->query($query);
       $this->db->bind('email', $email);
     
       
    //    $this->db->execute();
     return $this->db->resultSet();
   }
   public function cekEmail($email){
       $query = "SELECT * FROM pengguna WHERE email=:email";
       $this->db->query($query);
       $this->db->bind('email', $email);
      

     return $this->db->resultSet();
   }

   // public function userReg($data){
   //    $query = "INSERT INTO pengguna (nama,username,email, password,verify_email, token, level, date_created) 
   //              VALUES
   //              (:nama,:username, :email, :password, :verify_email, :token, :level, :date_created)
   //    ";

   //    $this->db->query($query);
   //    $this->db->bind('nama', $data['nama']);
   //    $this->db->bind('username', $data['username']);
   //    $this->db->bind('email', $data['email']);
   //    $this->db->bind('password', $data['password']);
   //    $this->db->bind('verify_email', $data['verify_email']);
   //    $this->db->bind('token', $data['token']);
   //    $this->db->bind('level', $data['level']);
   //    $this->db->bind('date_created', $data['date_created']);

   //    $this->db->execute();

   //    return $this->db->rowCount();


   // }

   public function _register($fields = array()) {
      if ($this->db->insert('pengguna',$fields)) {
         return true;
      }
      return $this->db->rowCount();
   }




}