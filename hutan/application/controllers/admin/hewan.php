<?php 
	 

class Hewan extends CI_Controller{ //class turunan CI_contoller
 
	function __construct(){  //fungsi construct
		parent::__construct();		 //construct pada parent
		$this->load->model('m_data'); //memanggil model bernama "m_data"
		$this->load->helper('url'); //memanggil helper url
		$this->load->helper('form'); //memanggil helper url
		$this->load->library('upload'); //memanggil library upload
	}
  
	public function index(){ //fungsi untuk halaman
		$this->load->view('v_header'); //untuk menampilkan header
		$this->load->view('v_sidebar'); //untuk menampilkan header
		$this->load->database(); //untuk mengambil database
		$jumlah_data = $this->m_data->jumlah_data1(); //memanggil model
		$this->load->library('pagination'); //memanggil library pagination
		$config['base_url'] = base_url().'index.php/hewan/index/'; //mengatur base url
		$config['total_rows'] = $jumlah_data; //menghitung baris
		$config['per_page'] = 10; //mengatur jumlah data perhalaman
		$from = $this->uri->segment(3); //mengatur uri segment
		$this->pagination->initialize($config);		//inisialisasi halaman
		$data['hewan'] = $this->m_data->data1($config['per_page'],$from); //membuat halaman
		$this->load->view('admin/v_hewan',$data); //memanggil view bernama v_tampil
		
	}

    function tambah(){ //fungsi untuk input data
		$this->load->view('v_header'); //memanggil header login
		$this->load->view('v_sidebar'); //memanggil sidebar
		$this->load->view('admin/v_tambah1'); //memanggil view bernama "v_input"
		
    }
    
	function tambah_aksi(){ //fungsi untuk input data dalam database
		
		$config = [ //konfigurasi upload
			'upload_path' => './upload/hewan/', //direktori upload
			'allowed_types' => 'gif|jpg|png', //ekstensi gambar
			'max_size' => 2000, 'max_width' => 2000, //ukuran dan lebar gambar
			'max_height' => 2000 //tinggi gambar
		  ];
		  $this->load->library('upload'); //memanggil library upload
		  $this->upload->initialize($config); //memanggil config yang sudah di buat sebelumnya

		  if ( ! $this->upload->do_upload('GAMBAR')){ //fungsi upload gambar
			$error = array('error' => $this->upload->display_errors()); //jika terjadi error, maka...
			$this->load->view('v_upload', $error); //tampilkan v_upload
		}else{
			$file = $this->upload->data(); //mengambil data file yang diupload
			$data = ['GAMBAR' => $file['file_name'], //memasukkan nama file ke field gambar.
           'NAMA_HEWAN' => set_value('NAMA_HEWAN'), //mengambil data hewan dari input user
           'JENIS' => set_value('JENIS'), //mengambil data jenis dari input user
		   'DESKRIPSI' => set_value('DESKRIPSI'), //memanggil data deskripsi dari input user
		   'JUMLAH_JANTAN' => set_value('JUMLAH_JANTAN'), //memanggil data jumlah jantan dari input user
		   'JUMLAH_BETINA' => set_value('JUMLAH_BETINA')]; //memanggil data jumlah betina dari input user

		$this->m_data->input_data($data,'hewan'); //memanggil input_data pada model m_data
		redirect('admin/hewan/index'); //meneruskan input data ke link direktori file "admin/hewan/index"
	}
}

    function hapus($KD_HEWAN){ //fungsi untuk hapus data
		$where = array('KD_HEWAN' => $KD_HEWAN); //deklarasi id
		$this->m_data->hapus_data($where,'hewan');  //memanggil hapus_data pada model m_data
		redirect('admin/hewan/index'); //meneruskan ke direktori file "crud/index"
    }
    
    function edit($KD_HEWAN){ //fungsi untuk edit data
		$this->load->view('v_header'); //menampilkan header
		$this->load->view('v_sidebar'); //memanggil sidebar
		$where = array('KD_HEWAN' => $KD_HEWAN); //membuat array id
		$data['hewan'] = $this->m_data->edit_data($where,'hewan')->result();  //memanggil edit_data pada model m_data
		$this->load->view('admin/v_edit1',$data); //menampilkan form edit data
		
    }
    
	function update(){ //fungsi untuk edit data dalam database
		  if (!empty($_FILES["GAMBAR"]["name"])) { //jika gambar diinputkan oleh user, maka...
			$KD_HEWAN = $this->input->post('KD_HEWAN'); //memanggil kode hewan
		$config = [ //membuat konfigurasi upload
			'upload_path' => './upload/hewan/', //direktori upload
			'allowed_types' => 'gif|jpg|png', //ekstensi file upload
			'max_size' => 2000, 'max_width' => 2000, //maksimal ukuran dan lebar gambar
			'max_height' => 2000 //maksimal tinggi gambar
		  ];
		  $this->load->library('upload'); //memanggil library upload
		  $this->upload->initialize($config); //memanggil konfigurasi

		  if ( ! $this->upload->do_upload('GAMBAR')){ //fungsi upload gambar
			$error = array('error' => $this->upload->display_errors()); //menampilkan error
			$this->load->view('v_upload', $error); //meneruskannya ke v_upload
		}else{
			$file = $this->upload->data(); //menagmbil data dari file upload
			$data = ['GAMBAR' => $file['file_name'], //menginput data nama file ke dalam gambar
           'NAMA_HEWAN' => set_value('NAMA_HEWAN'), //memaggil nama hewan dari inputan user
           'JENIS' => set_value('JENIS'), //memanggil data jenis dari inputan user
		   'DESKRIPSI' => set_value('DESKRIPSI'), //memanggil data deskripsi dari inputan user
		   'JUMLAH_JANTAN' => set_value('JUMLAH_JANTAN'), //memanggil data jumlah jantan dari inputan user
		   'JUMLAH_BETINA' => set_value('JUMLAH_BETINA')]; //memanggil data jumlah betina dari inputan user
        $where = array( //membuat array 
            'KD_HEWAN' => $KD_HEWAN //deklarasi id
        );
        $this->m_data->update_data($where,$data,'hewan');  //memanggil update_data pada model m_data
        redirect('/admin/hewan/index'); //meneruskan ke direktori file crud/index
    }

		} else { //jika gambar tidak diinputkan oleh user, maka...
			$KD_HEWAN = $this->input->post('KD_HEWAN'); //memanggil kode hewan
			$GAMBAR= $this->input->post('old_GAMBAR'); //memanggil data gambar yang lama
			$data = ['GAMBAR' => $GAMBAR, //menginputkan kembali data gambar yang lama
           'NAMA_HEWAN' => set_value('NAMA_HEWAN'), //memaggil nama hewan dari inputan user
           'JENIS' => set_value('JENIS'), //memanggil data jenis dari inputan user
		   'DESKRIPSI' => set_value('DESKRIPSI'), //memanggil data deskripsi dari inputan user
		   'JUMLAH_JANTAN' => set_value('JUMLAH_JANTAN'), //memanggil data jumlah jantan dari inputan user
		   'JUMLAH_BETINA' => set_value('JUMLAH_BETINA')]; //memanggil data jumlah betina dari inputan user
 
		   $where = array( //membuat array
            'KD_HEWAN' => $KD_HEWAN //deklarasi id
        );
     
        $this->m_data->update_data($where,$data,'hewan');  //memanggil update_data pada model m_data
        redirect('/admin/hewan/index'); //meneruskan ke direktori file crud/index


			
		}



		 
}
}