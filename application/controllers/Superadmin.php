<?php
defined('BASEPATH') or exit('No direct script access allowed');

class superadmin extends CI_Controller
{
    public function __construct()
    {

        parent::__construct();
        is_logged_in();
    }





    //   Controller Untuk Dashboard
    public function index()
    {
        $data['tittle'] = 'Dashboard';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['total_kos'] = $this->mymodel->hitungJumlahKos();
        $data['total_admin'] = $this->mymodel->hitungJumlahadmin();
        $data['total_user'] = $this->mymodel->hitungJumlahuser();
        $data['total_transaksi'] = $this->mymodel->hitungJumlahtransaksi();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/index', $data);
        $this->load->view('templates/footer');
    }





    // Controller Untuk Halaman Data Pemilik
    public function datapemilik()
    {
        $data['tittle'] = 'Data Pemilik Kos';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();



        $data['adminkos'] = $this->mymodel->data_pemilik();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/datapemilik', $data);
        $this->load->view('templates/footer', $data);
    }


    public function proses_editdata($id)
    {

        $this->mymodel->proses_edit_data($id);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
        Data Telah Berhasil Diedit!
        </div>');
        redirect('superadmin/datapemilik');
    }


    public function hapus_datapemilik($id)
    {
        $this->mymodel->hapus_datapemilik($id);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
        Data Telah Berhasil Dihapus!
      </div>');
        redirect('superadmin/datapemilik');
    }







    // Controller Untuk Halaman Informasi Data kos
    public function datakos()
    {
        $data['tittle'] = 'Data Kos Belum Terverivikasi';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['kos1'] = $this->mymodel->Gettdatakos();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/datakos', $data);
        $this->load->view('templates/footer');
    }

    public function proses_verivikasidata($id)
    {

        $this->mymodel->proses_verivikasi_data($id);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
        Data Telah Berhasil diverivikasi.
      </div>');
        redirect('superadmin/datakos');
    }

    public function hapus_kos($id)
    {
        $data = $this->mymodel->datahapusid($id)->row();
        $nama1 = 'androidAPI/Image/FotoKos/' . $data->foto1;
        $nama2 = 'androidAPI/Image/FotoKos/' . $data->foto2;
        $nama3 = 'androidAPI/Image/FotoKos/' . $data->foto3;
        $nama4 = 'androidAPI/Image/FotoKos/' . $data->foto4;

        if (
            (is_readable($nama1) && is_readable($nama2) && is_readable($nama3) && is_readable($nama4)  && unlink($nama1) && unlink($nama2) && unlink($nama3) && unlink($nama4))
        ) {
            $this->mymodel->hapus_kos($id);
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
            Data kos berhasil dihapus </div>');
            redirect('superadmin/datakos');
        } else {
            $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
            Data kos gagal dihapus </div>');
            redirect('superadmin/datakos');
        }
    }


    public function datakosid()
    {
        $data['tittle'] = 'Data kos';
        $id = $this->uri->segment(3);
        $data['kosid'] = $this->mymodel->GetDatakosid($id);
        $this->load->view('templates/header',  $data);
        $this->load->view('superadmin/fotokos', $data);
    }



    // Controller Untuk Halaman Informasi Data kos sudah terverivikasi
    public function datakosbadung()
    {
        $data['tittle'] = 'Data Kos Terverivikasi ';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['rumahkos'] = $this->mymodel->GettDatakosterverivikasi();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/datakosbadung', $data);
        $this->load->view('templates/footer');
    }






    // Controller Untuk  halaman Data Penyewa
    public function datapenyewa()
    {
        $data['tittle'] = 'Data Penyewa Kos';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['user'] = $this->db->get('user')->result_array();

        $this->load->view('templates/header',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/datapenyewa', $data);
        $this->load->view('templates/footer');
    }

    public function proses_editdata_penyewa($id)

    {
        $this->mymodel->proses_editdata_penyewa($id);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
        Data Telah Berhasil Diedit!
      </div>');
        redirect('superadmin/datapenyewa');
    }

    public function hapus_datapenyewa($id)
    {
        $this->mymodel->hapus_datapenyewa($id);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
        Data Telah Berhasil Dihapus!
      </div>');
        redirect('superadmin/datapenyewa');
    }








    // Controller untuk halaman Data Kamar Kos

    public function datakamarkos()
    {
        $data['tittle'] = 'Data Kamar Kos';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['datakamarkos'] = $this->mymodel->GettAllDatakamarkos();

        $this->load->view('templates/header',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/datakamarkos', $data);
        $this->load->view('templates/footer');
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
            redirect('superadmin/datakamarkos');
        } else {
            $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
            Data Kamar Kos gagal dihapus </div>');
            redirect('superadmin/datakamarkos');
        }
    }


    // Controller untuk halaman Data Transaksi
    public function datatransaksi()
    {
        $data['tittle'] = 'Data Transaksi';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['Transaksi'] = $this->mymodel->datatransaksi();

        $this->load->view('templates/header',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/datatransaksi', $data);
        $this->load->view('templates/footer');
    }

    public function proses_verivikasi_data($id)
    {

        $this->mymodel->proses_verivikasi_data_transaksi($id);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
        Data Telah Berhasil diverivikasi.
      </div>');
        redirect('superadmin/datatransaksi');
    }
    public function hapus_datatransaksi($id)
    {

        $data = $this->mymodel->datatransaksiid($id)->row();
        $nama1 = 'androidAPI/Image/BuktiPembayaran/' . $data->Buktipembayaran;

        if (
            is_readable($nama1) && unlink($nama1)
        ) {
            $this->mymodel->hapus_datatransaksi($id);
            $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
            Data transaksi berhasil dihapus </div>');
            redirect('superadmin/datatransaksi');
        } else {
            $this->session->set_flashdata('Pesan', '<div class="alert alert-danger" role="alert">
            Data transaksi gagal dihapus </div>');
            redirect('superadmin/datatransaksi');
        }
    }

    //Controller Untuk Halaman riwayat Transaksi
    public function riwayattransaksi()
    {
        $data['tittle'] = 'Riwayat Transaksi';
        $data['admin'] = $this->db->get_where('admin', ['Username' =>
        $this->session->userdata('Username')])->row_array();

        $data['riwayat'] = $this->mymodel->riwayattransaksi();

        $this->load->view('templates/header',  $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('superadmin/riwayattransaksi', $data);
        $this->load->view('templates/footer');
    }
}
