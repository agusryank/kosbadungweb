<?php
defined('BASEPATH') or exit('No direct script access allowed');

class mymodel extends CI_Model

{

    // Index data (SuperAdmin)
    public function hitungJumlahKos()
    {
        $query = $this->db->get('kos');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function hitungJumlahadmin()
    {
        $query = $this->db->get('admin');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    public function hitungJumlahuser()
    {
        $query = $this->db->get('user');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    public function hitungJumlahtransaksi()
    {
        $query = $this->db->get('transaksi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    // Data Kos Model (SuperAdmin)

    function GettDatakos()
    {
        $query = $this->db->query("SELECT * FROM `kos` WHERE `Status`='Pending' ");
        return $query->result();
    }

    function GettDatakosterverivikasi()
    {
        $query = $this->db->query("SELECT * FROM `kos` WHERE `Status`='Sukses' ");
        return $query->result();
    }

    function GetDatakosid($id)
    {
        $query = $this->db->query("SELECT * FROM `kos` WHERE `id`='$id' ");
        return $query->result();
    }

    function proses_verivikasi_data()
    {
        $data = [
            "Status" => $this->input->post('status'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('kos', $data);
    }

    function hapus_kos($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('kos');
    }

    // Data Pemilik Model (SuperAdmin)

    function ambil_id_datapemilik($id)
    {
        return $this->db->get_where('admin', ['id' => $id])->row_array();
    }


    function proses_edit_data()
    {

        $data = [
            "Nama" => $this->input->post('nama'),
            "Alamat" => $this->input->post('alamat'),
            "No_telp" => $this->input->post('notelp'),
            "Jenis_kelamin" => $this->input->post('jeniskelamin'),
            "Username" => $this->input->post('username'),
        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('admin', $data);
    }


    function data_pemilik()
    {
        $query = $this->db->query("SELECT * FROM `admin` WHERE `Role_id`='2' ");
        return $query->result();
    }


    function hapus_datapemilik($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('admin');
    }


    // Data Penyewa Model (SuperAdmin)

    function ambil_id_datapenyewa($id)
    {
        return $this->db->get_where('user', ['id' => $id])->row_array();
    }

    function proses_editdata_penyewa()
    {

        $data = [
            "Nama" => $this->input->post('nama'),
            "Alamat" => $this->input->post('alamat'),
            "No_telp" => $this->input->post('notelp'),
            "Jenis_kelamin" => $this->input->post('jeniskelamin'),
            "Username" => $this->input->post('username'),
            "Password" => $this->input->post('password'),

        ];

        $this->db->where('id', $this->input->post('id'));
        $this->db->update('user', $data);
    }


    function hapus_datapenyewa($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('user');
    }

    // Data Transaksi Model (SuperAdmin)
    function datatransaksi()
    {
        $query = $this->db->query("SELECT * FROM `transaksi` WHERE `Status`='Pending' ");
        return $query->result();
    }

    function proses_verivikasi_data_transaksi()
    {
        $data = [
            "Status" => $this->input->post('status'),
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('transaksi', $data);
    }

    function hapus_datatransaksi($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('transaksi');
    }



    // Data Kamar Kos Model (Admin)

    function GettAllDatakamarkos()
    {
        $query = $this->db->query("SELECT * FROM `kamarkos`");
        return $query->result();
    }




    // Riwayat Transaksi model (SuperAdmin)

    function riwayattransaksi()
    {
        $query = $this->db->query("SELECT * FROM `transaksi` WHERE `Status`='Sukses' ");
        return $query->result();
    }


    // Index data (Admin)
    public function hitungJumlahKosAdmin()
    {
        $this->db->where('kos.Namapemilik', $this->session->userdata('Nama'));
        $query = $this->db->get('kos');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }

    function datatransaksiid($id)
    {
        return $this->db->get_where('transaksi', array('id' => $id));
    }


    public function hitungJumlahTransaksiAdmin()
    {
        $this->db->where('transaksi.Namapemilik', $this->session->userdata('Nama'));
        $query = $this->db->get('transaksi');
        if ($query->num_rows() > 0) {
            return $query->num_rows();
        } else {
            return 0;
        }
    }


    // Data Kos Model (Admin)

    function tambahkos()
    {
        $target_dir = "androidAPI/Image/FotoKos/";

        $nameFoto1 = basename($_FILES["foto1"]["name"]);
        $new_name1 = time() . "-" . rand(10, 99) . "-" . $nameFoto1;
        $target_file = $target_dir . $new_name1;
        move_uploaded_file($_FILES["foto1"]["tmp_name"], $target_file);

        $nameFoto2 = basename($_FILES["foto2"]["name"]);
        $new_name2 = time() . "-" . rand(10, 99) . "-" . $nameFoto2;
        $target_file = $target_dir . $new_name2;
        move_uploaded_file($_FILES["foto2"]["tmp_name"], $target_file);

        $nameFoto3 = basename($_FILES["foto3"]["name"]);
        $new_name3 = time() . "-" . rand(10, 99) . "-" . $nameFoto3;
        $target_file = $target_dir . $new_name3;
        move_uploaded_file($_FILES["foto3"]["tmp_name"], $target_file);

        $nameFoto4 = basename($_FILES["foto4"]["name"]);
        $new_name4 = time() . "-" . rand(10, 99) . "-" . $nameFoto4;
        $target_file = $target_dir . $new_name4;
        move_uploaded_file($_FILES["foto4"]["tmp_name"], $target_file);

        $data = [
            "foto1" => $new_name1,
            "foto2" => $new_name2,
            "foto3" => $new_name3,
            "foto4" => $new_name4,
            "Namakos" => $this->input->post('namakos'),
            "Namapemilik" => $this->input->post('namapemilik'),
            "Latitude" => $this->input->post('lat'),
            "Longtitude" => $this->input->post('long'),
            "Deskripsi" => $this->input->post('deskripsi'),
            "Kecamatan" => $this->input->post('kecamatan'),
            "Status" => 'Pending',
            "Aktif" => '1',
        ];

        $this->db->insert('kos', $data);
    }

    function proses_edit_datakos()
    {
        $target_dir = "androidAPI/Image/FotoKos/";
        if (isset($_FILES['foto1']) && isset($_FILES['foto2']) && isset($_FILES['foto3']) && isset($_FILES['foto4'])) {
            # code...
            $target_unlink = $target_dir . $this->input->post('oldFoto1');
            unlink($target_unlink);
            $target_unlink = $target_dir . $this->input->post('oldFoto2');
            unlink($target_unlink);
            $target_unlink = $target_dir . $this->input->post('oldFoto3');
            unlink($target_unlink);
            $target_unlink = $target_dir . $this->input->post('oldFoto4');
            unlink($target_unlink);

            $nameFoto1 = basename($_FILES["foto1"]["name"]);
            $new_name1 = time() . "-" . rand(10, 99) . "-" . $nameFoto1;
            $target_file = $target_dir . $new_name1;
            move_uploaded_file($_FILES["foto1"]["tmp_name"], $target_file);

            $nameFoto2 = basename($_FILES["foto2"]["name"]);
            $new_name2 = time() . "-" . rand(10, 99) . "-" . $nameFoto2;
            $target_file = $target_dir . $new_name2;
            move_uploaded_file($_FILES["foto2"]["tmp_name"], $target_file);

            $nameFoto3 = basename($_FILES["foto3"]["name"]);
            $new_name3 = time() . "-" . rand(10, 99) . "-" . $nameFoto3;
            $target_file = $target_dir . $new_name3;
            move_uploaded_file($_FILES["foto3"]["tmp_name"], $target_file);

            $nameFoto4 = basename($_FILES["foto4"]["name"]);
            $new_name4 = time() . "-" . rand(10, 99) . "-" . $nameFoto4;
            $target_file = $target_dir . $new_name4;
            move_uploaded_file($_FILES["foto4"]["tmp_name"], $target_file);
        } else {
            $new_name1 = $this->input->post('oldfoto1');
            $new_name2 = $this->input->post('oldfoto2');
            $new_name3 = $this->input->post('oldfoto3');
            $new_name4 = $this->input->post('oldfoto4');
        }


        $data = [
            "foto1" => $new_name1,
            "foto2" => $new_name2,
            "foto3" => $new_name3,
            "foto4" => $new_name4,
            "Namakos" => $this->input->post('namakos'),
            "Namapemilik" => $this->input->post('namapemilik'),
            "Latitude" => $this->input->post('lat'),
            "Longtitude" => $this->input->post('long'),
            "Deskripsi" => $this->input->post('deskripsi'),
            "Kecamatan" => $this->input->post('kecamatan'),
            "Status" => 'Pending',
        ];

        $this->db->where('id', $this->input->post('id_Kos'));
        $this->db->update('kos', $data);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
        Data Telah Berhasil Diedit!
      </div>');
        redirect('adminkos/datakos');
    }


    function GettAllDatakos()
    {
        $this->db->where('kos.Namapemilik', $this->session->userdata('Nama'));
        return $this->db->get('kos')->result();
    }

    function Datakosid($id)
    {
        $query = $this->db->query("SELECT * FROM `kos` WHERE `id`='$id' ");
        return $query->result();
    }

    function Datakamarkosid($id)
    {
        return $this->db->get_where('kamarkos', array('id' => $id));
    }

    function datahapusid($id)
    {
        return $this->db->get_where('kos', array('id' => $id));
    }

    function hapus_data_kos($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kos');
    }

    function hapus_data_kamar($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('kamarkos');
    }

    function tambah_kamarkos()
    {
        $target_dir = "androidAPI/Image/FotoKamarKos/";
        $name = basename($_FILES["userfile"]["name"]);
        $new_name = time() . "-" . rand(10, 99) . "-" . $name;
        $target_file = $target_dir . $new_name;
        move_uploaded_file($_FILES["userfile"]["tmp_name"], $target_file);

        $data = array(
            'Namakamar' => $this->input->post('namakamar'),
            'id_kos' => $this->input->post('id_kos'),
            'Namakos' => $this->input->post('namakos'),
            'id_pemilik' => $this->input->post('id_pemilik'),
            'Namapemilik' => $this->input->post('namapemilik'),
            'Fasilitaskamar' => $this->input->post('fasilitas'),
            'Jumlahkamar' => $this->input->post('jmlkamar'),
            'Hargakamar' => $this->input->post('harga'),
            'Foto' => $new_name,
            'Aktif' => 1,
        );
        $this->db->insert('kamarkos', $data);
        $this->session->set_flashdata('Pesan', '<div class="alert alert-success" role="alert">
            Data Kamar Kos Berhasil Ditambahkan ! </div>');
        redirect('adminkos/datakamarkos');
    }



    // Data Kamar Kos Model (Admin)

    function GettDatakamarkosadmin()
    {
        $this->db->where('kamarkos.Namapemilik', $this->session->userdata('Nama'));
        return $this->db->get('kamarkos')->result();
    }

    function Tambah_data_kamar()
    {
        $this->db->insert('kamarkos');
    }


    // Data Transaksi Model (Admin)

    function GettAllDataTransaksi()
    {

        $this->db->where('transaksi.Namapemilik', $this->session->userdata('Nama'));
        return $this->db->get('transaksi')->result();
    }
}
