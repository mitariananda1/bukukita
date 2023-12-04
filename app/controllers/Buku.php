<?php
class Buku extends Controller{
public function index()
{
    $data['title'] = 'Data Buku';
    $data['buku'] = $this->('BukuModel')->getAllkategori();
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $$this->view('Kategori/index', $data);
    $this->view('templates/footer'); 
}
public function cari(){
    $data['title'] = 'Data Buku';
    $data['buku'] = $this->model('BukuModel')->cariBuku();
    $data['key'] = $_POST['key'];
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('buku/index', $data);
    $this->view('templates/footer');
}
public function edit($id){
    $data['title'] = 'Detail Buku';
    $data['kategori'] = $this->model('KategoriModel')->getAllKategori();
    $data['buku'] = $this->model('BukuModel')->getBukuById($id);
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('buku/edit', $data);
    $this->view('templates/footers');
}
public function tambah(){
    $data['title'] = 'Tambah Buku';
    $data['kategori'] = $this->model('KategoriModel')->getAllkategori();
    $this->view('templates/header', $data);
    $this->view('templates/sidebar', $data);
    $this->view('templates/create', $data);
    $this->view('templates/footer');
}
public function simpanBuku(){
    if( $this->model('BukuModel')->tambahBuku($_POST) > 0){
        Flasher::setMessage('Berhasil','ditambahkan','success');
    }else{
        Flasher::setMessage('Gagal','ditambahkan','danger');
    }
    echo '<script>window.location.href = "' . base_url . '/buku";</script>';
        header('location: '. base_url . '/buku');
        exit;
    }
    public function updateBuku(){
        if( $this->model('BukuModel')->updateDataBuku($_POST) > 0 ){
            Flasher::setMessage('berhasil','diupdate','success');
        }else{
            Flasher::setMessage('Gagal','diupdate','danger');
        }
        echo '<script>window.location.href = "' . base_url . '/buku";</script>';
            header('location: '. base_url . '/buku');
            exit;
        }
    public function hapus($id){
        if( $this->model('BukuModel')->deleteBuku($id)>0) {
            Flasher::setMessage('Berhasil','dihapus','success');
        }else{
            Flasher::setMessage('Gagal','dihapus','denger');
        }
        echo '<script>window.location.href = "' . base_url . '/buku";</script>';
        header('location: '. base_url . '/buku');
            exit;
        }
        public function lihatlaporan(){
        $data['title'] = 'Data Laporan Buku';
        $data['buku'] = $this->model('BukuModel')->getAllBuku();
        $this->view('buku/lihatlaporan', $data);
        }
        public function laporan(){
        $data['buku'] = $this->model('BukuModel')->getAllBuku();
        $pdf = new FPDF('p','mm','A4');
        $pdf->AddPage();
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(190,7,'LAPORAN BUKU',0,1,'C');
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(85,6,'JUDUL',1);
        $pdf->Cell(30,6,'PENERBIT',1);
        $pdf->Cell(30,6,'PENGARANG',1);
        $pdf->Cell(15,6,'TAHUN',1);
        $pdf->Cell(25,6,'KATEGORI',1);
         $pdf->Ln();
        $pdf->SetFont('Arial','',10);

        foreach($data['buku'] as $row) {
         $pdf->Cell(85,6,$row['judul'],1);
         $pdf->Cell(30,6,$row['penerbit'],1);
         $pdf->Cell(30,6,$row['pengarang'],1);
         $pdf->Cell(15,6,$row['tahun'],1); 
         $pdf->Cell(25,6,$row['nama_kategori'],1);
         $pdf->Ln(); 
        }
        $pdf->Output('D', 'Laporan Buku.pdf', true);
        }
        public function __construct(){
            if($_SESSION['session_login'] != 'sudah_login'){
                flasher::setMessage('Login','Tidak ditemukan.','danger');
                header('location: '. base_url . '/login');
                exit;
            }
        }
    }
        
    