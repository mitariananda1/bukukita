<?php
class Home extends Controller {
public function index()
{
    $data['title'] = 'Data Kategori';
    $data['Kategori'] = $this->('KategoriModel')->getAllkategori();
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $$this->view('Kategori/index', $data);
    $this->view('templates/footer'); 
}
public function cari()
{
    $data['title'] 'Data Kategori';
    $data['kategori'] = $this->model('KategoriModel')->cariKategori();
    $data['key'] = $_POST['key'];
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('kategori/index', $data);
    $this->view('templates/footer');

}
public function edit($id)
{
    $data['title'] = 'Detail Kategori';
    $data['Kategori'] = $this->model('KategoriModel')->getKategoriById($id);
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('kategori/edit', $data);
    $this->view('templates/footer'); 

}
public function tambah()
{
    $data['title'] = 'Tambah Kategori';
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('Kategori/create', $data);
    $this->view('template/footer');

}
public function simpanKategori()
{
    if( $this->model('KategoriModel')->tambahKategori($_POST) > 0) {
        Flasher::setMessage('Berhasil','ditambahkan','success');
    }else{
        Flasher::setMassage('Gagal','ditambahkan','denger');
    }
        echo '<script>window.location.href = "' . base_url . '/kategori";</script>';
        header('location: '. base_url. '/kategori');
        exit;
    
    }
public function updateKategori(){
    if( $this->model('KategoriModel')->updateDataKategori($_POST) > 0 ) {
        Flasher::setMessage('Berhasil','diupdate','success');
    }else{
        Flasher::setMessage('Gagal','diupdate','denger');
    }
        echo '<script>window.location.href = "' . base_url . '/kategori";</script>';
        header('location: '. base_url. '/kategori');
        exit;

    }
public function hapus($id)
{
    if( $this->model('KategoriModel')->deleteKategori($id) > 0 ) {
        Flasher::setMessage('Berhasil','dihapus','success');
    }else{
        Flasher::setMessage('Gagal','dihapus','denger');
    }
        echo '<script>window.location.href = "' . base_url . '/kategori";</script>';
        header('location: '. base_url. '/Kategori');
        exit;
    }
    public function __construct(){
    if($_SESSION['session_login'] != 'sudah_login') {
    Flasher::setMessage('Login','Tidak ditemukan.','danger');
    header('location: '. base_url . '/login');
    exit;
    }
    }
    }