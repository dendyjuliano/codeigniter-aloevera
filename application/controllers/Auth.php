<?php
class Auth extends CI_Controller
{

	public function index()
	{
		$this->form_validation->set_rules('username', 'Username', 'required|trim', [
			'required' => 'Username cannot be empty'
		]);
		$this->form_validation->set_rules('password', 'Password', 'required|trim', [
			'required' => 'Password cannot be empty'
		]);

		if ($this->form_validation->run() == false) {
			$data['title'] = "Login Admin";
			$this->load->view('home/login2', $data);
		} else {
			$this->_login();
		}
	}

	// public function register()
	// {
	// 	$this->form_validation->set_rules('name', 'Name', 'required|trim', [
	// 		'required' => 'Name cannot be empty'
	// 	]);
	// 	$this->form_validation->set_rules('password', 'Password', 'required|trim', [
	// 		'required' => 'Password cannot be empty'
	// 	]);
	// 	$this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[tb_customer.username]', [
	// 		'required' => 'Username cannot be empty',
	// 		'is_unique' => 'This Username has already registered'
	// 	]);
	// 	if ($this->form_validation->run() == false) {
	// 		$data['title'] = "Register";
	// 		$this->load->view('home/register', $data);
	// 	} else {
	// 		$this->M_auth->register();
	// 		$this->session->set_flashdata('flash', 'Created');
	// 		redirect('home');
	// 	}
	// }

	private function _login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('tb_pegawai', ['username' => $username])->row_array();

		if ($user) {
			if (password_verify($password, $user['password'])) {
				$data = [
					'id' => $user['id'],
					'username' => $user['username'],
					'nama' => $user['nama'],
					'role_id' => $user['role_id'],
					'image' => $user['image'],
					'status' => true,
				];

				$this->session->set_userdata($data);
				if ($user['role_id'] == 1) {
					redirect('admin');
				} elseif ($user['role_id'] == 2) {
					redirect('admin/reservasi');
				} else {
					redirect('auth');
				}
			} else {
				$this->session->set_flashdata('flash3', 'Wrong');
				redirect('auth');
			}
		} else {
			$this->session->set_flashdata('flash2', 'Created');
			redirect('auth');
		}
	}

	public function logout()
	{
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('name');
		$this->session->unset_userdata('role_id');

		$this->session->set_flashdata('flash4', 'Logout');
		redirect('auth');
	}
}
