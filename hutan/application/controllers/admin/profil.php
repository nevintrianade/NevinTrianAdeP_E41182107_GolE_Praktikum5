<?php
class Profil extends CI_Controller{ //class turunan CI_contoller
 
	function __construct(){  //fungsi construct
		parent::__construct();		 //construct pada parent
		$this->load->model('m_data'); //memanggil model bernama "m_data"
		$this->load->helper('url'); //memanggil helper url
		$this->load->helper('html'); //memanggil helper html
		$this->load->library('upload'); //memanggil library upload
	}
function index() { //fungsi untuk edit data
		$USERNAME=$this->session->userdata("USERNAME");
		$this->load->view('v_header'); //menampilkan header
		$this->load->view('v_sidebar'); //menampilkan sidebar
		$where = array('USERNAME' => $USERNAME); //membuat array id
		$data['user'] = $this->m_data->edit_data($where,'user')->result();  //memanggil edit_data pada model m_data
		$this->load->view('admin/v_edit',$data); //menampilkan form edit data
		
	}
}
	?>