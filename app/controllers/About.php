<?php

class About extends Controller
{
    public function index($nama = 'Gavra', $pekerjaan = 'engineer', $umur = 17)
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['umur'] = $umur;
        $data['judul'] = 'About Me';
        $this->view('template/header', $data);
        $this->view('about/index', $data);
        $this->view('template/footer');
    }
    public function page()
    {
        $data['judul'] = 'page';
        $this->view('template/header', $data);
        $this->view('about/page');
        $this->view('template/footer');
    }
}
