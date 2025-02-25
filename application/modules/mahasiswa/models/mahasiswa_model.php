<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class Mahasiswa_model extends CI_Model
{

    function get_all_mahasiswa()
    {
        $query = $this->db->get('mahasiswa');
        return $query->result();
    }

    function tambah_mahasiswa($data)
    {
        return $this->db->insert('mahasiswa', $data);
    }
}
