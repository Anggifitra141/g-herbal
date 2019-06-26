<?php
class M_report extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    var $table = 'vicidial_list';
    var $order = array('modify_date' => 'desc');


	public function Get_All_Call($lead_id)
	{
		$this->db->limit(10);
		$this->db->order_by('vicidial_log.call_date', 'ASC');
		$this->db->where('vicidial_log.lead_id', $lead_id);
    $this->db->from('vicidial_log');
    $this->db->join('recording_log', 'vicidial_log.uniqueid = recording_log.vicidial_id', 'left');
    $this->db->join('vicidial_statuses', 'vicidial_statuses.status = vicidial_log.status');
    $query = $this->db->get();
    return $query->result();
	}

    public function list_data($start_date, $end_date, $campaign)
    {
	      $data = array();
        if(!empty($start_date)){
            $this->db->where('modify_date >=', $start_date);
        }
        if(!empty($end_date)){
            $this->db->where('modify_date <=', $end_date);
        }
        if(!empty($campaign)){
            $this->db->where('vicidial_lists.campaign_id', $campaign);
        }

        //if($this->input->post('dispo'))
        //{
            //$this->db->where('status', $this->input->post('dispo'));
        //}
        $this->db->where('user !=', '');
        $this->db->from($this->table);
        $this->db->join('vicidial_lists', 'vicidial_lists.list_id = vicidial_list.list_id');
        $this->db->join('data', 'data.mobile_no = vicidial_list.phone_number', 'left');
        return $this->db->get()->result();
    }

    public function get_report($start_date, $end_date, $campaign)
    {
      $data = array();
      if(!empty($start_date)){
          $this->db->where('vicidial_list.modify_date >=', $start_date);
      }
      if(!empty($end_date)){
          $this->db->where('vicidial_list.modify_date <=', $end_date);
      }
      if(!empty($campaign)){
          $this->db->where('vicidial_lists.campaign_id', $campaign);
      }

      //if($this->input->post('dispo'))
      //{
          //$this->db->where('status', $this->input->post('dispo'));
      //}
      $this->db->order_by('vicidial_log.call_date', 'ASC');
      $this->db->where('vicidial_list.user !=', '');
      $this->db->from($this->table);
      $this->db->join('vicidial_lists', 'vicidial_lists.list_id = vicidial_list.list_id');
      $this->db->join('vicidial_log', 'vicidial_log.lead_id = vicidial_list.lead_id');
      $this->db->join('recording_log', 'vicidial_log.uniqueid = recording_log.vicidial_id', 'left');
      $this->db->join('vicidial_statuses', 'vicidial_statuses.status = vicidial_log.status');
      $this->db->join('data', 'data.mobile_no = vicidial_list.phone_number', 'left');
      return $this->db->get()->result();
    }

}
?>
