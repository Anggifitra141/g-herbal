<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Call_status extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
      $this->load->model('M_call_status');
      if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == 'QUALITY')
        {
          $data=array();
  				$data['msg'] = "Maaf Anda tidak punya akses ke halaman ini !";
  				$content = $this->load->view('errors/html/error_sessi', $data, TRUE);
  				exit($content);
        }
		}

		public function index()
		{
	    $data= array();
      $data['page_title'] = "Call Status";
	    $data['content'] = $this->load->view('call_status', $data, TRUE);
			$this->load->view('layout', $data);
		}

    public function ajax_list()
    {
        $list = $this->M_call_status->Get_All();
        $data = array();
        $no = 1;
        foreach ($list as $item) {
            $row = array();
            $row[] = $no++;
            $row[] = $item->status;
            $row[] = $item->status_name;
            $row[] = $item->status_connect;
            $row[] = $item->status_contact;
            $row[] = $item->status_presetented;
            $row[] = $item->status_respon;
            $row[] = '<a onclick="get_supply('.$item->status.')" class="btn btn-sm green btn-outline sbold"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i>';

            $data[] = $row;
        }

        $output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->M_call_status->count_all(),
                        "recordsFiltered" => $this->M_call_status->count_filtered(),
                        "data" => $data,
                );
        echo json_encode($output);
    }

    public function get_call_status($status)
    {
      $data = $this->M_call_status->get_data($status);
      echo json_encode($data);
    }

    public function update_call_status()
    {
      $data = array(
  			'status_connect' => $this->input->post('status_connect'),
  			'status_contact' => $this->input->post('status_contact'),
  			'status_presetented' => $this->input->post('status_presetented'),
  			'status_respon' => $this->input->post('status_respon'),
  		);
  		$this->M_call_status->update_call_status(array('status' => $this->input->post('status')), $data);
  		echo json_encode(array("status" => TRUE));
    }

		public function InggrisTgl($tanggal)
		{
			$tgl=substr($tanggal,0,2);
			$bln=substr($tanggal,3,4);
			$thn=substr($tanggal,6,4);
			$tanggal="$thn-$bln-$tgl";
			return $tanggal;
		}


}
