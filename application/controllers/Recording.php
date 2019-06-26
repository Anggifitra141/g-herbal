<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Recording extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->library('PHPExcel');
			$this->load->model('M_app');
			$this->load->model('M_rec');
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

      $data= array();

      if ($this->input->post('search') == "Y") {
      	$phone_number = $this->input->post('phone_number');
				$start_date =  $this->input->post('start_date');
				$end_date =  $this->input->post('end_date');

				$agent = $this->input->post('agent');
				$campaign = $this->input->post('campaign');
				$status = $this->input->post('status');

				$data['recording'] = $this->M_rec->recordings($phone_number, $agent, $campaign, $status, $start_date, $end_date);
				$data['page_title'] = "Recordings";

			  $data['content'] = $this->load->view('recording', $data, TRUE);
			  $this->load->view('layout', $data);

      }else{
      	$data['page_title'] = "Recordings";

	      $data['content'] = $this->load->view('recording', $data, TRUE);
	      $this->load->view('layout', $data);

      }



      /*$output = array(
					'start_date' => $start_date1,
					);
			$this->session->set_userdata($output);
			*/


	}


	public function get_user()
  {
  	$this->db->select('user, full_name');
    $this->db->from('vicidial_users')->where('user_group !=', 'ADMIN');
    $q = $this->db->get();
    $output = $q->result();
    $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }

  public function get_status()
  {
  	$this->db->select('status, status_name');
    $this->db->from('vicidial_statuses')->where('human_answered', 'Y');
 		$this->db->order_by('status', "ASC");
    $q = $this->db->get();
    $output = $q->result();
    $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }

  public function get_campaign()
  {
  	$this->db->select('campaign_id');
    $this->db->from('vicidial_campaigns');
    $q = $this->db->get();
    $output = $q->result();
    $this->output->set_content_type('application/json')->set_output(json_encode($output));
  }

}
