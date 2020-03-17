<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model
{

    function is_logged_in()     //fungsi cek session logged in
    {
        return $this->session->userdata('USERNAME'); //menampilkan session login
    }


    function is_role()     //fungsi cek level
    {
        return $this->session->userdata('STATUS'); //mengambil data status
    }

    function check_login($table, $field1, $field2) //fungsi cek login
    {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($field1);
        $this->db->where($field2);
        $this->db->limit(1);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return FALSE;
        } else {
            return $query->result();
        }
    }

    public function Daftar() //fungsi untuk mendaftar
    {
      date_default_timezone_set('ASIA/JAKARTA');
      $data = array(
        'USERNAME' => $this->input->post('USERNAME'), //menyimpan username dalam array
        'EMAIL' => $this->input->post('EMAIL'), //menyimpan email dalam array
        'NAMA' => $this->input->post('NAMA'), //menyimpan nama dalam array
        'STATUS' => $this->input->post('STATUS'), //menyimpan status dalam array
         'ALAMAT' => $this->input->post('ALAMAT'), //menyimpan alamat dalam array
        'JK_USER' => $this->input->post('JK_USER'), //menyimpan jenis kelamin dalam array
        'TGLLAHIR_USER' => $this->input->post('TGLLAHIR_USER'), //menyimpan tanggal lahir dalam array
        'PASSWORD' => md5($this->input->post('PASSWORD')) //menyimpan password dalam array
      );
      return $this->db->insert('user', $data); //insert ke tabel user
    }
    
}