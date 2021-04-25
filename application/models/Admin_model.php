<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{
    // method untuk menampilkan DETAIL ADMIN ROLE
    public function getRoleById($id)
    {
        return $this->db->get_where('user_role', ['id' => $id])->row_array();
    }

    // method untuk menampilkan UBAH DATA ADMIN ROLE
    public function ubahDataRole()
    {
        $data = [
            "role" => $this->input->post('role', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_role', $data);
    }

    // method untuk menampilkan notice HAPUS ADMIN ROLE
    public function dataRoleHapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_role');
    }
}
