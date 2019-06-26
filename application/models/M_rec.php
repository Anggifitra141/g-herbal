<?php
class M_rec extends CI_Model
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



  // Recording Log

  public function recordings($phone_number, $agent, $campaign, $status, $start_date, $end_date)
  {
    $data = array();
    if(!empty($phone_number)){
      $this->db->where('vicidial_list.phone_number', $phone_number);
    }
    if(!empty($agent)){
      $this->db->where('recording_log.user', $agent);
    }
    if(!empty($campaign)){
      $this->db->where('vicidial_lists.campaign_id', $campaign);
    }
    if(!empty($status)){
      $this->db->where('vicidial_list.status', $status);
    }
    if(!empty($start_date)){
      $this->db->where('recording_log.start_time >=', date("Y-m-d", strtotime($start_date))." 00:00:01");
    }
    if(!empty($end_date)){
      $this->db->where('recording_log.start_time <=', date("Y-m-d", strtotime($end_date))." 23:59:00");
    }

    $this->db->select('vicidial_list.phone_number, recording_log.user,  vicidial_list.status, vicidial_lists.campaign_id, recording_log.start_time, recording_log.filename, recording_log.location,  recording_log.length_in_sec');
    $this->db->from('recording_log');
    $this->db->join('vicidial_list', 'recording_log.lead_id = vicidial_list.lead_id');
    $this->db->join('vicidial_lists', 'vicidial_list.list_id = vicidial_lists.list_id');
    $q = $this->db->get();
    if($q->num_rows() > 0)
    {
      foreach($q->result_array() as $row)
      {
        $data[]=$row;
      }
    }
    $q->free_result();
    return $data;
  }
}
?>
