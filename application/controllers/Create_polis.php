<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Create_polis extends CI_Controller {
  /**
   *  =======   Application By    : Team @GetDial  2018    =======
   *  =======   Version           : V.1.0                  =======
   *  ===========           Copyright 2018          ==============
  */
  public function __construct()
	{
		parent::__construct();
    $this->load->database();
    $this->load->model('M_data');
	}

	public function index()
	{
    $data = array();
    $data['formid'] = $this->M_data->get_formid();
    $this->load->view('create_polis', $data);
	}

  public function get_data_callback($phone)
  {
    $data = $this->M_data->get_data_callback($phone);
    echo json_encode($data);
  }

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

  public function bank()
  {
      $q = $this->db->get('bank');
      $output = $q->result();
      $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }

  /*
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
  */

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
      'benefit_body' =>$benefit_body,
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
      'status_data' =>"SUBMIT",
      'activation_date' => date('Y-m-d H:i:s')
     );

     if($this->input->post('booking') == "Ya"){
       $booking = array(
         'booking_formid' => $formid,
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

     $query_add = $this->M_data->add_data($data);
     $booking_add = $this->M_data->add_booking($booking);
     if($query_add = TRUE || $booking_add = TRUE)
     {
       echo "<script>window.alert('success'); </script>";
       echo "<script>window.close(); </script>";
     }else{
       $data=array();
       $data['msg'] = "Gagal di simpan !";
       $content = $this->load->view('errors/html/error_sessi', $data, TRUE);
       exit($content);
     }
  }

}
