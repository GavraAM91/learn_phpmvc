<?php

class Mahasiswa extends Controller{
    public function index() {
        $data['judul'] = 'Daftar Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa(); //mengambil seluruh data dari tabel mahasiswa 
        $this->view('template/header', $data);
        $this->view('mahasiswa/index', $data);
        $this->view('template/footer');
    }

    public function detail($id) {
        $data['judul'] = 'Detail Mahasiswa';
        $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaByID($id);  //mengambil data dari table mahasiswa menurut id 
        $this->view('template/header', $data); //mengirimkan data nya ke dalam header.php
        $this->view('mahasiswa/detail', $data); //mengirimkan data nya ke dalam detail.php
        $this->view('template/footer');
    }

    public function tambah() {
        
        if($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0 ) {
            header('Location: '. BASEURL . '/Mahasiswa');
            exit;
        }
    }
}