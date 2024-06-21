<?php


class Home extends Controller { 
    public function index() {
        $data['judul'] = 'Home'; 
        $data['nama'] = $this->model('User_model')->getUser(); //memanggil model User_model dan memanggil salah satu function didalam model
        $this->view('template/header', $data); //mengirimkan data ke header
        $this->view('home/index', $data); //mengirimkan data ke index agar dapat ditampilkan
        $this->view('template/footer');
    }

}   