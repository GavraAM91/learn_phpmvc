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

    public function tambahDataMahasiswa($data) {

        $query = "INSERT INTO `mahasiswa`(`nama`, `no_telp`, `email`, `jurusan`) VALUES (:nama, :no_telp, :email, :jurusan)";

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($id) {
        $query = 'DELETE FROM ' . $this->table . ' WHERE id =  :id';
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    
    public function ubahDataMahasiswa($data) {

        $query = 'UPDATE '. $this->table .' SET 
                    nama = :nama,
                    no_telp = :no_telp,
                    email = :email,
                    jurusan = :jurusan 
                    WHERE id = :id ';

        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('no_telp', $data['no_telp']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('id', $data['id']);

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function cariDataMahasiswa() {
        
        //menerima keyword yang dikirim
        $keyword = $_POST['keyword'];

        $query = 'SELECT * FROM ' . $this->table .' WHERE nama LIKE :keyword ';
        $this->db->query($query);
        $this->db->bind('keyword', "%$keyword%");
        
        return $this->db->resultSet();
    }       
}
