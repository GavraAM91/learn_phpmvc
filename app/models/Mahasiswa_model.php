<?php

class Mahasiswa_model
{

    private $table = 'mahasiswa'; //nama table di dalam database
    private $db;

    public function __construct() {
        $this->db = new Database(); //inisialisasi database
    }
    public function getAllMahasiswa() {
        $this->db->query('SELECT * FROM ' . $this->table); //mengambil semua data dari tabel mahasiswa
        return $this->db->resultSet();
    }

    public function getMahasiswaByID($id) {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id = :id'); //mengambil data dari tabel mahasiswa menurut id 
        $this->db->bind('id', $id);
        return $this->db->single(); 
    }
}
