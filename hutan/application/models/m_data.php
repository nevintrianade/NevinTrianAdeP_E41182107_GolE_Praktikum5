<?php 
 
class M_data extends CI_Model{ //class turunan CI_Model
	
    
    function input_data($data,$table){  //fungsi bernama input_data
		$this->db->insert($table,$data); //fungsi insert data pada tabel database
    }

    function hapus_data($where,$table){ //fungsi bernama hapus_data
        $this->db->where($where); //memanggil databse tertentu
        $this->db->delete($table); //fungsi hapus data pada tabel database
    }

	function edit_data($where,$table){		 //fungsi bernama edit_data
		return $this->db->get_where($table,$where); //fungsi edit data pada form
	}
 
	function update_data($where,$data,$table){ //fungsi bernama update_data
		$this->db->where($where);
		$this->db->update($table,$data); //fungsi edit data pada tabel database
    }	
    
    function data($number,$offset){ //fungsi bernama data
		return $query = $this->db->get('user',$number,$offset)->result();	//fungsi mencari jumlah data pada tabel user	
	}
	function data1($number,$offset){ //fungsi bernama data
		return $query = $this->db->get('hewan',$number,$offset)->result();	//fungsi mencari jumlah data pada tabel user	
	}
 
	function jumlah_data(){ //fungsi bernama jumlah data
		return $this->db->get('user')->num_rows(); //fungsi mencari jumlah data pada tabel user
	}
	function jumlah_data1(){ //fungsi bernama jumlah data
		return $this->db->get('hewan')->num_rows(); //fungsi mencari jumlah data pada tabel user
	}

	
	public function all(){ //digunakan untuk menghitung jumlah hewan pada home
		$hasil = $this->db->get('hewan'); //memanggil tabel hewan
		if($hasil->num_rows() > 0){ //menghitung jumlah baris pada tabel hewan
			return $hasil->result();
		} else {
			return array();
		}
	}

	public function hitungJumlahAsset() //digunakan untuk menghitung jumlah hewan pada dashboard
	{   
		$query = $this->db->get('hewan'); //memanggil tabel hewan
		if($query->num_rows()>0) //menghitung jumlah baris pada tabel hewan
		{
		  return $query->num_rows();
		}
		else
		{
		  return 0;
		}
	}

	public function hitungJumlahAsset1() //digunakan untuk menghitung jumlah user pada dashboard
	{   
		$query = $this->db->get('user'); //memanggil tabel user
		if($query->num_rows()>0) //menghitung jumlah baris pada tabel user
		{ 
		  return $query->num_rows();
		}
		else
		{
		  return 0;
		}
	}
}