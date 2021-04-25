<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // method construct untuk ADMIN agar pengguna tidak bisa sembarang masukkan data melalui URL 
    public function __construct()
    {
        parent::__construct();
        // fungsi helper
        is_logged_in();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }
    // batas Method Construct untuk ADMIN

    // method index untuk ADMIN
    public function index()
    {
        $data['title'] = 'Welcome to My Website';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    // method role untuk ADMIN
    public function role()
    {
        $data['title'] = 'Role';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        // function menu modal
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_role', ['role' => $this->input->post('role')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New role added!
                    </div>');
            redirect('admin/role');
        }
    }


    // method roleAccess untuk ADMIN
    public function roleAccess($role_id)
    {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('user_role', ['id' => $role_id])->row_array();

        // function agar admin TIDAK DITAMPILKAN di Role Menu
        $this->db->where('id !=', 1);

        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/roleaccess', $data);
        $this->load->view('templates/footer');
    }


    public function changeAccess()
    {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('user_access_menu', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('user_access_menu', $data);
        } else {
            $this->db->delete('user_access_menu', $data);
        }

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Access Changed!
        </div>');
    }

    // method index untuk daftar MAHASISWA
    public function mahasiswa()
    {
        $data['title'] = 'Daftar Mahasiswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['mahasiswa'] = $this->db->get('mahasiswa')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/mahasiswa', $data);
        $this->load->view('templates/footer');
    }


    // method untuk membuat tombol ROLE
    public function roleubah($id)
    {

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('user_role')->result_array();

        $data['title'] = 'Form Ubah Data Role';
        $data['user_role'] = $this->Admin_model->getRoleById($id);


        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('admin/roleubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Admin_model->ubahDataRole();
            // untuk tombol flash notice 
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Role has been updated!
                         </div>');
            redirect('admin/role');
        }
    }

    // method untuk membuat fungsi tombol HAPUS ROLE ADMIN
    public function rolehapus($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['user_role'] = $this->db->get('user_role')->result_array();

        $this->Admin_model->dataRoleHapus($id);
        // untuk tombol flash notice 
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Role has been deleted!
          </div>');
        redirect('admin/role');
    }

    public function teachers_room()
    {
        $data['title'] = 'Teacher Room';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/teachers_room', $data);
        $this->load->view('templates/footer');
    }

    public function kelaspertama()
    {
        $data['title'] = 'Teacher Room';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelaspertama', $data);
        $this->load->view('templates/footer');
    }

    public function kelaskedua()
    {
        $data['title'] = 'Teacher Room';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelaskedua', $data);
        $this->load->view('templates/footer');
    }

    public function kelasketiga()
    {
        $data['title'] = 'Teacher Room';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelasketiga', $data);
        $this->load->view('templates/footer');
    }

    public function kelaskeempat()
    {
        $data['title'] = 'Teacher Room';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/kelaskeempat', $data);
        $this->load->view('templates/footer');
    }
}


