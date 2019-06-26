<?php

class M_app extends CI_model
{

	public function __construct()
	{
    $this->load->database();
		parent::__construct();
	}

  /*public function get_campaign()
  {
      $this->db->select('campaign_id, campaign_name, active');
      $this->db->from('vicidial_campaigns');
      $query = $this->db->get();
      return $query->result();

  }
	*/

  public function data()
  {
    $this->db->from('data');

    $query = $this->db->get();
    return $query->num_rows();
  }

  public function data_submit()
  {
    $this->db->from('data');
    $this->db->where('status_data', 'SUBMIT');
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function approved()
  {
    $this->db->from('data');
    $this->db->where('status_data', 'APPROVE');
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function send_back()
  {
    $this->db->from('data');
    $this->db->where('status_data', 'SEND BACK');
    $query = $this->db->get();
    return $query->num_rows();
  }

  public function reject()
  {
    $this->db->from('data');
    $this->db->where('status_data', 'REJECT');
    $query = $this->db->get();
    return $query->num_rows();
  }

	/*
	public function daily_sales()
	{
		$this->db->from('data');
		$this->db->where('agent_name', $this->session->userdata('fullname'));
		$this->db->like('activation_date', date('Y-m-d'));

    $query = $this->db->get();
    return $query->num_rows();
	}

	public function weekly_sales()
	{
		$agent_name = $this->session->userdata('fullname');
		$query = $this->db->query("SELECT * FROM data WHERE agent_name='$agent_name' AND YEARWEEK(activation_date)=YEARWEEK(NOW()) AND status_data!='CALLBACK' ");
		return $query->num_rows();
	}

	public function monthly_sales()
	{
		$this->db->from('data');
		$this->db->where('agent_name', $this->session->userdata('fullname'));
		$this->db->like('activation_date', date('Y-m'));

    $query = $this->db->get();
    return $query->num_rows();
	}

	public function total_sales()
	{
		$this->db->from('data');
		$this->db->where('agent_name', $this->session->userdata('fullname'));

    $query = $this->db->get();
    return $query->num_rows();
	}
 */

	public function user()
  {
    $this->db->from('user');
    $query = $this->db->get();
    return $query->num_rows();
  }

	// CHART
	//
	public function count1()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='1' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
  	return $query->num_rows();
  }

	public function count2()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='2' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
  	return $query->num_rows();
  }

	public function count3()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='3' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
  	return $query->num_rows();
  }

	public function count4()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='4' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
		return $query->num_rows();
  }

	public function count5()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='5' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
		return $query->num_rows();
  }

	public function count6()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='6' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
  	return $query->num_rows();
  }

	public function count7()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='7' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
  	return $query->num_rows();
  }

	public function count8()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='8' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
  	return $query->num_rows();
  }

	public function count9()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='9' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
  	return $query->num_rows();
  }

	public function count10()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='10' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
  	return $query->num_rows();
  }

	public function count11()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='11' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
  	return $query->num_rows();
  }

	public function count12()
  {
		$query = $this->db->query("SELECT formid FROM data WHERE MONTH(activation_date) ='12' AND  YEAR(activation_date)= YEAR(CURRENT_TIMESTAMP)");
  	return $query->num_rows();
  }

}
