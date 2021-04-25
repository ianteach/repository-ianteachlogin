<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{
    // method construct untuk USER agar pengguna tidak bisa sembarang masukkan data melalui URL 
    public function __construct()
    {
        parent::__construct();
        // fungsi helper
        is_logged_in();

        $this->load->model('Datauser_model');
        $this->load->library('form_validation');
    }
    // batas Method Construct untuk USER

    public function index()
    {
        $data['title'] = 'My Web Pages';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/index', $data);
        $this->load->view('templates/footer');
    }

    public function indexmaterials()
    {
        $data['title'] = 'My Web Pages';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/indexmaterials', $data);
        $this->load->view('templates/footer');
    }

    public function materials1()
    {
        $data['title'] = 'My Web Pages';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/materials1', $data);
        $this->load->view('templates/footer');
    }

    public function materials2()
    {
        $data['title'] = 'My Web Pages';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/materials2', $data);
        $this->load->view('templates/footer');
    }

    public function materials3()
    {
        $data['title'] = 'My Web Pages';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/materials3', $data);
        $this->load->view('templates/footer');
    }

    public function materials4()
    {
        $data['title'] = 'My Web Pages';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/materials4', $data);
        $this->load->view('templates/footer');
    }

    public function indextutorial()
    {
        $data['title'] = 'My Web Pages';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/indextutorial', $data);
        $this->load->view('templates/footer');
    }

    public function classroom()
    {
        $data['title'] = 'Classroom';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/classroom', $data);
        $this->load->view('templates/footer');
    }

    public function absen()
    {
        $data['title'] = 'Attandance List (Absen)';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['absen_user'] = $this->db->get('absen_user')->result_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('noidentitas', 'Nomer Identitas', 'required|numeric');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('notelpon', 'No Telp', 'required|numeric');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('info/absen', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Datauser_model->tambahDataAbsensi();
            // untuk tombol FLASH NOTICE 
            $this->session->set_flashdata('flash', 'Terkirim.');

            redirect('info/absen');
        }
    }

    public function pelajaranpertama()
    {
        $data['title'] = 'Step 1 (PC Router,SSH SSL, dan NTP Server)';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/pelajaranpertama', $data);
        $this->load->view('templates/footer');
    }

    public function pelajarankedua()
    {
        $data['title'] = 'Step 2 (DHCP Server, FTP Server, dan File Server)';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/pelajarankedua', $data);
        $this->load->view('templates/footer');
    }

    public function pelajaranketiga()
    {
        $data['title'] = 'Step 3 (Web Server, DNS Server, Database Server)';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/pelajaranketiga', $data);
        $this->load->view('templates/footer');
    }

    public function pelajarankeempat()
    {
        $data['title'] = 'Step 4 (Mail Server dan Proxy)';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('info/pelajarankeempat', $data);
        $this->load->view('templates/footer');
    }
}
