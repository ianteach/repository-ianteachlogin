<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{

    // method construct untuk MENU agar pengguna tidak bisa sembarang masukkan data melalui URL 
    public function __construct()
    {
        parent::__construct();
        // fungsi helper
        is_logged_in();
        $this->load->model('Menu_model');
        $this->load->library('form_validation');
    }
    // batas Method Construct untuk MENU


    public function index()
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        // function menu modal
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New menu added!
                    </div>');
            redirect('menu');
        }
    }


    // function submenu
    public function submenu()
    {
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('is_active', 'Active', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')

            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!
                    </div>');
            redirect('menu/submenu');
        }
    }


    public function hapus($id)
    {
        $this->Menu_model->hapusDataMenu($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('menu');
    }

    // method untuk membuat tombol UBAH SUB MENU DATA
    public function ubahsubmenu($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['user_sub_menu'] = $this->db->get('user_sub_menu')->result_array();

        $data['title'] = 'Form Ubah Data Submenu';
        $data['user_sub_menu'] = $this->Menu_model->getSubmenuById($id);

        $data['menu_id'] = ['1', '2', '3', '4'];

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');
        $this->form_validation->set_rules('is_active', 'Active', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubahsubmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->ubahDataSubmenu();
            // untuk tombol flash notice 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New sub menu added!
                    </div>');
            redirect('menu/submenu');
        }
    }

    // method untuk membuat fungsi tombol HAPUS SUB MENU
    public function submenuhapus($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['user_sub_menu'] = $this->db->get('user_sub_menu')->result_array();

        $this->Menu_model->hapusDataSubmenu($id);
        // untuk tombol flash notice 
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Sub menu has been deleted!
         </div>');
        redirect('menu/submenu');
    }



    // method untuk membuat tombol UBAH SUB MENU DATA
    public function ubahmenu($id)
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $data['title'] = 'Form Ubah Data Menu';
        $data['user_menu'] = $this->Menu_model->getMenuById($id);


        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/ubahmenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Menu_model->ubahDataMenu();
            // untuk tombol flash notice 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu has been updated!
                        </div>');
            redirect('menu');
        }
    }

    // method untuk membuat fungsi tombol HAPUS SUB MENU
    public function menuhapus($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['user_menu'] = $this->db->get('user_menu')->result_array();

        $this->Menu_model->dataMenuHapus($id);
        // untuk tombol flash notice 
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu has been deleted!
          </div>');
        redirect('menu');
    }
}
