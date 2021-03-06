<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('cctv');
    }

    public function index()
    {
        $recordCctv = $this->cctv->getDetailCctv();
        $data['data_cctv'] = $recordCctv;
        $data['title'] =  "Detail CCTV";
		
        $this->load->view('details/Detail_view', $data);
    }

    public function pingTest()
    {
        $ip = $row->ip;
        $ping = exec("ping -n 1 $ip", $output, $status);
        if ($status === 0) {
            echo "Online";
        } else {
            echo "Offline";
        }

        $datainsert = array(
            'ip' => $ip,
            'status' => $status,
        );
        $this->cctv->InsertDetailCctv($datainsert);

        redirect(base_url('Detail'));
    }
}
