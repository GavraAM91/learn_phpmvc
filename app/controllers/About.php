<?php

class About
{
    public function index($nama = 'Gavra', $pekerjaan = 'engineer')
    {
        echo "Hello nama saya $nama dan saya seorang $pekerjaan";
    }
    public function page()
    {
        echo 'About/page';
    }
}
