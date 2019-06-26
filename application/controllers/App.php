<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class App extends CI_Controller {
  /**
   *  =======   Application By    : Team @GetDial  2018    =======
   *  =======   Version           : V.1.0                  =======
   *  ===========           Copyright 2018          ==============
  */
  public function __construct()
	{
		parent::__construct();
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
    $data['page_title'] = "Dashboard";

    $data['data'] = $this->M_app->data();
    $data['data_submit'] = $this->M_app->data_submit();
    $data['approved'] = $this->M_app->approved();
    $data['send_back'] = $this->M_app->send_back();
    $data['reject'] = $this->M_app->reject();

    $data['count1'] = $this->M_app->count1();
    $data['count2'] = $this->M_app->count2();
    $data['count3'] = $this->M_app->count3();
    $data['count4'] = $this->M_app->count4();
    $data['count5'] = $this->M_app->count5();
    $data['count6'] = $this->M_app->count6();
    $data['count7'] = $this->M_app->count7();
    $data['count8'] = $this->M_app->count8();
    $data['count9'] = $this->M_app->count9();
    $data['count10'] = $this->M_app->count10();
    $data['count11'] = $this->M_app->count11();
    $data['count12'] = $this->M_app->count12();

    //$data['campaign'] = $this->M_app->get_campaign();


    $data['content'] = $this->load->view('dashboard', $data, TRUE);
    $this->load->view('layout', $data);
	}
}
