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
	public function selectRoom()
	{
		$checkinDate = date("Y-m-d", strtotime($this->input->get('checkinDate')));
		$checkoutDate = date("Y-m-d", strtotime($this->input->get('checkoutDate')));
		$adults = $this->input->get('adults');
		$children = $this->input->get('children');
		$room = $this->input->get('room');
		$idCategory = $this->input->get('idCategory');

		$data = array(
			'idCategory' => $idCategory,
			'checkinDate' => $checkinDate,
			'checkoutDate' => $checkoutDate,
			'adults' => $adults,
			'children' => $children,
			'room' => $room,
			'title' => "Select Room",
			'status' => true,
		);

		echo json_encode($data);
	}
	public function viewSelectRoom($checkinDate, $checkoutDate, $adults, $children, $room)
	{
		$data = [
			'roomCategory' => $this->M_home->getCategory(),
			'checkinDate' => date("m/d/Y", strtotime($checkinDate)),
			'checkoutDate' => date("m/d/Y", strtotime($checkoutDate)),
			'adults' => $adults,
			'children' => $children,
			'room' => $room,
			'title' => "Select Room",
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
	public function searchRoom($checkinDate, $checkoutDate, $adults, $children, $room)
	{
		$data = [
			'roomCategory' => $this->M_home->getCategory(),
			'checkinDate' => date("m/d/Y", strtotime($checkinDate)),
			'checkoutDate' => date("m/d/Y", strtotime($checkoutDate)),
			'adults' => $adults,
			'children' => $children,
			'room' => $room,
			'title' => "Aviable Room",
		];

		// var_dump($data['roomCategory']);
		$this->load->view('home/layout/headerHome', $data);
		$this->load->view('home/layout/navbarHome', $data);
		$this->load->view('home/layout/jumbotronHome', $data);
		$this->load->view('home/layout/page/searchRoomPage', $data);
		$this->load->view('home/layout/footerHome', $data);
	}
	public function countRoom()
	{
		$checkinDate = strtotime($this->input->post('checkinDate'));
		$checkoutDate = strtotime($this->input->post('checkoutDate'));
		// $adults = $this->input->post('adults');
		// $children = $this->input->post('children');
		$room = $this->input->post('room');
		$idCategory = $this->input->post('idCategory');
		$roomById = $this->M_home->getCategoryById($idCategory);
		$priceRoom = $roomById['harga'];

		// Formulate the Difference between two dates 
		$diff = abs($checkoutDate - $checkinDate);
		// total seconds in a year (365*60*60*24) 
		$years = floor($diff / (365 * 60 * 60 * 24));
		// total seconds in a month (30*60*60*24) 
		$months = floor(($diff - $years * 365 * 60 * 60 * 24)
			/ (30 * 60 * 60 * 24));
		// total seconds in a days (60*60*24) 
		$days = floor(($diff - $years * 365 * 60 * 60 * 24 -
			$months * 30 * 60 * 60 * 24) / (60 * 60 * 24));

		$subtotalPrice = $priceRoom * $room * $days;
		$data = array(
			'idCategory' => $roomById['id_kategori'],
			'roomName' => $roomById['nama_kategori'],
			'days' => $days,
			'subtotalPrice' =>  number_format($subtotalPrice, 0, ',', '.'),
		);

		$this->load->view('home/layout/card/cardPayment', $data);
	}

	public function bookingInformation($checkinDate, $checkoutDate, $adults, $children, $room)
	{
		$data = [
			'roomCategory' => $this->M_home->getCategory(),
			'checkinDate' => date("m/d/Y", strtotime($checkinDate)),
			'checkoutDate' => date("m/d/Y", strtotime($checkoutDate)),
			'adults' => $adults,
			'children' => $children,
			'room' => $room,
			'title' => "Booking Detail",
		];

		$this->load->view('home/layout/headerHome', $data);
		$this->load->view('home/layout/navbarHome', $data);
		$this->load->view('home/layout/jumbotronHome', $data);
		$this->load->view('home/layout/page/bookingDetailPage', $data);
		$this->load->view('home/layout/footerHome', $data);
	}
}
