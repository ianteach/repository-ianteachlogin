<?php

class Datauser extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Datauser_model');
        $this->load->library('form_validation');
     
    }


    // method index untuk daftar datauser
    public function index()
    {
        $data['title'] = 'User List (Daftar User)';
        $data['datauser'] = $this->Datauser_model->getAllDatauser();
        // function pengkondisian untuk form pencarian di index.php
        // if ($this->input->post('keyword')) {
        //     $data['datauser'] = $this->datauser_model->cariDatadatauser();
        // }

        if ($this->input->post('keyword')) {
            $data['datauser'] = $this->Datauser_model->cariDataUser();
        }

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->get('datauser')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('datauser/index', $data);
        $this->load->view('templates/footer');
    }

    // method untuk membuat tombol TAMBAH data
    public function tambah()
    {
        $data['title'] = 'Form Tambah Data User';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->get('datauser')->result_array();
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('noidentitas', 'No Identitas(KTP/NIS/NPM)', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('namasekolah', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('namakuliah', 'Nama Kuliah', 'required');
        $this->form_validation->set_rules('namapekerjaan', 'Nama Pekerjaan', 'required');
        $this->form_validation->set_rules('notelpon', 'No Telfon', 'required|numeric');
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datauser/tambah');
            $this->load->view('templates/footer');
        } else {
            $this->Datauser_model->tambahDataUser();
            // untuk tombol FLASH NOTICE 
            $this->session->set_flashdata('flash', 'Ditambahkan');

            redirect('datauser');
        }
    }

    // method untuk membuat fungsi tombol HAPUS
    public function hapus($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->get('datauser')->result_array();

        $this->Datauser_model->hapusDataUser($id);
        $this->session->set_flashdata('flash', 'Dihapus');
        redirect('datauser');
    }

    // Method untuk menampilkan DETAIL 
    public function detail($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->get('datauser')->result_array();


        $data['title'] = 'Detail Data User';
        $data['datauser'] = $this->Datauser_model->getDatauserById($id);
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('datauser/detail');
        $this->load->view('templates/footer');
    }

    // method untuk membuat tombol UBAH data
    public function ubah($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->get('datauser')->result_array();

        $data['title'] = 'Form Ubah Data User';
        $data['datauser'] = $this->Datauser_model->getDatauserById($id);
        $data['status'] = ['Pelajar', 'Mahasiswa', 'Umum'];
        $data['jeniskelamin'] = ['Laki-Laki', 'Perempuan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('noidentitas', 'No Identitas(KTP/NIS/NPM)', 'required|numeric');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('namasekolah', 'Nama Sekolah', 'required');
        $this->form_validation->set_rules('namakuliah', 'Nama Kuliah', 'required');
        $this->form_validation->set_rules('namapekerjaan', 'Nama Pekerjaan', 'required');
        $this->form_validation->set_rules('notelpon', 'No Telfon', 'required|numeric');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('datauser/ubah', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Datauser_model->ubahDatauser();
            // untuk tombol flash notice 
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('datauser');
        }
    }

    // Function PRINT di Data Mahasiswa 
    public function print_datauser()
    {
        $data['title'] = 'Data Print User';
        $data['datauser'] = $this->Datauser_model->getAllDatauser();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->get('datauser')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('datauser/print_datauser', $data);
        $this->load->view('templates/footer');
    }

    // Function EKSPORT PDF di Data Mahasiswa 
    public function pdf()
    {

        $data['title'] = 'Data PDF User';
        $data['datauser'] = $this->Datauser_model->getAllDatauser();

        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // load library dompdf
        $this->load->library('dompdf_gen');
        $data['datauser'] = $this->db->get('datauser')->result_array();


        $this->load->view('datauser/laporan_pdf', $data);

        // method ukuran kertas yang akan tampil di eksport pdf
        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("laporan_datauser.pdf", array('Attachment' => 0));
    }
}
