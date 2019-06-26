<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Quality extends CI_Controller {
  /**
   *  =======   Application By    : Team @GetDial  2018    =======
   *  =======   Version           : V.1.0                  =======
   *  ===========           Copyright 2018          ==============
  */
  public function __construct()
	{
		parent::__construct();
    $this->load->model('M_data');
    $this->load->model('M_app');
    $this->load->model('M_quality');
    if(!$this->session->userdata('logged_in'))
      {
        $data=array();
				$data['msg'] = "Maaf Anda tidak punya akses ke halaman ini !";
				$content = $this->load->view('errors/html/error_sessi', $data, TRUE);
				exit($content);
      }
	}

	public function index()
	{
    $data = array();
    $data['page_title'] = "Quality";
    //$data['campaign'] = $this->M_app->get_campaign();
		$data['content'] = $this->load->view('quality', $data, TRUE);
    $this->load->view('layout', $data);
	}

  public function get_data($mobile_phone)
  {
      $data = $this->M_quality->get_data($mobile_phone);
      echo json_encode($data);
  }

  public function ajax_list()
  {
      $list = $this->M_quality->Get_All_Submit();
      $data = array();
      $no = 1;
      foreach ($list as $item) {
          $row = array();
          $row[] = $no++;
          $row[] = $item->name;
          $row[] = $item->mobile_phone;
          $row[] = $item->dob;
          $row[] = $item->gender;
          $row[] = '<a onclick="get_rec('."'".$item->mobile_phone."'".')" class="btn btn-sm yellow-lemon btn-outline sbold"><i class="fa fa-file-sound-o" aria-hidden="true" title="Recording"></i></a>';

          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_quality->count_all_data(),
                      "recordsFiltered" => $this->M_quality->count_filtered_data(),
                      "data" => $data,
              );
      echo json_encode($output);
  }

  public function rec_list($mobile_phone)
  {
      $list = $this->M_quality->Get_Rec($mobile_phone);
      $data = array();
      $no = 1;
      foreach ($list as $item) {
        $row = array();
        $row[] = $no++;
        //$row[] = $item->formid;
        $row[] = $item->name;
        $row[] = $item->filename; //str_replace(' ','-', $item->fullname).'_'.$item->filename;
        $row[] = gmdate('H:i:s', $item->length_in_sec);
        $row[] = $item->start_time;
        $row[] = $item->campaign_id;
        $row[] = '<audio controls style="width: 100%; display: block; margin: -6px;" controlsList="nodownload"><source src="'.$item->location.'"type="audio/mpeg"></audio>';
        $row[] = '<a title="Download" href="'.$item->location.'" class="btn green-jungle btn-outline sbold" download="'.str_replace(' ','-', $item->pic_name).'_'.$item->filename.'"><i class="fa fa-download"></1></a>';

        $data[] = $row;

      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_quality->count_all($mobile_phone),
                      "recordsFiltered" => $this->M_quality->count_filtered($mobile_phone),
                      "data" => $data,
              );
      echo json_encode($output);
  }

  /* public function rec_list($lead_id_data)
  {
      $list = $this->M_quality->Get_Rec($lead_id_data);
      $data = array();
      $no = 1;
      foreach ($list as $item) {
        $row = array();
        $row[] = $no++;
        //$row[] = $item->formid;
        $row[] = $item->customer_name;
        $row[] = $item->filename; //str_replace(' ','-', $item->fullname).'_'.$item->filename;
        $row[] = $item->length_in_sec;
        $row[] = $item->start_time;
        //$row[] = $item->campaign_id;
        $row[] = '<audio controls style="width: 100%; display: block; margin: -6px;" controlsList="nodownload"><source src="'.$item->location.'"type="audio/mpeg"></audio>';
        $row[] = '<a title="Download" href="'.$item->location.'" class="btn green-jungle btn-outline sbold" download="'.str_replace(' ','-', $item->customer_name).'_'.$item->filename.'"><i class="fa fa-download"></1></a>';

        $data[] = $row;

      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_quality->count_all($lead_id_data),
                      "recordsFiltered" => $this->M_quality->count_filtered($lead_id_data),
                      "data" => $data,
              );
      echo json_encode($output);
  }
  */


}
