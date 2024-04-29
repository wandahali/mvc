<?php

class Database{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbnm = DB_NAME;

    private $dbh; //handle
    private $stmt; //statment
//properti

    public function __construct(){
    
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbnm;

        $option = [
            PDO::ATTR_PERSISTENT => TRUE, //untuk menjaga koneksi  database
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //untuk menghindari error dan ngambil dri exception
        ];


        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMassage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value)
    {
        $this->stmt->bindValue($param, $value);
    }

    public function execute()
    {
        $this->stmt->execute();
    }

    public function resultSet() //menghasilkan data
    {
        $this->execute();
        return $this->stmt->fetchALL(PDO::FETCH_ASSOC); //array multidimensi
    }
    
    public function single()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC); //array asosiatif
    }

    public function rowCount() //menghitung baris pada tabel kita
    {
        return $this->stmt->rowCount();
    }


}