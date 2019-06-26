<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Data extends CI_Controller {
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
    $data['page_title'] = "Data";
    $data['formid'] = $this->M_data->get_formid();
    //$data['campaign'] = $this->M_app->get_campaign();
		$data['content'] = $this->load->view('data', $data, TRUE);
    $this->load->view('layout', $data);
	}


  public function ajax_list()
  {
      $list = $this->M_data->Get_All();
      $data = array();
      $no = 1;
      foreach ($list as $item) {
         $row = array();
          $row[] = $no++;
          $row[] = '<a onclick="get_data('."'".$item->formid."'".')" class="btn btn-sm green btn-outline sbold"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>&nbsp;&nbsp;<a onclick="delete_data('."'".$item->formid."'".')" class="btn btn-sm red btn-outline sbold"><i class="fa fa-trash" aria-hidden="true" title="Edit"></i></a>';
          $row[] = $item->name;
          $row[] = $item->mobile_phone;
          $row[] = date('d-m-Y', strtotime($item->dob));
          $row[] = $item->gender;
          $row[] = $item->question1;
          $row[] = $item->question2;
          $row[] = $item->question3;
          $row[] = $item->email_data;
          $row[] = $item->booking;
          $row[] = $item->address;
          $row[] = $item->city;
          $row[] = $item->zip;
          $row[] = $item->recipient_name;
          $row[] = $item->recipient_hp;
          $row[] = $item->credit_card;
          $row[] = $item->expired;
          $row[] = $item->agent;
          $row[] = $item->status_data;

        /*  if ($item->status == "SUCCESS"){
            $row[] =  "<h5 style='color:green;  font-weight: bold;'>SUCCESS</h5>";
          }else if($item->status == "CLOSED"){
            $row[] =  "<h5 style='color:red;  font-weight: bold;'>CLOSED</h5>";
          }else{
            $row[] =  "<h5 style='color:#F3C200; font-weight: bold;'>OPEN</h5>";
          }
        */

          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_data->count_all(),
                      "recordsFiltered" => $this->M_data->count_filtered(),
                      "data" => $data,
              );
      echo json_encode($output);
  }

  public function get_data($formid)
  {
      $data = $this->M_data->get_data($formid);
      echo json_encode($data);
  }

  public function get_campaign_name($mobile_no)
  {
    $data = array();
    $this->db->select('vicidial_lists.campaign_id');
    $this->db->from('vicidial_lists');
    $this->db->join('vicidial_list', 'vicidial_lists.list_id = vicidial_list.list_id');
    $this->db->where('vicidial_list.phone_number', $mobile_no);
    $q = $this->db->get()->result();
    foreach ($q as $row) {
      $data = $row->campaign_id;
    }
    return $data;
  }

  /*
  public function bank()
  {
      $q = $this->db->get('bank');
      $output = $q->result();
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }

  public function get_province()
  {
    $q = $this->db->get("provinces");
    $output = $q->result();
    $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }

  public function get_regencies()
  {
    $output = array();
    $province_id = $this->input->post("id", TRUE);
    if($province_id){
      $q = $this->db->get_where("regencies", array("province_id"=>$province_id));
      $output = $q->result();
    }else{
      $output = array();
    }
    $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }

  public function get_zip()
  {
    $q = $this->db->get("zip");
    $output = $q->result();
    $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }
  */

  public function InggrisTgl($tanggal)
  {
  	$bln=substr($tanggal,3,2);
  	$tgl=substr($tanggal,0,2);
  	$thn=substr($tanggal,6,4);
  	$tanggal="$thn-$bln-$tgl";
  	return $tanggal;
  }

  public function IndonesiaTgl($tanggal)
  {
  	$tgl=substr($tanggal,8,2);
  	$bln=substr($tanggal,5,2);
  	$thn=substr($tanggal,0,4);
  	$tanggal="$tgl/$bln/$thn";
  	return $tanggal;
  }

  public function add_data()
  {

    $formid_date_a = date('d-m-y');
    $formid_date = str_replace('-','.', $formid_date_a);
    $formid_numb = $this->M_data->get_formid();
    $formid = $formid_date."-".$formid_numb;
    //$formid = str_replace("/", ".", $formid_is);

    if($this->input->post('benefit_body') == "Lainnya"){
      $benefit_body = "(OPSIONAL) ".$this->input->post('benefit_body_opsional');
    }else{
      $benefit_body = $this->input->post('benefit_body');
    }
    if($this->input->post('benefit_weight') == "Lainnya"){
      $benefit_weight = "(OPSIONAL) ".$this->input->post('benefit_weight_opsional');
    }else{
      $benefit_weight = $this->input->post('benefit_weight');
    }
    if($this->input->post('benefit_skin') == "Lainnya"){
      $benefit_skin = "(OPSIONAL) ".$this->input->post('benefit_skin_opsional');
    }else{
      $benefit_skin = $this->input->post('benefit_skin');
    }

    $data = array(
      'formid' => $formid,
      'name' => strtoupper($this->input->post('name')),
      'mobile_phone' => $this->input->post('mobile_phone'),
      'dob' => date('Y-m-d', strtotime($this->input->post('dob'))),
      'gender' => strtoupper($this->input->post('gender')),
      'question1' => $this->input->post('question1'),
      'question2' => $this->input->post('question2'),
      'question3' => $this->input->post('question3'),
      'benefit_body' => $benefit_body,
      'benefit_weight' => $benefit_weight,
      'benefit_skin' => $benefit_skin,
      'email_data' => strtoupper($this->input->post('email')),
      'booking' => $this->input->post('booking'),
      'address' => strtoupper($this->input->post('address')),
      'city' => strtoupper($this->input->post('city')),
      'zip' => $this->input->post('zip'),
      'recipient_name' => $this->input->post('recipient_name'),
      'recipient_hp' => $this->input->post('recipient_hp'),
      'credit_card' => str_replace('-','', $this->input->post('credit_card')),
      'expired' => $this->input->post('expired'),
      'agent' => strtoupper($this->input->post('agent')),
      'status_data' =>$this->input->post('status_data'),
      'activation_date' => date('Y-m-d H:i:s')
     );

     if($this->input->post('booking') == "Ya"){
       $booking = array(
         'formid' => $formid,
         'harga_paket_ramadhan' => $this->input->post('harga_paket_ramadhan'),
         'qty_paket_ramadhan' => $this->input->post('qty_paket_ramadhan'),
         'sub_total_paket_ramadhan' => $this->input->post('sub_total_paket_ramadhan'),
         'harga_body' => $this->input->post('harga_body'),
         'qty_body' => $this->input->post('qty_body'),
         'sub_total_body' => $this->input->post('sub_total_body'),
         'harga_weight' => $this->input->post('harga_weight'),
         'qty_weight' => $this->input->post('qty_weight'),
         'sub_total_weight' => $this->input->post('sub_total_weight'),
         'harga_skin' => $this->input->post('harga_skin'),
         'qty_skin' => $this->input->post('qty_skin'),
         'sub_total_skin' => $this->input->post('sub_total_skin'),
         'total' => $this->input->post('total')
       );
     }

     $this->M_data->add_data($data);
     $this->M_data->add_booking($booking);
     echo json_encode(array("status" => TRUE ));
  }

  public function update_data()
  {
    if($this->input->post('benefit_body') == "Lainnya"){
      $benefit_body = "(OPSIONAL) ".$this->input->post('benefit_body_opsional');
    }else{
      $benefit_body = $this->input->post('benefit_body');
    }
    if($this->input->post('benefit_weight') == "Lainnya"){
      $benefit_weight = "(OPSIONAL) ".$this->input->post('benefit_weight_opsional');
    }else{
      $benefit_weight = $this->input->post('benefit_weight');
    }
    if($this->input->post('benefit_skin') == "Lainnya"){
      $benefit_skin = "(OPSIONAL) ".$this->input->post('benefit_skin_opsional');
    }else{
      $benefit_skin = $this->input->post('benefit_skin');
    }

    $data = array(
      'formid' => $this->input->post('formid'),
      'name' => strtoupper($this->input->post('name')),
      'mobile_phone' => $this->input->post('mobile_phone'),
      'dob' => date('Y-m-d', strtotime($this->input->post('dob'))),
      'gender' => strtoupper($this->input->post('gender')),
      'question1' => $this->input->post('question1'),
      'question2' => $this->input->post('question2'),
      'question3' => $this->input->post('question3'),
      'benefit_body' => $benefit_body,
      'benefit_weight' => $benefit_weight,
      'benefit_skin' => $benefit_skin,
      'email_data' => strtoupper($this->input->post('email')),
      'booking' => $this->input->post('booking'),
      'address' => strtoupper($this->input->post('address')),
      'city' => strtoupper($this->input->post('city')),
      'zip' => $this->input->post('zip'),
      'recipient_name' => $this->input->post('recipient_name'),
      'recipient_hp' => $this->input->post('recipient_hp'),
      'credit_card' => str_replace('-','', $this->input->post('credit_card')),
      'expired' => $this->input->post('expired'),
      'agent' => strtoupper($this->input->post('agent')),
      'status_data' =>$this->input->post('status_data'),
      'activation_date' => date('Y-m-d H:i:s')
     );

     if($this->input->post('booking') == "Ya"){
       $booking = array(
         'booking_formid' => $this->input->post('formid'),
         'harga_paket_ramadhan' => $this->input->post('harga_paket_ramadhan'),
         'qty_paket_ramadhan' => $this->input->post('qty_paket_ramadhan'),
         'sub_total_paket_ramadhan' => $this->input->post('sub_total_paket_ramadhan'),
         'harga_body' => $this->input->post('harga_body'),
         'qty_body' => $this->input->post('qty_body'),
         'sub_total_body' => $this->input->post('sub_total_body'),
         'harga_weight' => $this->input->post('harga_weight'),
         'qty_weight' => $this->input->post('qty_weight'),
         'sub_total_weight' => $this->input->post('sub_total_weight'),
         'harga_skin' => $this->input->post('harga_skin'),
         'qty_skin' => $this->input->post('qty_skin'),
         'sub_total_skin' => $this->input->post('sub_total_skin'),
         'total' => $this->input->post('total')
       );
     }

     $this->M_data->update_data(array('formid' => $this->input->post('formid')), $data);
     $this->M_data->update_booking(array('booking_formid' => $this->input->post('formid')), $booking);
     echo json_encode(array("status" => TRUE ));
  }



  public function delete_data($formid)
  {
    $this->M_data->delete_data($formid);
    $this->M_data->delete_booking($formid);
    echo json_encode(array("status" => TRUE));
  }

}
