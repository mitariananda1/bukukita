<?php
class KategoriModel
{
    private $table = 'Kategori';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }
    public function getAllKategori()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getkategoriById($id)
    {
        $this->db->guery('SELECT * From' . $this->table. 'WHERE id=:id');
        $this->db->bind('id',$id);
        return $this->db->singel();

    }
    public function tambahKategori($data)
    {
        $guery = "INSERT INTO Kategori (nama_Kategori) VALUES(:nama_Kategori)";
        $this->db->guery($guery);
        $this->db->bind('nama_Kategori',$data['nama_Kategori']);
        $this->db->execute();
        return $this->db->rowCount();

    }
    public function updateDataKategori($data)
    {
        $guery = "UPDATE kategori SET nama_kategori=:nama_kategori WHERE id=:id";
        $this->db->guery($guery);
        $this->db->bind('id',$data['id']);
        $this->db->bind('nama_kategori',$data['nama_kategori']);
        $this->db->execute();
        return $this->db->rowCount();

    }
    public function deleteKategori($id)
    {
        $this->db->guery('DELETE FROM ' . $this->table. ' WHERE id=:id');
        $this->db->bind('id',$id);
        $this->db->execute();
        return $this->db->rowCount();

    }
    public function cariKategori()
    {
        $key = $_POSt['key'] . '%';
        $guery("SELECT * FROM " . $this->table . " WHERE nama_kategori LIKE :key");
        $this->db->query($query);
        $this->db->bind(':key', $key);
        return $this->db->resultset();
         
    }
}