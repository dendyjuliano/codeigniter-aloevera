<?php
class HomeOld extends CI_Controller
{

	public function index()
	{
		$data['title'] = "Edotel";
		$this->load->view('home/layout/index', $data);
	}

	public function search()
	{


		$guest = $this->input->post('guest');
		$room = $this->input->post('room');
		$checkin = $this->input->post('checkin');
		$checkout = $this->input->post('checkout');
		$night = $this->input->post('malam');

		$data2 = [
			'tamu' => $guest,
			'room' => $room,
			'checkin' => $checkin,
			'night' => $night,
			'checkout' => $checkout
		];

		$this->session->set_userdata($data2);
		redirect('home/room_id', $data2);
	}

	public function room_id()
	{
		$data2['title'] = "Room";
		$this->load->view('home/hotel_search', $data2);
	}

	public function room_i()
	{
		$data['title'] =  "Room Information";
		$this->load->view('home/room_information', $data);
	}

	public function select_room($id, $rowCount)
	{

		$roomSelect = $this->session->userdata('room');

		if ($rowCount < $roomSelect) {
			$this->session->set_flashdata('flash99', 'Error');
			redirect('home/room_id');
		}
		$this->form_validation->set_rules('name', 'Name', 'required', [
			'required' => 'Name cannot be empty'
		]);
		$this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
			'is_unique' => 'This Email has already registered',
			'required' => 'Email cannot be empty'
		]);
		$this->form_validation->set_rules('phone', 'Number Phone', 'required', [
			'required' => 'Number Phone cannot be empty'
		]);
		$this->form_validation->set_rules('city', 'City', 'required', [
			'required' => 'City cannot be empty'
		]);
		$this->form_validation->set_rules('address', 'Address', 'required', [
			'required' => 'Address cannot be empty'
		]);


		if ($this->form_validation->run() == false) {
			$data['title'] = "Payment";
			$data['kode'] = $this->M_home->uniqe_code();
			$data['room'] = $this->M_home->get_room_id($id);
			$data['room_count'] = $this->M_home->get_room_count($id);
			$this->load->view('home/room_id', $data);
		} else {
			$kode = $this->input->post('kode');
			$nama = $this->input->post('name');
			$email = $this->input->post('email');
			$kota = $this->input->post('city');
			$nomor = $this->input->post('phone');
			$alamat = $this->input->post('address');

			$id_room = $this->input->post('id_room');
			$checkin = $this->input->post('checkin');
			$checkout = $this->input->post('checkout');
			$tamu = $this->input->post('guest');
			$room = $this->input->post('room');
			$durasi = $this->input->post('night');
			$harga = $this->input->post('harga');

			$data = [
				'nomor_pesanan' => $kode,
				'id_kamar' => $id_room,
				'nama_customer' => $nama,
				'email_customer' => $email,
				'kota_customer' => $kota,
				'no_customer' => $nomor,
				'alamat_customer' => $alamat,
				'checkin' => $checkin,
				'checkout' => $checkout,
				'tamu' => $tamu,
				'jml_room' => $room,
				'durasi' => $durasi,
				'harga' => $harga,
				'tgl_pesanan' => date("Y-m-d")
			];

			$this->db->insert('transaksi', $data);
			$this->session->set_userdata($data);
			redirect('home/success', $data);
		}
	}

	public function success()
	{
		$kode = $this->input->post('kode');
		$nama = $this->input->post('name');
		$email = $this->input->post('email');
		$kota = $this->input->post('city');
		$nomor = $this->input->post('phone');
		$alamat = $this->input->post('address');

		$id_room = $this->input->post('id_room');
		$checkin = $this->input->post('checkin');
		$checkout = $this->input->post('checkout');
		$tamu = $this->input->post('guest');
		$room = $this->input->post('room');
		$durasi = $this->input->post('night');
		$harga = $this->input->post('harga');

		$data = [
			'nomor_pesanan' => $kode,
			'id_kamar' => $id_room,
			'nama_customer' => $nama,
			'email_customer' => $email,
			'kota_customer' => $kota,
			'no_customer' => $nomor,
			'alamat_customer' => $alamat,
			'checkin' => $checkin,
			'checkout' => $checkout,
			'tamu' => $tamu,
			'room' => $room,
			'durasi' => $durasi,
			'harga' => $harga,
			'tgl_pesanan' => time()
		];

		$data['title'] = "Success";
		$this->load->view('home/success', $data);
	}

	public function search_payment()
	{
		$metode = $this->input->post('metode');
		$payment = $this->M_home->data_payment($metode);

		if (count($payment) > 0) {
			$select = '';
			foreach ($payment as $row) {
				$select .= '<option value="' . $row->id . '">' . $row->pembayaran . '</option>';
			}
			echo json_encode($select);
		}
	}

	public function payment($kode)
	{
		$this->form_validation->set_rules('metode', 'Metode', 'required', [
			'required' => 'Metode cannot be empty'
		]);
		$this->form_validation->set_rules('payment', 'Payment', 'required', [
			'required' => 'Metode Payment cannot be empty'
		]);
		$this->load->library('ciqrcode'); //pemanggilan library QR CODEx


		if ($this->form_validation->run() == false) {
			$data['kode'] = $this->M_home->uniqe_code2();
			$data['metode'] = $this->M_home->get_metode();
			$data['transaksi'] = $this->M_home->get_transactionId($kode);
			$data['title'] = "Payment";
			$this->load->view('home/payment', $data);
		} else {
			$id_metode = $this->input->post('metode');
			$id_payment = $this->input->post('payment');
			$nomor = $this->input->post('nomor');
			$code = $this->input->post('kode');


			$data2 = [
				'code' => $code
			];
			$this->session->set_userdata($data2);

			$config['cacheable']    = true; //boolean, the default is true
			$config['cachedir']     = './assets/'; //string, the default is application/cache/
			$config['errorlog']     = './assets/'; //string, the default is application/logs/
			$config['imagedir']     = 'uploads/'; //direktori penyimpanan qr code
			$config['quality']      = true; //boolean, the default is true
			$config['size']         = '1024'; //interger, the default is 1024
			$config['black']        = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white']        = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);

			$image_name = $code . '.png';

			$params['data'] = $code; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 10;
			$params['savename'] = FCPATH . $config['imagedir'] . $image_name; //simpan image QR CODE ke folder assets/images/
			$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE

			$this->M_home->insert_payment($id_metode, $id_payment, $nomor, $code, $image_name);
			$this->session->set_flashdata('flash9', 'Success');

			if ($id_metode == 1) {
				redirect('home/index');
			} else {
				redirect('home/proof', $data2);
			}
		}
	}

	public function proof()
	{
		$data['title'] = "Proof Payment";
		$code = $this->session->userdata('code');
		$data['pembayaran'] = $this->M_home->data_payment_code($code);
		$this->load->view('home/proof', $data);
	}

	public function transfer()
	{
		$value = $this->input->post('transfer');
		$kode = $this->input->post('kode');
		$payment = $this->input->post('pilih');

		$data2 = [
			'kode' => $kode,
			'payment' => $payment
		];

		$this->session->set_userdata($data2);

		$this->db->set('transferred', $value);
		$this->db->where('kode_pembayaran', $kode);
		$this->db->update('tb_pembayaran');

		redirect('home/confirm', $data2);
	}

	public function confirm()
	{
		$bayar = $this->session->userdata('payment');
		$data['title'] = "Transfer Proof";
		$data['bank'] = $this->M_home->data_bank($bayar);
		$this->load->view('home/transfer_proof', $data);
	}

	public function confirm_payment()
	{
		$kode = $this->input->post('kode');
		$bank = $this->input->post('bank');
		$nomor_rekening = $this->input->post('rekening');
		$pemilik_rekening = $this->input->post('pemilik');
		$jml_transfer = $this->input->post('jml');

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

		$data = [
			'kode' => $kode
		];

		$this->session->set_userdata($data);

		$this->db->set('kode_pembayaran', $kode);
		$this->db->set('nama_bank', $bank);
		$this->db->set('nomor_rekening', $nomor_rekening);
		$this->db->set('pemilik_rekening', $pemilik_rekening);
		$this->db->set('jml_transfer', $jml_transfer);
		$this->db->insert('tb_transfer');
		redirect('home/success_transfer', $data);
	}

	public function cancel()
	{
		$kode = $this->session->userdata('kode');
		$this->db->delete('tb_pembayaran', ['kode_pembayaran' => $kode]);
		$this->session->set_flashdata('flash10', 'Payment');
		redirect('home/index');
	}

	public function success_transfer()
	{
		$kode = $this->session->userdata('kode');
		$data['title'] = "Success";
		$data['pembayaran'] = $this->M_home->data_payment_user($kode);
		$this->load->view('home/success_transfer', $data);
	}

	public function end()
	{
		$this->session->unset_userdata('nomor_pesanan');
		$this->session->unset_userdata('id_kamar');
		$this->session->unset_userdata('nama_customer');
		$this->session->unset_userdata('email_customer');
		$this->session->unset_userdata('kota_customer');
		$this->session->unset_userdata('no_customer');
		$this->session->unset_userdata('alamat_customer');
		$this->session->unset_userdata('checkin');
		$this->session->unset_userdata('checkout');
		$this->session->unset_userdata('tamu');
		$this->session->unset_userdata('durasi');
		$this->session->unset_userdata('harga');
		$this->session->unset_userdata('tgl_pesanan');

		redirect('home/index');
		$this->session->set_flashdata('flash6', 'Payment');
	}
}
