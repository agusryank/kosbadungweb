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

    public function edit_kos($id)
    {
        $data['tittle'] = 'Data Kos';
        $data['admin'] = $this->db->get_where('admin', ['Username' => $this->session->userdata('Username')])->row_array();
        $data['data_kos'] = $this->mymodel->GetDatakosid($id);
        $this->load->view('templates/header',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('adminkos/editkos', $data);
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
        $this->mymodel->proses_edit_datakos();
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

    public function Tambah_data_kamarkos()
    {
        $this->mymodel->tambah_kamarkos();
        // $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
        // Data kamar kos berhasil ditambahkan. ! </div>');
        redirect('adminkos/datakamarkos');
    }

    public function datakamarkos()
    {
        $data['tittle'] = 'Data Kamar Kos';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['datakamarkos'] = $this->mymodel->GettDatakamarkosadmin();

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

    public function Edit_data_kamarkos()
    {

        //config data untuk upload
        $config['upload_path']          = 'androidAPI/Image/FotoKamarKos/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //ganti nama file
        $name = basename($_FILES["userfile"]["name"]);
        $new_name = time() . "-" . rand(10, 99) . "-" . $name;
        $config['file_name'] = $new_name;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);


        if (!$this->upload->do_upload()) {
            $data = array(
                'Namakamar' => $this->input->post('namakamar'),
                'id_kos' => $this->input->post('id_kos'),
                'Namakos' => $this->input->post('namakos'),
                'id_pemilik' => $this->input->post('id_pemilik'),
                'Namapemilik' => $this->input->post('namapemilik'),
                'Fasilitaskamar' => $this->input->post('fasilitas'),
                'Jumlahkamar' => $this->input->post('jmlkamar'),
                'Hargakamar' => $this->input->post('harga'),
                'Aktif' => $this->input->post('aktif'),
            );

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('kamarkos', $data);
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
            Data Kamar Kos Berhasil Dirubah! </div>');
            redirect('adminkos/datakamarkos');
        } else {
            //delete data lama
            $target_unlink = $config["upload_path"] . $this->input->post('old_userfile');
            unlink($target_unlink);

            //ambil nama file yang di upload
            $upload_data = $this->upload->data();
            $file_name = $upload_data['file_name'];

            $data = array(
                'Namakamar' => $this->input->post('namakamar'),
                'id_kos' => $this->input->post('id_kos'),
                'Namakos' => $this->input->post('namakos'),
                'id_pemilik' => $this->input->post('id_pemilik'),
                'Namapemilik' => $this->input->post('namapemilik'),
                'Fasilitaskamar' => $this->input->post('fasilitas'),
                'Jumlahkamar' => $this->input->post('jmlkamar'),
                'Hargakamar' => $this->input->post('harga'),
                'Foto' => $file_name,
                'Aktif' => $this->input->post('aktif'),
            );
            $this->db->where('id', $this->input->post('id'));
            $this->db->update('kamarkos', $data);
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
            Data Kamar Kos Berhasil Dirubah! </div>');
            redirect('adminkos/datakamarkos');
        }
    }


    function hapus_data_kamarkos($id)
    {
        $data = $this->mymodel->Datakamarkosid($id)->row();
        $nama1 = 'androidAPI/Image/FotoKamarKos/' . $data->Foto;

        if (
            is_readable($nama1) && unlink($nama1)
        ) {
            $this->mymodel->hapus_data_kamar($id);
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
            Data Kamar Kos berhasil dihapus </div>');
            redirect('adminkos/datakamarkos');
        } else {
            $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
            Data Kamar Kos gagal dihapus </div>');
            redirect('adminkos/datakamarkos');
        }
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
