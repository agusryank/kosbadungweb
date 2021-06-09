<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');


        if ($this->form_validation->run() == false) {

            $data['tittle'] = 'Badung Kos login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            // Jika Validasi Success

            $this->_login();
        }
    }

    private function _login()
    {

        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $admin = $this->db->get_where('admin', ['Username' => $username])->row_array();


        //Jika adminnya ada
        if ($admin) {
            /**  Untuk if dibawah,fungsi password_verify akan melakukan hash pada input 
             *   $password(variable pertama) dan akan mencoba mengecek data di database.
             *   Dengan begitu bisa diasumsikan bahwa if dibawah sama dengan 
             *   if(password_hash($password,PASSWORD_DEFAULT),password_hash($admin['Password'], PASSWORD_DEFAULT))
             */
            if (password_verify($password, password_hash($admin['Password'], PASSWORD_DEFAULT))) {

                $data = [
                    'Username' => $admin['Username'],
                    'Nama' => $admin['Nama'],
                    'Role_id' => $admin['Role_id']
                ];

                $this->session->set_userdata($data);
                if ($admin['Role_id'] == 1) {

                    redirect('superadmin');
                } else {

                    redirect('adminkos');
                }
            } else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Password Salah ! </div>');
                redirect('auth');
            }
        } else {

            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Akun anda belum terdaftar ! </div>');
            redirect('auth');
        }
    }


    public function registration()
    {

        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('username', 'Username', 'required|trim|is_unique[admin.Username]', [
            'is_unique' => 'Username sudah terpakai'
        ]);
        $this->form_validation->set_rules('notelp', 'Notelp', 'required|trim');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim');
        $this->form_validation->set_rules('gender', 'Gender', 'required|trim');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'min_length' => 'Password terlalu pendek!'
        ]);
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['tittle'] = 'Badung Kos Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/registration');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'Nama' => htmlspecialchars($this->input->post('name', true)),
                'Alamat' => htmlspecialchars($this->input->post('alamat', true)),
                'No_telp' => htmlspecialchars($this->input->post('notelp', true)),
                'Jenis_kelamin' => htmlspecialchars($this->input->post('gender', true)),
                'Username' => htmlspecialchars($this->input->post('username', true)),
                'Password' => password_hash(
                    $this->input->post('password1'),
                    PASSWORD_DEFAULT
                ),
                'Role_id' => 2
            ];

            $this->db->insert('admin', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Selamat, Akun anda telah berhasil dibuat ! </div>');
            redirect('auth');
        }
    }

    public function logout()
    {

        $this->session->unset_userdata('Username');
        $this->session->unset_userdata('Role_id');

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Kamu berhasil Logout ! </div>');
        redirect('auth');
    }

    public function blocked()
    {

        $this->load->view('auth/block');
    }
}
