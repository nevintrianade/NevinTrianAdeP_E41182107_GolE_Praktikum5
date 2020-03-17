<?php 
	 

class User extends CI_Controller{ //class turunan CI_contoller
 
	function __construct(){  //fungsi construct
		parent::__construct();		 //construct pada parent
		$this->load->model('m_data'); //memanggil model bernama "m_data"
		$this->load->helper('url'); //memanggil helper url
		$this->load->helper('html'); //memanggil helper html
		$this->load->library('upload'); //memanggil library upload
		$this->load->helper('form'); //memanggil helper url
	}
    public function index(){ //fungsi untuk halaman
		$this->load->view('v_header'); //untuk menampilkan header
		$this->load->view('v_sidebar'); //untuk menampilkan header
		$this->load->database(); //untuk mengambil database
		$jumlah_data = $this->m_data->jumlah_data(); //memanggil model jumlah data
		$this->load->library('pagination'); //memanggil library pagination
		$config['base_url'] = base_url().'index.php/user/index/'; //mengatur base url
		$config['total_rows'] = $jumlah_data; //menghitung baris
		$config['per_page'] = 10; //mengatur jumlah data perhalaman
		$from = $this->uri->segment(3); //mengatur uri segment
		$this->pagination->initialize($config);		//inisialisasi halaman
		$data['user'] = $this->m_data->data($config['per_page'],$from); //membuat halaman
		$this->load->view('admin/v_user',$data); //memanggil view bernama v_tampil
		
	}

	
    function tambah(){ //fungsi untuk input data
		$this->load->view('v_header'); //memanggil header login
		$this->load->view('v_sidebar'); //memanggil sidebar
		$this->load->view('admin/v_tambah'); //memanggil view bernama "v_input"
		
    }
    
    function tambah_aksi(){ //fungsi untuk input data dalam database
		
		$config = [ //konfigurasi upload
			'upload_path' => './upload/user/', //direktori upload
			'allowed_types' => 'gif|jpg|png', //ekstensi gambar
			'max_size' => 2000, 'max_width' => 2000, //ukuran dan lebar gambar
			'max_height' => 2000 //tinggi gambar
		  ];
		  $this->load->library('upload'); //memanggil library upload
		  $this->upload->initialize($config); //memanggil config yang sudah di buat sebelumnya

		  if ( ! $this->upload->do_upload('FOTO')){ //fungsi upload gambar
			$error = array('error' => $this->upload->display_errors()); //jika terjadi error, maka...
			$this->load->view('v_upload', $error); //tampilkan v_upload
		}else{
			$file = $this->upload->data(); //mengambil data file yang diupload
			$data = ['FOTO' => $file['file_name'], //memasukkan nama file ke field foto.
           'USERNAME' => set_value('USERNAME'), //mengambil data username dari input user
           'EMAIL' => set_value('EMAIL'), //mengambil data email dari input user
		   'PASSWORD' => set_value('PASSWORD'), //mengambil data password dari input user
		   'NAMA' => set_value('NAMA'), //mengambil data nama dari input user
		   'TGLLAHIR_USER' => set_value('TGLLAHIR_USER'), //mengambil data tanggal lahir dari input user
		   'ALAMAT' => set_value('ALAMAT'), //mengambil data alamat dari input user
		   'JK_USER' => set_value('JK_USER'), //mengambil data jenis kelamin dari input user
		   'STATUS' => set_value('STATUS')]; //mengambil data password dari input user

		$this->m_data->input_data($data,'user'); //memanggil input_data pada model m_data
		redirect('admin/user/index'); //meneruskan input data ke link direktori file "admin/user/index"
	}
}
    
    function hapus($USERNAME){ //fungsi untuk hapus data
		$where = array('USERNAME' => $USERNAME); //deklarasi id
		$this->m_data->hapus_data($where,'user');  //memanggil hapus_data pada model m_data
		redirect('admin/user/index'); //meneruskan ke direktori file "crud/index"
    }
    
    function edit($USERNAME){ //fungsi untuk edit data
		$this->load->view('v_header'); //menampilkan header
		$this->load->view('v_sidebar'); //memanggil sidebar
		$where = array('USERNAME' => $USERNAME); //membuat array id
		$data['user'] = $this->m_data->edit_data($where,'user')->result();  //memanggil edit_data pada model m_data
		$this->load->view('admin/v_edit',$data); //menampilkan form edit data
		
    }
    
	function update(){ //fungsi untuk edit data dalam database
		if (!empty($_FILES["FOTO"]["name"])) { //jika foto tidak diinputkan oleh user, maka...
		  $USERNAME = $this->input->post('USERNAME'); //memanggil data username
		  $config = [ //konfigurasi upload
			'upload_path' => './upload/user/', //direktori upload
			'allowed_types' => 'gif|jpg|png', //ekstensi gambar
			'max_size' => 2000, 'max_width' => 2000, //ukuran dan lebar gambar
			'max_height' => 2000 //tinggi gambar
		  ];
		$this->load->library('upload'); //memanggil library upload
		$this->upload->initialize($config); //memanggil config yang sudah di buat sebelumnya

		if ( ! $this->upload->do_upload('FOTO')){ //fungsi upload foto
		  $error = array('error' => $this->upload->display_errors()); //menampilkan error
		  $this->load->view('v_upload', $error); //meneruskan ke view v_upload
	  }else{
		$file = $this->upload->data(); //mengambil data dari file gambar
		$data = ['FOTO' => $file['file_name'], //menginputkan nama file ke field FOTO
	   'USERNAME' => set_value('USERNAME'), //mengambil data username dari input user
	   'EMAIL' => set_value('EMAIL'), //mengambil data email dari input user
	   'PASSWORD' => set_value('PASSWORD'), //mengambil data password dari input user
	   'NAMA' => set_value('NAMA'), //mengambil data nama dari input user
	   'TGLLAHIR_USER' => set_value('TGLLAHIR_USER'), //mengambil data tanggal lahir dari input user
	   'ALAMAT' => set_value('ALAMAT'), //mengambil data alamat dari input user
	   'JK_USER' => set_value('JK_USER'), //mengambil data jenis kelamin dari input user
	   'STATUS' => set_value('STATUS')]; //mengambil data password dari input user
	  $where = array( //membuat array
		  'USERNAME' => $USERNAME //deklarasi id
	  );
	  $this->m_data->update_data($where,$data,'user');  //memanggil update_data pada model m_data
	  redirect('/admin/user/index'); //meneruskan ke direktori file crud/index
  }

	  } else {
		  $USERNAME = $this->input->post('USERNAME'); //memanggil data username
		  $FOTO= $this->input->post('old_FOTO'); //memanggil data foto lama
		  $data = ['FOTO' => $FOTO, //menginputkan data foto lama
		  'USERNAME' => set_value('USERNAME'), //mengambil data username dari input user
		  'EMAIL' => set_value('EMAIL'), //mengambil data email dari input user
		  'PASSWORD' => set_value('PASSWORD'), //mengambil data password dari input user
		  'NAMA' => set_value('NAMA'), //mengambil data nama dari input user
		  'TGLLAHIR_USER' => set_value('TGLLAHIR_USER'), //mengambil data tanggal lahir dari input user
		  'ALAMAT' => set_value('ALAMAT'), //mengambil data alamat dari input user
		  'JK_USER' => set_value('JK_USER'), //mengambil data jenis kelamin dari input user
		  'STATUS' => set_value('STATUS')]; //mengambil data password dari input user

		 $where = array( //membuat array
		  'USERNAME' => $USERNAME //deklarasi id
	  );
   
	  $this->m_data->update_data($where,$data,'user');  //memanggil update_data pada model m_data
	  redirect('/admin/user/index'); //meneruskan ke direktori file admin/user/index


		  
	  }



	   
}
}