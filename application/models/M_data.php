<?php

class M_data extends CI_model
{
	/**
	 *  =======   Application By    : Team @GetDial  2018    =======
	 *  =======   Version           : V.1.0                  =======
	 *  ===========           Copyright 2018          ==============
	*/

	public function __construct()
	{
    $this->load->database();
		parent::__construct();
	}

	var $table = 'data';
  var $column_order = array('no','acion','formid','name','mobile_phone','dob','gender','question1','question2','question3','benefit_result_q3','email_data','booking','body','weight','skin','address','city','zip','recipient_name','recipient_hp','credit_card','expired','agent','status_data');
  var $column_search = array('no','acion','formid','name','mobile_phone','dob','gender','question1','question2','question3','benefit_result_q3','email_data','booking','body','weight','skin','address','city','zip','recipient_name','recipient_hp','credit_card','expired','agent','status_data');

  private function _get_datatables_query()
  {
		// filter
		$start_date =$this->input->post('start_date');
		$end_date = $this->input->post('end_date');
		$status_filter  = $this->input->post('status_filter');
		$is_date_search  = $this->input->post('is_date_search');
		$status_filter  = $this->input->post('status_filter');



		$sessi = array(
						'start_date' =>$start_date,
						'end_date' =>$end_date,
						);
		$this->session->set_userdata($sessi);

		if(!$this->session->userdata('start_date') && !$this->session->userdata('end_date')){
		$data = array(
				'start_date' => date('Y-m-d'),
				'end_date' => date('Y-m-d')
				);
		$this->session->set_userdata($data);
		}

		if($is_date_search == "yes")
		{
			if(!empty($start_date)){
        $this->db->where('activation_date >=', date('Y-m-d', strtotime($start_date))." 00:00:01");
      }
      if(!empty($end_date)){
        $this->db->where('activation_date <=', date('Y-m-d', strtotime($end_date))." 23:59:59");
      }
			if(!empty($status_filter)){
        $this->db->where('status_data', $status_filter);
      }
		}

	$this->db->from($this->table);

      $i = 0;

      foreach ($this->column_search as $row)
      {
          if($_POST['search']['value'])
          {

              if($i===0)
              {
                  $this->db->group_start();
                  $this->db->like($row, $_POST['search']['value']);
              }
              else
              {
                  $this->db->or_like($row, $_POST['search']['value']);
              }

              if(count($this->column_search) - 1 == $i)
                  $this->db->group_end();
          }
          $i++;
      }

      if(isset($_POST['order']))
      {
          $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
      }
      else if(isset($this->order))
      {
          $order = $this->order;
          $this->db->order_by(key($order), $order[key($order)]);
      }
  }

	public function Get_All()
	{
		$this->_get_datatables_query();
	      if($_POST['length'] != -1)
	      $this->db->limit($_POST['length'], $_POST['start']);
	      $query = $this->db->get();
	      return $query->result();
	}

  public function count_filtered()
  {
      $this->_get_datatables_query();
      $query = $this->db->get();
      return $query->num_rows();
  }

  public function count_all()
  {
      $this->db->from($this->table);
      return $this->db->count_all_results();
  }

	public function get_bank($keyword)
	{
	    $this->db->like('nama', $keyword);
      return $this->db->get('bank')->result();
  }

	public function InggrisTgl($tanggal)
  {
  	$bln=substr($tanggal,3,2);
  	$tgl=substr($tanggal,0,2);
  	$thn=substr($tanggal,6,4);
  	$tanggal="$thn-$bln-$tgl";
  	return $tanggal;
  }

	public function IndonesiaTgl($tanggal){
    	$tgl=substr($tanggal,8,2);
    	$bln=substr($tanggal,5,2);
    	$thn=substr($tanggal,0,4);
    	$tanggal="$tgl-$bln-$thn";
    	return $tanggal;
    }

	public function get_data($formid)
	{
			$this->db->from('data');
			$this->db->where('formid', $formid);
			$this->db->join('booking', 'booking.booking_formid = data.formid');
			$query = $this->db->get();
			return $query->row();
	}

	public function get_data_callback($phone)
	{
			$this->db->from('data');
			$this->db->where('mobile_no', $phone);
			$query = $this->db->get();
			return $query->row();
	}

	public function add_data($data)
	{
		$this->db->insert('data', $data);
		return $this->db->insert_id();
	}

	public function add_booking($booking)
	{
		$this->db->insert('booking', $booking);
		return $this->db->insert_id();
	}

	public function update_data($where, $data)
	{
		$this->db->update('data', $data, $where);
		return $this->db->affected_rows();
	}

	public function update_booking($where, $data)
	{
		$this->db->update('booking', $data, $where);
		return $this->db->affected_rows();
	}

	public function delete_data($formid)
	{
		$this->db->where('formid', $formid);
		$this->db->delete('data');
	}

	public function delete_booking($formid)
	{
		$this->db->where('booking_formid', $formid);
		$this->db->delete('booking');
	}

	public function get_formid()
	{
		$query = $this->db->query('SELECT right(formid,8) as kode FROM `data` order by right(formid,8) desc');
		if($query->num_rows()<>0){
			$data = $query->row();
			$kode = intval($data->kode)+1;
		}else{
			$kode = 000000001;
		}
		$kodemax = str_pad($kode,8,"0",STR_PAD_LEFT);
		return $kodemax;
  }

	public function get_data_send_back($phone_number)
	{
		$this->db->order_by('vicidial_list.phone_number');
		$this->db->where('vicidial_list.phone_number', $phone_number);
		$this->db->select('vicidial_list.list_id, vicidial_list.lead_id, vicidial_list.phone_number, vicidial_list.user, vicidial_lists.campaign_id');
		$this->db->from('vicidial_list');
	    $this->db->join('vicidial_lists', 'vicidial_list.list_id = vicidial_lists.list_id');
	    $query = $this->db->get();
	    if ($query->num_rows() > 0) {
        return $query->row();
	    } else {
	        return FALSE;
	    }

	}

	public function insert_vicidial_callback($data2)
	{
		$this->db->insert('vicidial_callbacks', $data2);
		return $this->db->insert_id();
	}

	public function update_vicidial_list($where, $data3)
	{
		$this->db->update('vicidial_list', $data3, $where);
		return $this->db->affected_rows();
	}
}
