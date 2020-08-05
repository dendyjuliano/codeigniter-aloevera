<?php


class Home extends CI_Controller
{
	//Function Page
	public function index()
	{
		$data = [
			'title' => "Edotel",
			'roomCategory' => $this->M_home->getCategory(),
		];

		$this->load->view('home/layout/headerHome', $data);
		$this->load->view('home/layout/navbarHome', $data);
		$this->load->view('home/layout/crauselHome', $data);
		$this->load->view('home/layout/page/index', $data);
		$this->load->view('home/layout/footerHome', $data);
	}
	public function aboutPage()
	{
		$data = [
			'roomCategory' => $this->M_home->getCategory(),
			'title' => "About"
		];
		$this->load->view('home/layout/headerHome', $data);
		$this->load->view('home/layout/navbarHome', $data);
		$this->load->view('home/layout/jumbotronHome', $data);
		$this->load->view('home/layout/page/aboutPage', $data);
		$this->load->view('home/layout/footerHome', $data);
	}
	public function servicePage()
	{
		$data = [
			'roomCategory' => $this->M_home->getCategory(),
			'title' => "Service"
		];
		$this->load->view('home/layout/headerHome', $data);
		$this->load->view('home/layout/navbarHome', $data);
		$this->load->view('home/layout/jumbotronHome', $data);
		$this->load->view('home/layout/page/servicePage', $data);
		$this->load->view('home/layout/footerHome', $data);
	}
	public function contactPage()
	{
		$data = [
			'roomCategory' => $this->M_home->getCategory(),
			'title' => "Contact"
		];
		$this->load->view('home/layout/headerHome', $data);
		$this->load->view('home/layout/navbarHome', $data);
		$this->load->view('home/layout/jumbotronHome', $data);
		$this->load->view('home/layout/page/contactPage', $data);
		$this->load->view('home/layout/footerHome', $data);
	}
	public function selectRoom($idCategory)
	{
		$data = [
			'roomCategoryById' => $this->M_home->getCategoryById($idCategory),
			'roomCategory' => $this->M_home->getCategory(),
			'title' => "Select Room"
		];
		$this->load->view('home/layout/headerHome', $data);
		$this->load->view('home/layout/navbarHome', $data);
		$this->load->view('home/layout/jumbotronHome', $data);
		$this->load->view('home/layout/page/selectRoomPage', $data);
		$this->load->view('home/layout/footerHome', $data);
	}
	//Function Send Email Contact
	public function contactProcess()
	{
		$messageForm = $this->input->post('message');
		$nameForm = $this->input->post('name');
		$emailForm = $this->input->post('email');
		$subjectForm = $this->input->post('subject');
		$subject = $subjectForm;

		$message = '
			<h3>From : ' . $emailForm . '</h3>
			<h3>Name : ' . $nameForm . '</h3>
            <p>' . $messageForm . '</p>
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


		$this->email->from($emailForm);
		$this->email->to('dendijuliano2016@gmail.com');

		$this->email->subject($subject);
		$this->email->message($message);


		if ($this->email->send()) {
			redirect('home/contactPage');
		} else {
			echo $this->email->print_debugger();
		}
	}
	//Function System
	public function searchRoom()
	{
		$checkinDate = date("Y-m-d", strtotime($this->input->post('checkinDate')));
		$checkoutDate = date("Y-m-d", strtotime($this->input->post('checkoutDate')));
		$adults = $this->input->post('adults');
		$children = $this->input->post('children');
		$room = $this->input->post('roomNumber');

		$dataReservation = [
			'checkinDate' => $checkinDate,
			'checkoutDate' => $checkoutDate,
			'adults' => $adults,
			'children' => $children,
			'room' => $room
		];

		$this->session->set_userdata($dataReservation);
		redirect('home/aviableRoom');
	}

	public function aviableRoom()
	{
		$data = [
			'title' => "Search Room",
			'roomCategory' => $this->M_home->getCategory(),
		];
		$this->load->view('home/layout/headerHome', $data);
		$this->load->view('home/layout/navbarHome', $data);
		$this->load->view('home/layout/jumbotronHome', $data);
		$this->load->view('home/layout/page/searchRoomPage', $data);
		$this->load->view('home/layout/footerHome', $data);
	}
}
