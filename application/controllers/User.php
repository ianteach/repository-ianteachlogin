<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
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
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('templates/footer');
    }


    public function edit()
    {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('name', 'Full Name', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $name = $this->input->post('name');
            $email = $this->input->post('email');

            // Cek jika ada gambar yang di upload
            $upload_image = $_FILES['image'];

            if ($upload_image) {
                $config['allowed_types'] = 'gif|jpg|jpeg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile/';

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }

                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }
            // batas akhir Cek jika ada gambar yang di upload

            $this->db->set('name', $name);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Your profile has been updated!
            </div>');
            redirect('user');
        }
    }


    public function changePassword()
    {
        $data['title'] = 'Change Password';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // change password
        $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
        $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|min_length[6]|matches[new_password2]');
        $this->form_validation->set_rules('new_password2', 'Confirm New Password', 'required|trim|min_length[6]|matches[new_password1]');

        // ketika method password yang di edit error
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('user/changepassword', $data);
            $this->load->view('templates/footer');
        } else {
            // ketika method password yang di input SALAH
            $current_password = $this->input->post('current_password');
            $new_password = $this->input->post('new_password1');
            if (!password_verify($current_password, $data['user']['password'])) {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Wrong current password!
                </div>');
                redirect('user/changepassword');
            } else {
                // ketika method password yang di input TIDAK SAMA
                if ($current_password == $new_password) {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">New password cannot be the same as current password!
                    </div>');
                    redirect('user/changepassword');
                } else {
                    // ketika password yang di input sudah BENAR DAN BERHASIL
                    $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $this->session->userdata('email'));
                    $this->db->update('user');

                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password change!
                    </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }


    // method index untuk daftar MAHASISWA
    public function inputdatauser()
    {
        $data['title'] = 'Daftar Data User';
        $data['datauser'] = $this->Datauser_model->getAllDatauser();

        // function pengkondisian untuk form pencarian di index.php
        // if ($this->input->post('keyword')) {
        //     $data['mahasiswa'] = $this->Mahasiswa_model->cariDataMahasiswa();
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
        $this->load->view('user/datauser/inputdatauser', $data);
        $this->load->view('templates/footer');
    }

    // method untuk membuat tombol TAMBAH data
    public function tambahdatauser()
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
            $this->load->view('user/datauser/tambahdatauser');
            $this->load->view('templates/footer');
        } else {
            $this->Datauser_model->tambahDataUser();
            // untuk tombol FLASH NOTICE 
            $this->session->set_flashdata('flash', 'Ditambahkan');

            redirect('user/inputdatauser');
        }
    }


    // method untuk membuat tombol UBAH data
    public function ubahdatauser($id)
    {
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $data['datauser'] = $this->db->get('datauser')->result_array();


        $data['title'] = 'Form Ubah Data User';
        $data['datauser'] = $this->Datauser_model->getDatauserById($id);
        $data['status'] = ['Pelajar', 'Mahasiswa', 'Umum'];
        $data['jeniskelamin'] = ['Laki-Laki', 'Perempuan'];

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('noidentitas', 'No Identitas (KTP/NIS/NPM)', 'required|numeric');
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
            $this->load->view('user/datauser/ubahdatauser', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Datauser_model->ubahDataUser();
            // untuk tombol flash notice 
            $this->session->set_flashdata('flash', 'Diubah');
            redirect('user/inputdatauser');
        }
    }
}
