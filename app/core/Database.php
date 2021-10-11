<?php
//DATABASE WRAPPER

class Database {
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh;
    private $stmt;
    
    public function __construct(){
        $dns = 'mysql:host='.$this->host.';dbname='.$this->db_name.'';


        //Options Koneksi KE DB
        //Untuk menjaga DB Terjaga terus menerus
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION

        ];
        try {
            $this->dbh = new PDO($dns, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //Menjalankan query dan untuk menjalakan SELECT,INSERT,UPDATE,DELETE
    public function query($query){
      $this->stmt =   $this->dbh->prepare($query);
    }
    //Bind Data untuk mengetahui parameters
    // Utk membersihkan value baru query di exekusi
    public function bind($param, $value, $type = null){
        if ( is_null($type)) {
            switch (true) {
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default:
                   $type = PDO::PARAM_STR;
                    break;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }
    public function execute(){
        $this->stmt->execute();
    }
    //untuk mengambil data banyak atau sama dengan SELECT * FROM mahasiswa;
    public function resultSet(){
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    //untuk mengambil data hanya satu saja
    public function single(){
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    //Hitung rows 
    public function rowCount(){
        return $this->stmt->rowCount();
    }



   
    //*INSERT 
    public function insert($table, $fields = array()){
        //mengambil kolom
        $column = implode(', ', array_keys($fields));

        //mengambil nilai
        $valuesArray = array();
        $i = 0;
        foreach ($fields as $key => $values) {
            if (is_int($values)) {
                $valuesArray[$i] = $values;
            }else {
                $valuesArray[$i] = "'".$values."'";
            }
            $i++;
        }
        $values = implode(', ', $valuesArray);

        $query = "INSERT INTO $table ($column) VALUES ($values)";

        // die($query);
        $this->query($query);
        $this->execute();
        // return true;
    }

     //*Update
    // public function update($table, $fields, $id){


    //     //mengambil nilai
    //     $valuesArray = array();
    //     $i = 0;
    //     foreach ($fields as $key => $values) {
    //         if (is_int($values)) {
    //             $valuesArray[$i] = $key . "-" . $values;
    //         }else {
    //             $valuesArray[$i] = $key . "='" .$values."'";
    //         }
    //         $i++;
    //     }
    //     $values = implode(', ', $valuesArray);

    //     $query = "UPDATE $table SET $values WHERE id=$id";

    //     // die($query);
    //     $this->query($query);
    //     $this->execute();
    //     // return true;
    // }




}