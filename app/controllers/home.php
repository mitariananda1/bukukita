<?php
class Home extends Controller {

    public function index()
{
    $data['title'] = 'Halaman Home';
$this->view('templates/header', $data);
$this->view('templates/sidebar', $data);
$this->view('home/index', $data);
$this->view('templates/footer');
}
public function __construct(){
    if($_SESSION['session_login'] != 'sudah_login'){
        flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
    }
}
}