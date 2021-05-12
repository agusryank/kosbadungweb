<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Adminkos extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        is_logged_in();
        $this->load->library('form_validation');
    }




    // Controller Untuk  halaman Index

    public function index()
    {
        $data['tittle'] = 'Dashboard';
        $data['admin'] = $this->db->get_where('admin', ['Username' => $this->session->userdata('Username')])->row_array();

        $data['total_kos'] = $this->mymodel->hitungJumlahKosAdmin();
        $data['total_user'] = $this->mymodel->hitungJumlahuser();
        $data['total_transaksi'] = $this->mymodel->hitungJumlahTransaksiAdmin();


        $this->load->view('templates/header',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminkos/index', $data);
        $this->load->view('templates/footer');
    }





    // Controller Untuk  halaman data kos

    public function tambahkos()
    {
        $data['tittle'] = 'Data Kos';
        $data['admin'] = $this->db->get_where('admin', ['Username' => $this->session->userdata('Username')])->row_array();

        $this->load->view('templates/header',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminkos/tambahkos', $data);
        $this->load->view('templates/footer');
    }


    public function tambahkamarkos()
    {
        $data['tittle'] = 'Data Kamar Kos';
        $data['admin'] = $this->db->get_where('admin', ['Username' => $this->session->userdata('Username')])->row_array();

        $id = $this->uri->segment(3);
        $data['kosid'] = $this->mymodel->GetDatakosid($id);

        $this->load->view('templates/header',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminkos/tambahkamarkos', $data);
        $this->load->view('templates/footer');
    }

    // public function proses_tambah_data()
    // {

    //     $config['upload_path']          = 'androidAPI/Image/FotoKos/';
    //     $config['allowed_types']        = 'gif|jpg|png';
    //     $config['max_size']             = 10000;
    //     $config['max_width']            = 10000;
    //     $config['max_height']           = 10000;

    //     $this->load->library('upload', $config);


    //     if (!$this->upload->do_upload('userfile')) {
    //         echo "Gagal Tambah";
    //     } else {

    //         $foto1 = $this->upload->data();
    //         $foto1 = $foto1['file_name'];
    //         $Namakos = $this->input->post('namakos', true);
    //         $Namapemilik = $this->input->post('namapemilik', true);
    //         $Latitude = $this->input->post('lat', true);
    //         $Longtitude = $this->input->post('long', true);
    //         $Jumlahkamar = $this->input->post('jmlkamar', true);
    //         $Harga = $this->input->post('harga', true);
    //         $Deskripsi = $this->input->post('deskripsi', true);
    //         $Kecamatan = $this->input->post('kecamatan', true);
    //         $Aktif = 1;
    //         $Status = ('Pending');

    //         $data = array(
    //             'Namakos' => $Namakos,
    //             'Namapemilik' => $Namapemilik,
    //             'Latitude' => $Latitude,
    //             'Longtitude' => $Longtitude,
    //             'Jumlahkamar' => $Jumlahkamar,
    //             'Harga' => $Harga,
    //             'Deskripsi' => $Deskripsi,
    //             'Kecamatan' => $Kecamatan,
    //             'Aktif' => $Aktif,
    //             'Status' => $Status,
    //         );
    //         $this->db->insert('kos', $data);
    //         $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
    //         Data kos berhasil ditambahkan, Mohon menunggu data untuk diverivikasi. ! </div>');
    //         redirect('adminkos/datakos');
    //     }
    // }

    public function proses_tambah_kos()
    {

        $this->mymodel->tambahkos();
        $this->session->set_flashdata('Pesan', '<div  class="alert alert-success" role="alert">
        Data kos berhasil ditambahkan, Mohon menunggu data untuk diverivikasi. ! </div>');
        redirect('adminkos/datakos');
    }


    public function hapus_datakos($id)
    {

        $data = $this->mymodel->datahapusid($id)->row();
        $nama1 = 'androidAPI/Image/FotoKos/' . $data->foto1;
        $nama2 = 'androidAPI/Image/FotoKos/' . $data->foto2;
        $nama3 = 'androidAPI/Image/FotoKos/' . $data->foto3;
        $nama4 = 'androidAPI/Image/FotoKos/' . $data->foto4;

        if (
            is_readable($nama1)  && unlink($nama1) && is_readable($nama2)  && unlink($nama2) && is_readable($nama3)  && unlink($nama3) && is_readable($nama4)  && unlink($nama4)
        ) {
            $this->mymodel->hapus_data_kos($id);
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
            Data kos berhasil dihapus </div>');
            redirect('adminkos/datakos');
        } else {
            $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
            Data kos gagal dihapus </div>');
            redirect('adminkos/datakos');
        }
    }


    public function edit_datakos($id)
    {
        $this->mymodel->proses_edit_datakos($id);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
        Data Telah Berhasil Diedit!
      </div>');
        redirect('adminkos/datakos');
    }

    public function datakos()
    {
        $data['tittle'] = 'Data Kos';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['datakos'] = $this->mymodel->GettAlldatakos();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminkos/datakos', $data);
        $this->load->view('templates/footer');
    }

    public function datakosid()
    {
        $data['tittle'] = 'Data kos';
        $id = $this->uri->segment(3);
        $data['kosid'] = $this->mymodel->GetDatakosid($id);
        $this->load->view('templates/header',  $data);
        $this->load->view('adminkos/fotokos', $data);
    }












    // Controller Untuk  halaman Data kamar kos

    public function proses_tambah_kamarkos()
    {
        $this->mymodel->tambah_kamarkos();
        $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
        Data kos berhasil ditambahkan, Mohon menunggu data untuk diverivikasi. ! </div>');
        redirect('adminkos/datakamarkos');
    }

    public function datakamarkos()
    {
        $data['tittle'] = 'Data Kamar Kos';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['datakamarkos'] = $this->mymodel->GettAllDatakamarkos();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminkos/datakamarkos', $data);
        $this->load->view('templates/footer');
    }

    public function editkos()
    {
        $data['tittle'] = 'Data Kos';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['datakamarkos'] = $this->mymodel->GettAllDatakamarkos();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminkos/editkos', $data);
        $this->load->view('templates/footer');
    }

    public function Tambah_data_kamarkos()
    {


        // $target_dir = "androidAPI/Image/FotoKamarKos/";
        // $target_file = $target_dir . basename($_FILES["userfile"]["name"]);
        // move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file);

        // $data = array(
        //     'Namakamar' => $this->input->post('namakamar'),
        //     'id_kos' => $this->input->post('id_kos'),
        //     'Namakos' => $this->input->post('namakos'),
        //     'id_pemilik' => $this->input->post('id_pemilik'),
        //     'Namapemilik' => $this->input->post('namapemilik'),
        //     'Fasilitaskamar' => $this->input->post('fasilitas'),
        //     'Jumlahkamar' => $this->input->post('jmlkamar'),
        //     'Hargakamar' => $this->input->post('harga'),
        //     'Foto' => $_FILES['userfile']['name'],
        //     'Aktif' => 1,
        // );
        // $this->db->insert('kamarkos', $data);
        // $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
        //     Data Kamar Kos Berhasil Ditambahkan ! </div>');
        // redirect('adminkos/datakamarkos');
    }


    // Controller Untuk  halaman transaksi

    public function datatransaksi()
    {
        $data['tittle'] = 'Data Transaksi ';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['datatransaksi'] = $this->mymodel->GettAllDataTransaksi();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminkos/datatransaksi', $data);
        $this->load->view('templates/footer');
    }
}
