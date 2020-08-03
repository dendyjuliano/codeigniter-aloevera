<?php

class M_admin extends CI_Model
{

	//Uniqe Code
	public function code_reservasi()
	{
		$this->db->select('RIGHT(tb_reservasi.kode_reservasi,4) as kode', false);
		$this->db->order_by('kode_reservasi', 'DESC');
		$this->db->limit(1);
		$query = $this->db->get('tb_reservasi');
		if ($query->num_rows() <> 0) {
			$data = $query->row();
			$kode = intval($data->kode) + 1;
		} else {
			$kode = 1;
		}

		$kodemax = str_pad($kode, 4, "0", STR_PAD_LEFT);
		$kodejadi = "AL-" . date('Ymd')  . $kodemax;
		return $kodejadi;
	}

	//New Function
	public function getRoom()
	{
		$query = "SELECT `tb_kategori`.*,`tb_kamar`.* FROM `tb_kategori` JOIN `tb_kamar` ON `tb_kamar`.`id_kategori` = `tb_kategori`.`id`";
		return $this->db->query($query)->result_array();
	}
	public function getRoomId($id_room)
	{
		$query = "SELECT `tb_kategori`.*,`tb_kamar`.* FROM `tb_kategori` JOIN `tb_kamar` ON `tb_kamar`.`id_kategori` = `tb_kategori`.`id` WHERE `tb_kamar`.`id` = '$id_room'";
		return $this->db->query($query)->row_array();
	}
	public function getRoomCategory($category_id)
	{
		$query = "SELECT `tb_kategori`.*,`tb_kamar`.* FROM `tb_kategori` JOIN `tb_kamar` ON `tb_kamar`.`id_kategori` = `tb_kategori`.`id` WHERE `tb_kamar`.`status` = 1 AND `tb_kamar`.`id_kategori` = '$category_id'";
		return $this->db->query($query)->result_array();
	}
	public function getCustomer()
	{
		return $this->db->get('tb_customer')->result_array();
	}

	//Datatable Aviable Room

	var $column_order = [null, "KODE_KAMAR", "NAMA_KAMAR"];
	var $column_search = ["KODE_KAMAR", "NAMA_KAMAR"];
	var $order = array('NAMA_KAMAR', 'ASC');

	public function _get_supporter_query()
	{
		$input = $this->input;
		$this->db->select("tb_kamar.*,tb_kategori.*");
		$this->db->from('tb_kamar');
		$this->db->join('tb_kategori', "tb_kategori.id=tb_kamar.id_kategori", "LEFT");
		$i = 0;
		foreach ($this->column_search as $item) {
			if ($input->post("search")['value']) {
				if ($i === 0) // first loop
				{
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}

				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) // here order processing
		{
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by($order[0], $order[1]);
		}
	}

	public function _get_custom_field()
	{
		$input = $this->input;
		$skema = $input->post('TYPE');
		$this->db->where('tb_kamar.status = 1');
		if ($skema != null) {
			$this->db->where(['tb_kategori.id' => $skema]);
		}
	}

	function get_datatables()
	{
		$this->_get_supporter_query();
		$this->_get_custom_field();

		if ($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}

	public function count_filtered()
	{
		$this->_get_supporter_query();
		$this->_get_custom_field();
		$query = $this->db->get();
		return $query->num_rows();
	}
	public function getRoomActive()
	{
		$query = "SELECT `tb_kategori`.*,`tb_kamar`.* FROM `tb_kategori` JOIN `tb_kamar` ON `tb_kamar`.`id_kategori` = `tb_kategori`.`id` WHERE `tb_kamar`.`status` = 1";
		return $this->db->query($query)->result_array();
	}



	//Add Function
	public function addRole()
	{
		$role = $this->input->post('role');
		$data = ['role' => $role];
		$this->db->insert('user_rule', $data);
	}
	public function addItem()
	{
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$data = [
			'nama' => $nama,
			'harga' => $harga,
			'stok' => $stok
		];

		$this->db->insert('tb_item', $data);
	}
	//End Add Function
	//Update Function
	public function editRole()
	{
		$id = $this->input->post('id');
		$role = $this->input->post('role');
		$data = ['role' => $role];
		$this->db->update('user_rule', $data, ['id' => $id]);
	}
	public function editItem()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('nama');
		$harga = $this->input->post('harga');
		$stok = $this->input->post('stok');

		$data = [
			'nama' => $nama,
			'harga' => $harga,
			'stok' => $stok
		];

		$this->db->update('tb_item', $data, ['id' => $id]);
	}
	//End Update Function


	//Delete Function
	public function delete($table, $id)
	{
		$this->db->delete($table, ['id' => $id]);
	}
	//End Delete

	//Function get by ID
	public function getByID($table, $id)
	{
		return $this->db->get_where($table, ['id' => $id])->row_array();
	}
	//End Function get by ID

	//End New Function









	//Start At 2019
	//Start Show Data

	public function data_customer()
	{
		return $this->db->get('tb_pegawai')->result_array();
	}

	public function data_item()
	{
		return $this->db->get('tb_item')->result_array();
	}

	public function data_customer_role()
	{
		$query = "SELECT `user_rule`.*,`tb_pegawai`.* FROM `user_rule` JOIN `tb_pegawai` ON `tb_pegawai`.`role_id` = `user_rule`.`id` WHERE `tb_pegawai`.`role_id` = 3";
		return $this->db->query($query)->result_array();
	}

	public function data_room_role()
	{
		$query = "SELECT `tb_kategori`.*,`tb_kamar`.* FROM `tb_kategori` JOIN `tb_kamar` ON `tb_kamar`.`id_kategori` = `tb_kategori`.`id` WHERE `tb_kamar`.`status` = 1";
		return $this->db->query($query)->result_array();
	}

	public function data_menu()
	{
		return $this->db->get('user_menu')->result_array();
	}

	public function data_submenu()
	{
		$query = "SELECT `user_sub_menu`.*,`user_menu`.`menu`
        from `user_sub_menu` join `user_menu`
        on `user_sub_menu`.`menu_id` = `user_menu`.`id`";
		return $this->db->query($query)->result_array();
	}

	public function data_active()
	{
		$query = "SELECT `tb_kategori`.*,`tb_kamar`.* FROM `tb_kategori` JOIN `tb_kamar` ON `tb_kamar`.`id_kategori` = `tb_kategori`.`id` WHERE `tb_kamar`.`status` = 3";
		return $this->db->query($query)->result_array();
	}

	public function data_payment()
	{

		$query = "SELECT `transaksi`.*,`tb_pembayaran`.* FROM `transaksi` LEFT JOIN `tb_pembayaran` ON `tb_pembayaran`.`nomor_pesanan` = `transaksi`.`nomor_pesanan` WHERE `tb_pembayaran`.`is_email` > 0";
		return $this->db->query($query)->result_array();
	}

	public function data_history()
	{
		$query = "SELECT `tb_kamar`.*,`tb_riwayat`.* FROM `tb_kamar` JOIN `tb_riwayat` ON `tb_riwayat`.`id_kamar` = `tb_kamar`.`id` ";
		return $this->db->query($query)->result_array();
	}

	public function data_not_payment()
	{

		$query = "SELECT `transaksi`.*,`tb_pembayaran`.* FROM `transaksi` LEFT JOIN `tb_pembayaran` ON `tb_pembayaran`.`nomor_pesanan` = `transaksi`.`nomor_pesanan` WHERE `tb_pembayaran`.`is_email` = 0 AND `tb_pembayaran`.`id_metode` = 1";
		return $this->db->query($query)->result_array();
	}

	public function data_not_transfer()
	{
		$query = "SELECT `transaksi`.*,`tb_pembayaran`.* FROM `transaksi` LEFT JOIN `tb_pembayaran` ON `tb_pembayaran`.`nomor_pesanan` = `transaksi`.`nomor_pesanan` WHERE `tb_pembayaran`.`is_email` = 0 AND `tb_pembayaran`.`id_metode` = 2 AND `tb_pembayaran`.`is_transfer` = 0";
		return $this->db->query($query)->result_array();
	}

	public function data_transfer()
	{
		return $this->db->get('tb_transfer')->result_array();
	}

	public function data_room()
	{
		$query = "SELECT `tb_kategori`.*,`tb_kamar`.* FROM `tb_kategori` LEFT JOIN `tb_kamar` ON `tb_kamar`.`id_kategori` = `tb_kategori`.`id` WHERE `tb_kamar`.`status` = 1";
		return $this->db->query($query)->result_array();
	}

	public function data_transaction()
	{
		return $this->db->get('transaksi')->result_array();
	}

	public function data_kategori()
	{
		return $this->db->get('tb_kategori')->result_array();
	}

	public function data_transaction_ready()
	{
		return $this->db->get_where('transaksi', ['is_email' => 1])->result_array();
	}

	public function data_transaction_not()
	{
		return $this->db->get_where('transaksi', ['is_email' => 0])->result_array();
	}

	public function data_checkin()
	{
		return $this->db->get('tb_checkin')->result_array();
	}

	public function data_checkout()
	{
		return $this->db->get('tb_checkout')->result_array();
	}

	public function data_request()
	{
		return $this->db->get('tb_pesanan')->result_array();
	}

	public function data_role()
	{
		$query = $this->db->query('select * from user_rule');
		return $query->result();
	}

	public function data_fasilities()
	{
		return $this->db->get('tb_fasilitas')->result_array();
	}
	//End Show Data

	//Start Data Row
	public function data_customer_row()
	{
		$query = $this->db->get_where('tb_pegawai', ['role_id' => 3]);
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	public function data_room_row()
	{
		$query = $this->db->get_where('tb_kamar', ['status' => 1]);
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	public function data_category_row()
	{
		$query = $this->db->get('tb_kategori');
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	public function data_transaction_row()
	{
		$query = $this->db->get_where('transaksi', ['is_email' => 0]);
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	public function data_payment_row()
	{
		$query = $this->db->get_where('tb_pembayaran', ['is_email' => 0]);
		if ($query->num_rows() > 0) {
			return $query->num_rows();
		} else {
			return 0;
		}
	}
	//End Data Row

	//Start Delete Data
	public function deleteDataCustomer($id)
	{
		$this->db->delete('tb_pegawai', ['id' => $id]);
	}
	public function deleteDataMenu($id)
	{
		$this->db->delete('user_menu', ['id' => $id]);
	}
	public function deleteDataRoom($id)
	{
		$this->db->delete('tb_kamar', ['id' => $id]);
	}
	public function deleteDataSubmenu($id)
	{
		$this->db->delete('user_sub_menu', ['id' => $id]);
	}
	public function deleteDataTransaction($id)
	{
		$this->db->delete('transaksi', ['id' => $id]);
	}
	public function deleteDataCategory($id)
	{
		$data['kategori'] = $this->db->get_where('tb_kategori', ['id' => $id])->row_array();
		$old_image = $data['kategori']['image'];
		unlink(FCPATH . 'uploads/' . $old_image);
		$this->db->delete('tb_kategori', ['id' => $id]);
	}
	public function deleteDataTransfer($id)
	{
		$this->db->delete('tb_transfer', ['id' => $id]);
	}
	public function deleteDataPayment($kode_pembayaran)
	{
		$this->db->delete('tb_pembayaran', ['id' => $kode_pembayaran]);
	}
	//End Delete Data



	//Start Insert Data
	public function addAdmin()
	{
		$data = [
			'nama' => $this->input->post('name'),
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'role_id' => $this->input->post('role'),
			'image' => 'default.png'
		];

		$this->db->insert('tb_admin', $data);
	}

	public function addCustomer()
	{
		$data = [
			'nama' => htmlspecialchars($this->input->post('name', true)),
			'username' => htmlspecialchars($this->input->post('username', true)),
			'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
			'image' => 'default.png',
			'role_id' => htmlspecialchars($this->input->post('role_id', true))
		];

		$this->db->insert('tb_pegawai', $data);
	}

	public function addCity()
	{
		$data = [
			'nama_kota' => htmlspecialchars($this->input->post('name', true)),
		];

		$this->db->insert('tb_kota', $data);
	}

	public function addCategory()
	{
		$nama = $this->input->post('name');
		$guest = $this->input->post('guest');
		$harga = $this->input->post('harga');


		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image != null) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2548';
			$config['upload_path'] = 'uploads/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$this->db->set('nama_kategori', $nama);
		$this->db->set('tamu', $guest);
		$this->db->set('harga', $harga);
		$this->db->insert('tb_kategori');
	}

	public function addSubmenu()
	{
		$data = [
			'menu_id' => $this->input->post('menu'),
			'title' => $this->input->post('title'),
			'url' => $this->input->post('url'),
			'icon' => $this->input->post('icon')
		];

		$this->db->insert('user_sub_menu', $data);
	}

	public function addMenu()
	{
		$data = ['menu' => $this->input->post('menu')];
		$this->db->insert('user_menu', $data);
	}

	public function addRoom()
	{
		$nama_kamar = $this->input->post('nameroom');
		$id_kategori = $this->input->post('kategori');
		$roomcode = $this->input->post('roomcode');
		$status = 1;

		$data = [
			'nama_kamar' => $nama_kamar,
			'id_kategori' => $id_kategori,
			'kode_kamar' => $roomcode,
			'status' => $status
		];

		$this->db->insert('tb_kamar', $data);
	}

	//End Insert Data



	//Start Show Data By Id
	public function data_CustomerById($id)
	{
		return $this->db->get_where('tb_pegawai', ['id' => $id])->row_array();
	}
	public function data_RoomById($id)
	{
		return $this->db->get_where('tb_kamar', ['id' => $id])->row_array();
	}
	public function data_CategoryById($id)
	{
		return $this->db->get_where('tb_kategori', ['id' => $id])->row_array();
	}

	public function data_transaksi_id($id)
	{
		return $this->db->get_where('transaksi', ['id' => $id])->row_array();
	}

	public function data_active_id($id)
	{
		$query = "SELECT `transaksi`.*,`tb_kamar`.* FROM `transaksi` JOIN `tb_kamar` ON `tb_kamar`.`id` = `transaksi`.`id_kamar` WHERE `tb_kamar`.`id` = $id";
		return $this->db->query($query)->row_array();
	}

	public function data_payment_id($kode_pembayaran)
	{
		$query = "SELECT `transaksi`.*,`tb_pembayaran`.* FROM `transaksi` LEFT JOIN `tb_pembayaran` ON `tb_pembayaran`.`nomor_pesanan` = `transaksi`.`nomor_pesanan` WHERE `tb_pembayaran`.`kode_pembayaran` = $kode_pembayaran";
		return $this->db->query($query)->row_array();
	}

	public function data_payment_result($nomor_pesanan)
	{
		$query = "SELECT `transaksi`.*,`tb_kamar`.* FROM `transaksi` JOIN `tb_kamar` ON `tb_kamar`.`id` = `transaksi`.`id_kamar` WHERE `transaksi`.`nomor_pesanan` = $nomor_pesanan";
		$this->db->query($query)->row_array();
	}
	//End Show Data By ID



	//Start Edit Data
	public function edit_customer()
	{
		$id = $this->input->post('id');
		$name = $this->input->post('name');
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		//cek jika ada gambar
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2048';
			$config['upload_path'] = 'uploads/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}

		$this->db->set('nama', $name);
		$this->db->set('username', $username);
		$this->db->where('id', $id);
		$this->db->update('tb_pegawai');
	}

	public function editRoom()
	{
		$id = $this->input->post('id');
		$nama_kamar = $this->input->post('name');
		$id_kategori = $this->input->post('kategori');
		$roomcode = $this->input->post('roomcode');


		$this->db->set('nama_kamar', $nama_kamar);
		$this->db->set('id_kategori', $id_kategori);
		$this->db->set('kode_kamar', $roomcode);
		$this->db->where('id', $id);
		$this->db->update('tb_kamar');
	}

	public function editCategory()
	{
		$id = $this->input->post('id');
		$nama = $this->input->post('name');
		$guest = $this->input->post('tamu');
		$harga = $this->input->post('harga');

		//cek jika ada gambar
		$upload_image = $_FILES['gambar']['name'];

		if ($upload_image != null) {
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']     = '2048';
			$config['upload_path'] = 'uploads/';

			$this->load->library('upload', $config);

			if ($this->upload->do_upload('gambar')) {
				$new_image = $this->upload->data('file_name');
				$this->db->set('image', $new_image);
			} else {
				echo $this->upload->display_errors();
			}
		}
		$this->db->set('nama_kategori', $nama);
		$this->db->set('tamu', $guest);
		$this->db->set('harga', $harga);
		$this->db->where('id', $id);
		$this->db->update('tb_kategori');
	}
	//End Edit Data

	//Repair Data
	public function rusakRoom($id)
	{
		$this->db->set('status', 0);
		$this->db->where('id', $id);
		$this->db->update('tb_kamar');
	}
	public function tidakRusakRoom($id)
	{
		$this->db->set('status', 1);
		$this->db->where('id', $id);
		$this->db->update('tb_kamar');
	}
	//End Repair Data
}
