<?php
class M_quality extends CI_Model
/**
 *  =======   Application By    : Team @GetDial  2018    =======
 *  =======   Version           : V.1.0                  =======
 *  ===========           Copyright 2018          ==============
*/
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    var $column_order = array('formid','name','mobile_phone','dob','gender','agent','status_data');
    var $column_search = array('formid','name','mobile_phone','dob','gender','agent','status_data');
    var $order = array('activation_date' => 'desc');

    private function _get_datatables_query_data()
    {


  	$this->db->from('data');
    $this->db->where('status_data', 'SUBMIT');
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

  	public function Get_All_Submit()
  	{
  		$this->_get_datatables_query_data();
  	      if($_POST['length'] != -1)
  	      $this->db->limit($_POST['length'], $_POST['start']);
  	      $query = $this->db->get();
  	      return $query->result();
  	}

    public function count_filtered_data()
    {
        $this->db->where('status_data', 'SUBMIT');
        $this->_get_datatables_query_data();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all_data()
    {
        $this->db->where('status_data', 'SUBMIT');
        $this->db->from('data');
        return $this->db->count_all_results();
    }

    public function get_data($mobile_phone)
  	{
        $this->db->from('data');
        $this->db->where('data.mobile_phone', $mobile_phone);
        $this->db->join('booking', 'booking.booking_formid = data.formid');
  			$query = $this->db->get();
  			return $query->row();
  	}

    var $table = 'vicidial_list';

    public function _get_datatables_query()
    {
  		//$this->db->select('goautodial_recordings_views.phone, call_date, duration, location, fullname, filename, campaign_id, data.formid, data.partner_refno, data.customer_name, data.gender_data, data.email_data, data.mobile_no');
  		//$this->db->from($this->table);
  		//$this->db->join('data', 'data.mobile_no = goautodial_recordings_views.phone');

      $this->db->select('vicidial_list.phone_number, recording_log.user,  vicidial_list.status, vicidial_lists.campaign_id, recording_log.start_time, recording_log.filename, recording_log.location, recording_log.length_in_sec, data.name');
      $this->db->from('recording_log');
      $this->db->join('vicidial_list', 'recording_log.lead_id = vicidial_list.lead_id');
      $this->db->join('vicidial_lists', 'vicidial_list.list_id = vicidial_lists.list_id');
      $this->db->join('data', 'vicidial_list.phone_number = data.mobile_phone');
    }

  	public function Get_Rec($mobile_phone)
  	{
        $this->db->where('vicidial_list.phone_number',$mobile_phone);
        $this->_get_datatables_query();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
  	}

    function count_filtered($mobile_phone)
    {
        $this->db->where('vicidial_list.phone_number',$mobile_phone);
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($mobile_phone)
    {
        $this->db->where('vicidial_list.phone_number',$mobile_phone);
        $this->db->from($this->table);
        return $this->db->count_all_results();
    }


    /* var $table_r = 'recoding_log';

    public function _get_datatables_query_()
    {
  		$this->db->select('recoding_log.lead_id, start_time, length_in_sec, location, filename, data.formid, data.partner_refno, data.customer_name, data.gender_data, data.email_data, data.mobile_no');
  		$this->db->from($this->table);
  		$this->db->join('data', 'data.lead_id_data = recoding_log.lead_id');
    }

  	public function Get_Rec($lead_id_data)
  	{
        $this->db->where('lead_id',$lead_id_data);
        $this->_get_datatables_query_();
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
  	}

    function count_filtered($lead_id_data)
    {
        $this->db->where('lead_id',$lead_id_data);
        $this->_get_datatables_query_();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all($lead_id_data)
    {
        $this->db->where('lead_id',$lead_id_data);
        $this->db->from($this->table_r);
        return $this->db->count_all_results();
    }
	*/

}
?>
