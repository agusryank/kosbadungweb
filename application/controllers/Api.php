<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('api_model');
    }

    public function index()
    {
        echo "this is API control";
    }

    public function getArroundKost()
    {
        $inVar = array(
            '1' => $this->input->post('latitude'),
            '2' => $this->input->post('longitude'),
            '3' => $this->input->post('radius'),
            '4' => 'select_kost'
        );

        $var = array('n' => 'sp_kost');
        $var['v'] = $inVar;

        // echo json_encode($var);
        $list = $this->api_model->sp($var)->result();

        echo json_encode($list);
    }

    public function getKostByDistricts()
    {
        $inVar = array(
            '1' => '',
            '2' => '',
            '3' => $this->input->post('kecamatan'),
            '4' => 'select_kec'
        );

        $var = array('n' => 'sp_kost');
        $var['v'] = $inVar;
        $list = $this->api_model->sp($var)->result();

        echo json_encode($list);
    }


    public function read_listkost()
    {
        $list = $this->api_model->select_data("*", "kos", "Status", "Sukses")->result();
        echo json_encode($list);
    }
}
