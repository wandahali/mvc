<?php

class BukuModel {

    private $table = 'tb_buku';
    private $db_mvc;

    public function __construct()
    {
        $this->db_mvc = new Database;
    }

    public function getAllBuku()
    {
        $this->db_mvc->query("SELECT * FROM " . $this->table);
        return $this->db_mvc->resultSet();
    }

    public function getBukuById($id) //
    {
        $this->db_mvc->query('SELECT * FROM ' . $this->table . ' WHERE id=:id');//titik dua itu mengarahkan pada database
        $this->db_mvc->bind('id',$id); //yang pertama bind yg kedua value 
        //bind memberikan value pada query
        return $this->db_mvc->single(); 
    }

    public function tambahBuku($data)
    {
        $query = "INSERT INTO tb_buku (judul, penulis, tgl_selesai) VALUES(:judul, :penulis, :tgl_selesai)";
        $this->db_mvc->query($query);
        $this->db_mvc->bind('judul', $data['judul']);
        $this->db_mvc->bind('penulis', $data['penulis']);
        $this->db_mvc->bind('tgl_selesai', $data['tgl_selesai']);
        $this->db_mvc->execute();

        return $this->db_mvc->rowCount();
    }

    public function updateDataBuku($data)
    {
        $query = "UPDATE tb_buku SET judul=:judul, penulis=:penulis, tgl_selesai=:tgl_selesai WHERE id=:id";
        $this->db_mvc->query($query);
        $this->db_mvc->bind('id', $data['id']);
        $this->db_mvc->bind('judul', $data['judul']);
        $this->db_mvc->bind('penulis', $data['penulis']);
        $this->db_mvc->bind('tgl_selesai', $data['tgl_selesai']);
        $this->db_mvc->execute();

        return $this->db_mvc->rowCount();
    }

    public function deleteBuku($id)
    {
        $this->db_mvc->query('DELETE FROM ' . $this->table . ' WHERE id=:id');
        $this->db_mvc->bind('id', $id);
        $this->db_mvc->execute();

        return $this->db_mvc->rowCount();
    }
}
?>