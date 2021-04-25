<?php

class Datauser_model extends CI_model
{
    public function getAllDatauser()
    {
        // cara memanggil data dari menggunakan forward chaining(berantai) dengan menggunkan CI
        return $this->db->get('datauser')->result_array();
    }

    // method untuk TAMBAH DATA MAHASISWA
    public function tambahDataUser()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "jeniskelamin" => $this->input->post('jeniskelamin', true),
            "noidentitas" => $this->input->post('noidentitas', true),
            "alamat" => $this->input->post('alamat', true),
            "email" => $this->input->post('email', true),
            "status" => $this->input->post('status', true),
            "namasekolah" => $this->input->post('namasekolah', true),
            "namakuliah" => $this->input->post('namakuliah', true),
            "namapekerjaan" => $this->input->post('namapekerjaan', true),
            "notelpon" => $this->input->post('notelpon', true)
        ];
        $this->db->insert('datauser', $data);
    }

    // method untuk HAPUS DATA MAHASISWA
    public function hapusDataUser($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('datauser');
    }

    // method untuk menampilkan DETAIL
    public function getDatauserById($id)
    {
        return $this->db->get_where('datauser', ['id' => $id])->row_array();
    }


    // method untuk menampilkan UBAH DATA MAHASISWA
    public function ubahDataUser()
    {
        $data = [
            "nama"          => $this->input->post('nama', true),
            "jeniskelamin"  => $this->input->post('jeniskelamin', true),
            "noidentitas"   => $this->input->post('noidentitas', true),
            "alamat"        => $this->input->post('alamat', true),
            "email"         => $this->input->post('email', true),
            "status"        => $this->input->post('status', true),
            "namasekolah"   => $this->input->post('namasekolah', true),
            "namakuliah"    => $this->input->post('namakuliah', true),
            "namapekerjaan" => $this->input->post('namapekerjaan', true),
            "notelpon"      => $this->input->post('notelpon', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('datauser', $data);
    }

    // method function untuk CARI DATA MAHASISWA 
    public function cariDataUser()
    {
        // $keyword = $this->input->post('keyword', true);
        $keyword = $this->input->post('keyword', true);
        $this->db->like('nama', $keyword);
        $this->db->like('jeniskelamin', $keyword);
        $this->db->or_like('noidentitas', $keyword);
        $this->db->or_like('alamat', $keyword);
        $this->db->or_like('email', $keyword);
        $this->db->or_like('status', $keyword);
        $this->db->or_like('namasekolah', $keyword);
        $this->db->or_like('namakuliah', $keyword);
        $this->db->or_like('namapekerjaan', $keyword);
        $this->db->or_like('notelpon', $keyword);
        return $this->db->get('datauser')->result_array();
    }

    // method untuk TAMBAH DATA Absensi
    public function tambahDataAbsensi()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "noidentitas" => $this->input->post('noidentitas', true),
            "email" => $this->input->post('email', true),
            "status" => $this->input->post('status', true),
            "notelpon" => $this->input->post('notelpon', true)
        ];
        $this->db->insert('absen_user', $data);
    }
}
