<?php
class Logout {
public function Logout(){
session_start();
session_destroy();
header('location: '. base_url . '/login');
}
public function __construct(){
    if($_SESSION['session_login'] != 'sudah_login'){
        flasher::setMessage('Login','Tidak ditemukan.','danger');
        header('location: '. base_url . '/login');
        exit;
    }
}
}