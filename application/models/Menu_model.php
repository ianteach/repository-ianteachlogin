<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu_model extends CI_Model
{
    public function getSubMenu()
    {
        $query = "SELECT `user_sub_menu`.*, `user_menu`.`menu`
              FROM `user_sub_menu` JOIN `user_menu`
              ON `user_sub_menu`.`menu_id` = `user_menu`.`id`
       
            ";
        return $this->db->query($query)->result_array();
    }


    public function hapusDataMenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('menu');
    }

    public function getAllSubmenu()
    {
        // cara memanggil data dari menggunakan forward chaining(berantai) dengan menggunkan CI
        return $this->db->get('user_sub_menu')->result_array();
    }

    // method untuk menampilkan DETAIL SUB MENU
    public function getSubmenuById($id)
    {
        return $this->db->get_where('user_sub_menu', ['id' => $id])->row_array();
    }


    // method untuk menampilkan UBAH DATA SUBMENU
    public function ubahDataSubmenu()
    {
        $data = [
            "title" => $this->input->post('title', true),
            "menu_id" => $this->input->post('menu_id', true),
            "url" => $this->input->post('url', true),
            "icon" => $this->input->post('icon', true),
            "is_active" => $this->input->post('is_active', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_sub_menu', $data);
    }


    public function hapusDataSubmenu($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_sub_menu');
    }


    // method untuk menampilkan DETAIL MENU
    public function getMenuById($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }

    // method untuk menampilkan UBAH DATA MENU
    public function ubahDataMenu()
    {
        $data = [
            "menu" => $this->input->post('menu', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user_menu', $data);
    }

    // method untuk menampilkan notice HAPUS MENU
    public function dataMenuHapus($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user_menu');
    }
}
