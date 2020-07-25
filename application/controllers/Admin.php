<?php

class Admin extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('status') != true) {
			$this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Username not Registered</div>');
			redirect('auth');
		}
	}

	public function search_room()
	{
		$skema = $this->input->post('TYPE');
		$no = 0;

		$supporter = $this->M_admin->get_datatables();
		$data = [];
		foreach ($supporter as $item) {
			// $no++;
			$row = [];
			$row[] = '<div class="form-check">
			<input class="form-check-input position-static" type="checkbox" id="check">
		  </div>';
			// Pengisian array sesuai urutan pada table di html
			$row[] = $item->kode_kamar;
			$row[] = $item->nama_kamar;
			$row[] = $item->tamu;
			$row[] = $item->harga;
			$data[] = $row;
		}
		$output = array(
			"draw" => $_POST['draw'],
			"recordsTotal" => $this->M_admin->count_filtered(),
			"recordsFiltered" => $this->M_admin->count_filtered(),
			"data" => $data,
		);
		echo json_encode($output);
	}

	public function modal_checkin($id_room)
	{
		$data['customer'] = $this->M_admin->getCustomer();
		$data['room_row'] = $this->M_admin->getRoomId($id_room);
		$data['item'] = $this->M_admin->data_item();
		$this->load->view('admin/modal_checkin', $data);
	}

	public function modal_checkout($id_room)
	{
		// $data['customer'] = $this->M_admin->getCustomer();
		// $data['item'] = $this->M_admin->data_item();
		$data['room_row'] = $this->M_admin->getRoomId($id_room);
		$this->load->view('admin/modal_checkout', $data);
		// $type_id = $this->input->post('type_id');
		// if ($type_id != null) {
		// 	$room = $this->M_admin->getRoomCategory($type_id);
		// 	if ($room != null) {
		// 		foreach ($room as $row) {
		// 			echo '
		// 				<tr>
		// 					<td><div class="form-check">
		// 					<input class="form-check-input position-static" type="checkbox" id="checkbox_room" value="1">
		// 				  </div></td>
		// 					<td>' . $row['kode_kamar'] . '</td>
		// 					<td>' . $row['nama_kamar'] . '</td>
		// 					<td>' . $row['tamu'] . '</td>
		// 					<td>' . $row['harga'] . '</td>
		// 				</tr>
		// 			';
		// 		}
		// 	} else {
		// 		echo '<tr>
		// 				<td colspan="5" class="text-center text-danger">Ruangan Sudah Penuh</td>
		// 			</tr>';
		// 	}
		// } else {
		// 	echo '<tr>
		// 		<td>Gagal</td>
		// 	</tr>';
		// }
	}

	public function add_turis($id)
	{
		$data['title'] = "Add Turis";
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/add_turis', $data);
		$this->load->view('admin/templates/footer');
	}

	//Function Role
	public function role()
	{
		$this->form_validation->set_rules('role', 'Role', 'required', [
			'required' => 'Role cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Role";
			$data['role'] = $this->M_admin->data_role();
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/role', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->addRole();
			$this->session->set_flashdata('flash', 'Created');
			redirect('admin/role');
		}
	}
	public function delete_role($id)
	{
		$this->M_admin->delete('user_rule', $id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/role');
	}
	public function edit_role($id)
	{
		$this->form_validation->set_rules('role', 'Role', 'required', [
			'required' => 'Role cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Customer";
			$data['role'] = $this->M_admin->getByID('user_rule', $id);
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/edit_role', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->editRole();
			$this->session->set_flashdata('flash', 'Updated');
			redirect('admin/role');
		}
	}
	//End Function Role

	//Function Cari Item
	public function cari_item()
	{
		$item_id = $_POST['item_id'];


		$item = $this->db->get_where('tb_item', ['id' => $item_id])->row_array();
		$harga = $item['harga'];
		$nama = $item['nama'];
		echo '<input type="number" hidden class="form-control" id="harga" value="' . $harga . '">
		<input type="text" hidden class="form-control" id="nama_item" value="' . $nama . '">';
	}
	public function cari_barang()
	{
		$barang_id = $_POST['barang_id'];

		$item = $this->db->get_where('tb_item', ['id' => $barang_id])->row_array();
		$harga = $item['harga'];
		$nama = $item['nama'];
		echo '<input type="number" hidden  class="form-control" id="harga_barang" value="' . $harga . '">
		<input type="text" hidden class="form-control" id="nama_barang" value="' . $nama . '">';
	}

	//Function Cek
	public function cek_reservasi()
	{
		//Customer
		$customer_id = implode("','", $this->input->post('id_customer'));
		$checkin = $this->input->post('tgl_checkin');
		$checkout = $this->input->post('tgl_checkout');

		if ($customer_id == null) {
			$nik = $this->input->post('nik');
			$nama = $this->input->post('nama');
			$email = $this->input->post('email');
			$noHp = $this->input->post('noHp');
			if ($nik != '' && $nama != '' && $email != '' && $noHp != '') {
				$data_customer = [
					'nik' => $nik,
					'nama' => $nama,
					'email' => $email,
					'no_hp' => $noHp
				];

				$this->db->insert('tb_customer', $data_customer);
				$customer_id = $this->db->insert_id();
			}
		}
		//Reservasi
		if ($checkin != '' && $checkout != '') {
			$kode_reservasi = $this->M_admin->code_reservasi();
			$tanggal = date("Y-m-d");
			$employee_id = $this->session->userdata('id');

			$data_reservasi = [
				'tanggal' => $tanggal,
				'employee_id' => $employee_id,
				'customer_id' => $customer_id,
				'kode_reservasi' => $kode_reservasi
			];

			$this->db->insert('tb_reservasi', $data_reservasi);
			$reservasi_id = $this->db->insert_id();
		}

		//Reservasi Room
		$id_kamar = $this->input->post('id_kamar');
		$harga = $this->input->post('harga_kamar');
		if ($checkin != '' && $checkout != '' && $harga != '') {
			$data_reservasi_room = [
				'reservasi_id' => $reservasi_id,
				'room_id' => $id_kamar,
				'checkin_date' => $checkin,
				'checkout_date' => $checkout,
				'harga' => $harga
			];

			$this->db->insert('tb_reservasi_room', $data_reservasi_room);
			$reservasi_room_id = $this->db->insert_id();

			$this->db->set('status', 3);
			$this->db->where('id', $id_kamar);
			$this->db->update('tb_kamar');
		}

		$id_barang_get = $_POST['id_barang'];
		$quantity_get = $_POST['quantity'];
		$harga_barang_get = $_POST['harga_barang'];

		if ($id_barang_get != '' && $quantity_get != '' && $harga_barang_get != '') {
			for ($count = 0; $count < count($id_barang_get); $count++) {
				$item_id_count = $id_barang_get[$count];
				$qty_count = $quantity_get[$count];
				$harga_count = $harga_barang_get[$count];

				if ($item_id_count != '' && $qty_count != '' && $harga_count != '') {
					$data_reservasi_request = [
						'reservasi_room_id' => $reservasi_room_id,
						'item_id' => $item_id_count,
						'qty' => $qty_count,
						'total_bayar' => $harga_count
					];

					$this->db->insert('tb_reservasi_request_item', $data_reservasi_request);
				} else {
					echo 'Barang Masih Kosong';
				}
			}
		}
	}
	//End Function Cek

	//Function Add Item
	public function reservasi_addItem()
	{
		$item_id = $_POST['item_id'];
		$qty = $_POST['qty'];
		$harga = $_POST['harga'];
		$room_id = $_POST['room_id'];

		$reservation_room = $this->db->get_where('tb_reservasi_room', ['room_id' => $room_id])->row_array();
		$reservation_room_id = $reservation_room['id'];
		//cek
		$cek_request_item = $this->db
			->select('item_id')
			->get_where('tb_reservasi_request_item', ['reservasi_room_id' => $reservation_room_id])
			->result_array();

		$counter = 0;
		foreach ($item_id as $id) {
			if (in_array(['item_id' => $id], $cek_request_item)) {
				$this->db
					->set('qty', 'qty+' . (int) $qty[$counter], false)
					->set('total_bayar', 'total_bayar+' . (int) $harga[$counter++], false)
					->where(['reservasi_room_id' => $reservation_room_id, 'item_id' => $id])
					->update('tb_reservasi_request_item');
			} else {
				$data = [
					'reservasi_room_id' => $reservation_room_id,
					'item_id'           => $item_id[$counter],
					'qty'               => $qty[$counter],
					'total_bayar'       => $harga[$counter++]
				];

				$this->db->insert('tb_reservasi_request_item', $data);
			}
		}
	}
	//End Function Add Item

	//Function Item
	public function item()
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => 'Name Item Cannot Empity'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Item";
			// $data['customerdata'] = $this->M_admin->data_transaksi_id($id);
			$data['item'] = $this->M_admin->data_item();
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/item', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->AddItem();
			$this->session->set_flashdata('flash', 'Created');
			redirect('admin/item');
		}
	}
	public function delete_item($id)
	{
		$this->M_admin->delete('tb_item', $id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/item');
	}
	public function edit_item($id)
	{
		$this->form_validation->set_rules('nama', 'Nama', 'required', [
			'required' => 'Name Item Cannot Empity'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Item";
			$data['item'] = $this->M_admin->getByID('tb_item', $id);
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/edit_item', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->editItem();
			$this->session->set_flashdata('flash', 'Updated');
			redirect('admin/item');
		}
	}
	//End Function Item




	//Code Old

	//Start Dashboard
	public function index()
	{
		$data['title'] = "Dashboard";
		$data['customer_row'] = $this->M_admin->data_customer_row();
		$data['room_row'] = $this->M_admin->data_room_row();
		$data['category_row'] = $this->M_admin->data_category_row();
		$data['transaction_row'] = $this->M_admin->data_transaction_row();
		$data['active'] = $this->M_admin->data_active();
		$data['transaction'] = $this->M_admin->data_transaction_not();
		$data['payment'] = $this->M_admin->data_not_payment();
		$data['not_transfer'] = $this->M_admin->data_not_transfer();
		$data['transfer'] = $this->M_admin->data_transfer();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('admin/templates/footer');
	}
	//End Dashboard




	//Start Customer
	public function customer()
	{
		$data['title'] = "Customer";
		$data['customerdata'] = $this->M_admin->data_customer();
		$data['role'] = $this->M_admin->data_role();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/customer', $data);
		$this->load->view('admin/templates/footer');
	}

	public function edit_customer($id)
	{
		$this->form_validation->set_rules('id', 'ID', 'required', [
			'required' => 'ID cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Customer";
			// $data['customerdata'] = $this->M_admin->data_transaksi_id($id);
			$data['role'] = $this->M_admin->data_role();
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/edit_customer', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->edit_customer();
			$this->session->set_flashdata('flash', 'Updated');
			redirect('admin/customer');
		}
	}

	public function detail_customer($id)
	{
		$data['title'] = "Customer";
		$data['customerdata'] = $this->M_admin->data_transaksi_id($id);
		$data['role'] = $this->M_admin->data_role();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/detail_customer', $data);
		$this->load->view('admin/templates/footer');
	}

	public function delete_customer($id)
	{
		$this->M_admin->deleteDataCustomer($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/customer');
	}

	public function insert_customer()
	{
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Name cannot be empty'
		]);
		$this->form_validation->set_rules('username', 'Username', 'required', [
			'required' => 'Username cannot be empty'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required', [
			'required' => 'Password cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Customer";
			$data['customerdata'] = $this->M_admin->data_customer();
			$data['role'] = $this->M_admin->data_role();
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/customer', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->addCustomer();
			$this->session->set_flashdata('flash', 'Created');
			redirect('admin/customer');
		}
	}

	public function pdf_customer()
	{
		$data['customerdata'] = $this->M_admin->data_customer_role();
		$this->load->view('admin/pdf/pdf_customer', $data);
	}
	//End Customer





	//Start Room
	public function room()
	{
		$data['title'] = "Room";
		$data['roomdata'] = $this->M_admin->data_room();
		$data['role'] = $this->M_admin->data_role();
		$data['kategori'] = $this->M_admin->data_kategori();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/room', $data);
		$this->load->view('admin/templates/footer');
	}

	public function detail_room($id)
	{
		$data['title'] = "Room";
		$data['roomdata'] = $this->M_admin->data_RoomById($id);
		$data['role'] = $this->M_admin->data_role();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/detail_room', $data);
		$this->load->view('admin/templates/footer');
	}

	public function edit_room($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Name Category cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Room";
			$data['roomdata'] = $this->M_admin->data_RoomById($id);
			$data['role'] = $this->M_admin->data_role();
			$data['kategori'] = $this->M_admin->data_kategori();
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/edit_room', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->editRoom();
			$this->session->set_flashdata('flash', 'Updated');
			redirect('admin/room');
		}
	}

	public function insert_room()
	{
		$this->form_validation->set_rules('nameroom', 'Room Name', 'required', [
			'required' => 'Room Name cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Room";
			$data['roomdata'] = $this->M_admin->data_room();
			$data['role'] = $this->M_admin->data_role();
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/room', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$roomcode = $this->input->post('roomcode');
			$cek_data = $this->db->get_where('tb_kamar', ['kode_kamar' => $roomcode])->num_rows();
			if ($cek_data != null) {
				$this->session->set_flashdata('flash2', 'Kode Kamar sudah tersedia');
				redirect('admin/room');
			}
			$this->M_admin->addRoom();
			$this->session->set_flashdata('flash', 'Created');
			redirect('admin/room');
		}
	}

	public function rusak_room($id)
	{
		$this->M_admin->rusakRoom($id);
		$this->session->set_flashdata('flash', 'Updated');
		redirect('admin/room');
	}

	public function tidak_rusak_room($id)
	{
		$this->M_admin->tidakRusakRoom($id);
		$this->session->set_flashdata('flash', 'Updated');
		redirect('admin/room');
	}

	public function delete_room($id)
	{
		$this->M_admin->deleteDataRoom($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/room');
	}

	public function pdf_room()
	{
		$data['roomdata'] = $this->M_admin->data_room_role();
		$this->load->view('admin/pdf/pdf_room', $data);
	}
	//End Room

	//Start Category
	public function category()
	{
		$data['title'] = "Category";
		$data['role'] = $this->M_admin->data_role();
		$data['kategori'] = $this->M_admin->data_kategori();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/category', $data);
		$this->load->view('admin/templates/footer');
	}

	public function insert_category()
	{
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Name Category cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Category";
			$data['role'] = $this->M_admin->data_role();
			$data['kategori'] = $this->M_admin->data_kategori();
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/category', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->addCategory();
			$this->session->set_flashdata('flash', 'Created');
			redirect('admin/category');
		}
	}

	public function edit_category($id)
	{
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Name Category cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Category";
			$data['kategori_id'] = $this->M_admin->data_CategoryById($id);
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/edit_category', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->editCategory();
			$this->session->set_flashdata('flash', 'Updated');
			redirect('admin/category');
		}
	}

	public function delete_category($id)
	{
		$this->M_admin->deleteDataCategory($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/category');
	}
	//End Category


	//Start Transaksi

	public function delete_transaction($id)
	{
		$this->M_admin->deleteDataTransaction($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/transaksi_ready');
	}

	public function transaksi_ready()
	{
		$data['title'] = "First Check";
		$data['transactiondata_ready'] = $this->M_admin->data_transaction_ready();
		$data['transactiondata_not'] = $this->M_admin->data_transaction_not();
		$data['role'] = $this->M_admin->data_role();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/transaction_ready', $data);
		$this->load->view('admin/templates/footer');
	}



	public function send_email($id)
	{
		$data['title'] = "All Transaction";
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$data['transaksi'] = $this->M_admin->data_transaksi_id($id);
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/send_email', $data);
		$this->load->view('admin/templates/footer');
	}

	public function send()
	{
		$email = $this->input->post('email');
		$nama = $this->input->post('name');
		$kode = $this->input->post('kode');
		$checkin = $this->input->post('checkin');
		$checkout = $this->input->post('checkout');
		$telp = $this->input->post('telp');
		$price = $this->input->post('price');
		$credit = $this->input->post('credit');
		$durasi = $this->input->post('durasi');
		$order = $this->input->post('order');
		$room = $this->input->post('kamar');
		$check = $this->input->post('check');
		// $id_room = $this->input->post('id_kamar');
		// $id_user = $this->input->post('id_user');
		// $alamat = $this->input->post('alamat');

		$subject = 'Detail Reservation from Javahotel';

		$message = '
            <h3>Payment Details</h3>
            <p>Click Button Payment for get No Transaction</p>
            <table>
                <tr>
                    <td width="30%">Booking Code :</td>
                    <td width="70%">' . $kode . '</td>
                </tr>
                <tr>
                    <td width="30%">Name :</td>
                    <td width="70%">' . $nama . '</td>
                </tr>
                <tr>
                    <td width="30%">Room Name :</td>
                    <td width="70%">' . $room . '</td>
                </tr>
                <tr>
                    <td width="30%">Check In :</td>
                    <td width="70%">' . $checkin . '</td>
                </tr>
                <tr>
                    <td width="30%">Check Out :</td>
                    <td width="70%">' . $checkout . '</td>
                </tr>
                <tr>
                    <td width="30%">Duration :</td>
                    <td width="70%">Night ' .  $durasi . '</td>
                </tr>
                <tr>
                    <td width="30%">Room :</td>
                    <td width="70%">Night ' .  $durasi . '</td>
                </tr>
                <tr>
                    <td width="30%">Order Date :</td>
                    <td width="70%">' . $order . '</td>
                </tr>
                <tr>
                    <td width="30%">Number Telphone :</td>
                    <td width="70%">' . $telp . '</td>
                </tr>
                <tr>
                    <td width="30%">Credit Number :</td>
                    <td width="70%">' . $credit . '</td>
                </tr>
                <tr>
                    <td width="30%">Price :</td>
                    <td width="70%">' . $price . '</td>
                </tr>
                <tr>
                    <td align="center"><a class="btn btn-primary" type="button" href="' . base_url('home/payment/') . $kode . '">Payment</a></td>
                </tr>
            </table>
        ';

		$config['protocol']    = 'smtp';
		$config['smtp_host']    = 'ssl://smtp.gmail.com';
		$config['smtp_port']    = '465';
		$config['smtp_timeout'] = '5';
		$config['smtp_user']    = 'javahotel2020@gmail.com';
		$config['smtp_pass']    = 'rahasia1234567';
		$config['charset']    = 'utf-8';
		$config['newline']    = "\r\n";
		$config['mailtype'] = 'html';
		$config['validation'] = TRUE;

		$this->email->initialize($config);


		$this->email->from('javahotel2020@gmail.com');
		$this->email->to($email);

		$this->email->subject($subject);
		$this->email->message($message);


		if ($this->email->send()) {
			$this->db->set('is_email', $check);
			$this->db->where('nomor_pesanan', $kode);
			$this->db->update('transaksi');
			redirect('admin/transaksi_ready');
			$this->session->set_flashdata('flash', 'Sended');
		} else {
			echo $this->email->print_debugger();
		}
	}
	//End Transaksi


	//Start Menu
	public function menu()
	{
		$data['title'] = "Menu Management";
		$data['menu'] = $this->M_admin->data_menu();
		$data['role'] = $this->M_admin->data_role();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/menu', $data);
		$this->load->view('admin/templates/footer');
	}

	public function insert_menu()
	{
		$this->form_validation->set_rules('menu', 'Menu', 'required', [
			'required' => 'Menu Category cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Menu Management";
			$data['menu'] = $this->M_admin->data_menu();
			$data['role'] = $this->M_admin->data_role();
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/menu', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->addMenu();
			$this->session->set_flashdata('flash', 'Created');
			redirect('admin/menu');
		}
	}

	public function delete_menu($id)
	{
		$this->M_admin->deleteDataMenu($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/room');
	}
	//End Menu




	//Start Submenu
	public function submenu()
	{
		$data['title'] = "Submenu Management";
		$data['menu'] = $this->M_admin->data_menu();
		$data['submenu'] = $this->M_admin->data_submenu();
		$data['role'] = $this->M_admin->data_role();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/submenu', $data);
		$this->load->view('admin/templates/footer');
	}

	public function insert_submenu()
	{
		$this->form_validation->set_rules('menu', 'Menu', 'required', [
			'required' => 'Menu Category cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Submenu Management";
			$data['menu'] = $this->M_admin->data_menu();
			$data['submenu'] = $this->M_admin->data_submenu();
			$data['role'] = $this->M_admin->data_role();
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/submenu', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$this->M_admin->addSubmenu();
			$this->session->set_flashdata('flash', 'Created');
			redirect('admin/submenu');
		}
	}

	public function delete_submenu($id)
	{
		$this->M_admin->deleteDataSubmenu($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/submenu');
	}
	//End Submenu


	//Start Reservasi
	public function reservasi()
	{
		$data['title'] = "Reservasi";
		$data['customer_row'] = $this->M_admin->data_customer_row();
		$data['room_row'] = $this->M_admin->data_room_row();
		$data['category_row'] = $this->M_admin->data_category_row();
		$data['transaction_row'] = $this->M_admin->data_transaction_row();
		$data['payment_row'] = $this->M_admin->data_payment_row();
		$data['customer'] = $this->M_admin->getCustomer();
		$data['kategori'] = $this->M_admin->data_kategori();

		$data['room'] = $this->M_admin->getRoom();
		$data['active'] = $this->M_admin->data_active();
		$data['item'] = $this->M_admin->data_item();
		$data['transaction'] = $this->M_admin->data_transaction_not();
		$data['payment'] = $this->M_admin->data_not_payment();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/reservasi_new', $data);
		$this->load->view('admin/templates/footer');
	}
	//End Reservasi

	//Start Payment
	public function payment()
	{
		$data['title'] = "Second Check";
		$data['payment'] = $this->M_admin->data_payment();
		$data['payment_not'] = $this->M_admin->data_not_payment();
		$data['not_transfer'] = $this->M_admin->data_not_transfer();
		$data['role'] = $this->M_admin->data_role();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/payment', $data);
		$this->load->view('admin/templates/footer');
	}

	public function detail_payment($kode_pembayaran)
	{

		$this->form_validation->set_rules('code_payment', 'Code Payment', 'required', [
			'required' => 'Code Payment cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Payment";
			$data['payment_id'] = $this->M_admin->data_payment_id($kode_pembayaran);
			$data['role'] = $this->M_admin->data_role();
			$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
			$this->load->view('admin/templates/header', $data);
			$this->load->view('admin/templates/sidebar', $data);
			$this->load->view('admin/templates/navbar', $data);
			$this->load->view('admin/payment_id', $data);
			$this->load->view('admin/templates/footer');
		} else {
			$data['payment_id'] = $this->M_admin->data_payment_id($kode_pembayaran);
			$payment_code = $this->input->post('code_payment');
			$email = $this->input->post('email');
			$nama = $this->input->post('name');
			$boking_code = $this->input->post('code_boking');
			$checkin = $this->input->post('checkin');
			$checkout = $this->input->post('checkout');
			$telp = $this->input->post('telp');
			$price = $this->input->post('price');
			$durasi = $this->input->post('durasi');
			$order = $this->input->post('order');
			$qr_code = $this->input->post('qr_code');
			$kamar = $this->input->post('kamar');
			$id_kamar = $this->input->post('id_kamar');
			$id_transaksi = $this->input->post('id_transaksi');
			$check = $this->input->post('check');
			$metode = $this->input->post('metode');
			$pembayaran = $this->input->post('pembayaran');

			$subject = 'Detail Payment from EDOTEL ALOEVERA';

			$message = '
            <h3>Payment Details</h3>
            <p>Provide payment code and qr code on the reservation</p>
            <table>
                <tr>
                    <td width="30%">Payment Code :</td>
                    <td width="70%">' . $payment_code . '</td>
                </tr>
                <tr>
                    <td width="30%">Booking Code :</td>
                    <td width="70%">' . $boking_code . '</td>
                </tr>
                <tr>
                    <td width="30%">Name :</td>
                    <td width="70%">' . $nama . '</td>
                </tr>
                <tr>
                    <td width="30%">Room Name :</td>
                    <td width="70%">' . $kamar . '</td>
                </tr>
                <tr>
                    <td width="30%">Check In :</td>
                    <td width="70%">' . $checkin . '</td>
                </tr>
                <tr>
                    <td width="30%">Check Out :</td>
                    <td width="70%">' . $checkout . '</td>
                </tr>
                <tr>
                    <td width="30%">Duration :</td>
                    <td width="70%">' . $durasi . '</td>
                </tr>
                <tr>
                    <td width="30%">Order Date :</td>
                    <td width="70%">' . $order . '</td>
                </tr>
                <tr>
                    <td width="30%">Number Telphone :</td>
                    <td width="70%">' . $telp . '</td>
                </tr>
                <tr>
                    <td width="30%">Price :</td>
                    <td width="70%">' . $price . '</td>
                </tr>
                <tr>
                    <td width="30%">Metode Payment :</td>
                    <td width="70%">' . $metode . '</td>
                </tr>
                <tr>
                    <td width="30%">Payment At :</td>
                    <td width="70%">' . $pembayaran . '</td>
                </tr>
                <tr>
                    <td width="30%">QR Code :</td>
                    <td width="70%"></td>
                </tr>
            </table>
        ';

			$config['protocol']    = 'smtp';
			$config['smtp_host']    = 'ssl://smtp.gmail.com';
			$config['smtp_port']    = '465';
			$config['smtp_timeout'] = '7';
			$config['smtp_user']    = 'javahotel2020@gmail.com';
			$config['smtp_pass']    = 'rahasia1234567';
			$config['charset']    = 'utf-8';
			$config['newline']    = "\r\n";
			$config['mailtype'] = 'html';
			$config['validation'] = TRUE;

			$this->load->library('upload');
			$this->email->initialize($config);
			$this->email->attach("uploads/$qr_code", "inline");


			$this->email->from('javahotel2020@gmail.com');
			$this->email->to($email);

			$this->email->subject($subject);
			$this->email->message($message);


			if ($this->email->send()) {
				$this->db->set('is_email', $check);
				$this->db->set('is_transfer', $check);
				$this->db->where('id', $id_transaksi);
				$this->db->update('tb_pembayaran');
				$this->db->set('active', $id_transaksi);
				$this->db->set('status', 2);
				$this->db->where('id', $id_kamar);
				$this->db->update('tb_kamar');
				redirect('admin/payment');
				$this->session->set_flashdata('flash', 'Sended');
			} else {
				echo $this->email->print_debugger();
			}
		}
	}

	public function delete_payment($kode_pembayaran)
	{
		$this->M_admin->deleteDataPayment($kode_pembayaran);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/payment');
	}
	//End Payment

	//Start History
	public function history()
	{
		$data['title'] = "History";
		$data['historydata'] = $this->M_admin->data_history();
		$data['role'] = $this->M_admin->data_role();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/history', $data);
		$this->load->view('admin/templates/footer');
	}

	public function pdf_history()
	{
		$data['historydata'] = $this->M_admin->data_history();
		$this->load->view('admin/pdf/pdf_history', $data);
	}
	//End History

	//Start Transfer
	public function transfer()
	{
		$data['title'] = "Transfer";
		$data['transferdata'] = $this->M_admin->data_transfer();
		$data['role'] = $this->M_admin->data_role();
		$data['admin'] = $this->db->get_where('tb_pegawai', ['username' => $this->session->userdata('username')])->row_array();
		$this->load->view('admin/templates/header', $data);
		$this->load->view('admin/templates/sidebar', $data);
		$this->load->view('admin/templates/navbar', $data);
		$this->load->view('admin/transfer', $data);
		$this->load->view('admin/templates/footer');
	}

	public function delete_transfer($id)
	{
		$this->M_admin->deleteDataTransfer($id);
		$this->session->set_flashdata('flash', 'Deleted');
		redirect('admin/transfer');
	}
	//End Transfer
}
