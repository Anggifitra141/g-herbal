<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
  /**
   *  =======   Application By    : Team @GetDial  2018    =======
   *  =======   Version           : V.1.0                  =======
   *  ===========           Copyright 2018          ==============
  */
  public function __construct()
	{
		parent::__construct();
    $this->load->model('M_user');
    $this->load->model('M_app');
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
    $data = array();
    $data['page_title'] = "User";
    //$data['campaign'] = $this->M_app->get_campaign();
		$data['content'] = $this->load->view('user', $data, TRUE);
    $this->load->view('layout', $data);
	}

  public function ajax_list()
  {
      $list = $this->M_user->Get_All();
      $data = array();
      $no = 1;
      foreach ($list as $item) {
          $row = array();
          $row[] = $no++;
          $row[] = $item->username;
          $row[] = $item->fullname;
          $row[] = $item->level;
          $row[] = $item->status;
          if($this->session->userdata('level') == 'SUPERADMIN'){
            $row[] = '<a onclick="get_user('.$item->id.')" class="btn btn-sm green btn-outline sbold"><i class="fa fa-edit" aria-hidden="true" title="Edit"></i></a>&nbsp;&nbsp;<a onclick="delete_user('.$item->id.')" class="btn btn-sm red btn-outline sbold"><i class="fa fa-trash" aria-hidden="true" title="Delete"></i></a>';
          }else{
            $row[] = "<b style='color:red;'>No Action Support :)</b>";
          }
          $data[] = $row;
      }

      $output = array(
                      "draw" => $_POST['draw'],
                      "recordsTotal" => $this->M_user->count_all(),
                      "recordsFiltered" => $this->M_user->count_filtered(),
                      "data" => $data,
              );
      echo json_encode($output);
  }

  public function get_user($id)
  {
      $data = $this->M_user->get_user($id);
      echo json_encode($data);
  }

  public function tambah_user()
  {
      $password = $this->input->post('password');
      $konfirmasi = $this->input->post('konfirmasi_password');
      if ($password == $konfirmasi){
        $data = array(
          'username' => $this->input->post('username'),
          'fullname' => $this->input->post('fullname'),
          'password' => md5($password),
          'level' =>  $this->input->post('level'),
          'status' =>  $this->input->post('status'),
          'activation_date' => date('Y-m-d'),
         );
         $this->M_user->tambah_user($data);
         echo json_encode(array("status" => TRUE ));
      }else{
        echo '<script>alert("Konfirmasi Password Harus Sama")</script>';
      }
  }

  public function update_user()
  {
      $data = array(
        'username' => $this->input->post('username'),
        'fullname' => $this->input->post('fullname'),
        'level' =>  $this->input->post('level'),
        'status' =>  $this->input->post('status'),
         );
       $this->M_user->update_user(array('id' => $this->input->post('id')), $data);
       echo json_encode(array("status" => TRUE ));
  }

  public function delete_user($id)
  {
    $this->M_user->delete_user($id);
    echo json_encode(array("status" => TRUE));
  }

}
