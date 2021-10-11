<?php 
class User_model{
      private $db;
    
      public function __construct(){
        $this->db = new Database;
        
   }

  public function getAllUsers(){
       $query = "SELECT * FROM pengguna";
       $this->db->query($query);
     return $this->db->resultSet();
   }
}