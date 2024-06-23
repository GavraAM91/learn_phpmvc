<?php

class Database
{

    //mengambil nilai dari konstanta yang berada di dalam config.php
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    private $dbh, $stmt;

    public function __construct()
    {
        //data source name (dsn), fungsinya untuk memberikan informasi untuk dihubungkan kedalam database
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;

        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION //untuk mengirimkan kode error
        ];

        //connect database
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass,); //jika tidak ada error maka program akan berjalan terus
        } catch (PDOException $e) {
            die($e->getMessage()); //menampilkan kode error dan menghentikan program
        }
    }

    public function query($query)
    {
        //menerima permintaan query yang dikirim oleh models
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            //menentukan apakah nilai yang diberikan berupa tipe data tertentu
            switch( true ) {
                case is_int($value) :
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value) :
                    $type = PDO::PARAM_NULL;
                    break;
                default : 
                    $type = PDO::PARAM_STR;
            } 
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //menjalankan program yang terdapat pada $this->stmt
    public function execute() {
        $this->stmt->execute();
    }

    public function resultSet() {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC); //mengirimkan atau mendapatkan data sesuai dari permintaan program
    }

    public function single() 
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC); //mengirimkan atau mendapatkan data sesuai dari permintaan program menurut id
    }

    public function rowCount() {
        return $this->stmt->rowCount();
    }

}
