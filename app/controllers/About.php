<?php
class About extends Controller{
        public function index()
        {
    $data['title'] = 'Halaman AboutMe';
    $data['nama'] = 'Mitariananda';
    $data['alamat'] = 'tw.eumpeuk';
    $data['no_hp'] = '082148867999';

$this->view('templates/header', $data);
$this->view('templates/sidebar', $data);
$this->view('about/index', $data);
$this->view('templates/footer');
}
public function __construct(){
if($_SESSION['session_login'] != 'sudah_login') 
{
Flasher::setMessage('Login','Tidak ditemukan.','danger');
header('location: '. base_url . '/login');
exit;
}
}
}