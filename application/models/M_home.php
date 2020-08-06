<?php

class M_home extends CI_Model
{
	public function getCategory()
	{
		$query = "SELECT tb_kategori.*,tb_kamar.*,If(tb_kamar.status > 1,tb_kamar.status > 1 - tb_kamar.status,Count(tb_kamar.status)) as jmlkamar FROM tb_kamar LEFT JOIN tb_kategori ON tb_kamar.id_kategori = tb_kategori.id GROUP BY tb_kategori.id";
		return $this->db->query($query)->result_array();
	}
	public function getCategoryById($id)
	{
		$query = "SELECT tb_kategori.id,tb_kategori.nama_kategori,tb_kategori.tamu,tb_kategori.harga,tb_kategori.image,tb_kamar.id,tb_kamar.nama_kamar,tb_kamar.id_kategori,tb_kamar.kode_kamar,tb_kamar.status, If(tb_kamar.status > 1,tb_kamar.status > 1 - tb_kamar.status,Count(tb_kamar.status)) as jmlkamar FROM tb_kategori INNER JOIN tb_kamar ON tb_kamar.id_kategori = tb_kategori.id WHERE tb_kategori.id = '$id'";
		return $this->db->query($query)->row_array();
	}
}
