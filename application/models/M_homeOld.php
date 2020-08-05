<?php

class M_home extends CI_Model
{
	public function get_room_id($id)
	{
		$query = "SELECT tb_kategori.*, tb_kamar.* from tb_kategori join tb_kamar on tb_kamar.id_kategori = tb_kategori.id where tb_kamar.id_kategori = $id";
		return $this->db->query($query)->row_array();
	}
	public function get_room_count($id)
	{
		$query = "SELECT tb_kategori.*, tb_kamar.* from tb_kategori join tb_kamar on tb_kamar.id_kategori = tb_kategori.id where tb_kamar.id_kategori = $id and tb_kamar.active = 0";
		return $this->db->query($query)->num_rows();
	}

	public function data_payment($payment)
	{
		return $this->db->get_where('tb_pilih_pembayaran', ['id_metode' => $payment])->result();
	}
	public function data_payment_row($payment)
	{
		return $this->db->get_where('tb_pilih_pembayaran', ['id_metode' => $payment])->row();
	}

	public function get_metode()
	{
		return $this->db->get('tb_metode_pembayaran')->result_array();
	}

	public function uniqe_code()
	{
		$this->db->select('RIGHT(transaksi.nomor_pesanan,4) as kode', false);
		$this->db->order_by('nomor_pesanan', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('transaksi');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "AL2020-" . $kodemax;
		return $kodejadi;
	}

	public function uniqe_code2()
	{
		$this->db->select('RIGHT(tb_pembayaran.kode_pembayaran,4) as kode', false);
		$this->db->order_by('kode_pembayaran', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_pembayaran');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "177890" . $kodemax;
		return $kodejadi;
	}

	public function get_transactionId($kode)
	{
		return $this->db->get_where('transaksi', ['nomor_pesanan' => $kode])->row_array();
	}

	public function insert_payment($id_metode, $id_payment, $nomor, $code, $image_name)
	{
		$data = array(
			'kode_pembayaran' => $code,
			'nomor_pesanan' => $nomor,
			'id_metode' => $id_metode,
			'id_pilih' => $id_payment,
			'qr_code' => $image_name
		);

		$this->db->insert('tb_pembayaran', $data);
	}

	public function data_payment_code($code)
	{
		return $this->db->get_where('tb_pembayaran', ['kode_pembayaran' => $code])->row_array();
	}

	public function data_bank($bayar)
	{
		return $this->db->get_where('tb_pilih_pembayaran', ['id' => $bayar])->row_array();
	}

	public function data_payment_user($kode)
	{
		return $this->db->get_where('tb_pembayaran', ['kode_pembayaran' => $kode])->row_array();
	}
}
