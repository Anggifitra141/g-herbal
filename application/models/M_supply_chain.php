<?php
class M_supply_chain extends CI_Model
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

    public function leads($start_date, $end_date)
    {
        $query = $this->db->query("select count(*) as total from vicidial_agent_log a join vicidial_statuses b on a.`status`=b.`status` where a.event_time between '$start_date 00:00:00' and '$end_date 23:00:00' and (b.status_connect = 'CONNECT' or b.status_connect = 'NOT CONNECT' )");
        return $query->row_array();
    }

    public function not_connect($start_date, $end_date)
    {
        $query = $this->db->query("SELECT COUNT(*) as not_connect FROM vicidial_agent_log a JOIN vicidial_statuses b ON a.`status`=b.`status` WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND b.status_connect='NOT CONNECT'");
        return $query->row_array();
    }

    public function connect($start_date, $end_date)
    {
        $query = $this->db->query("SELECT COUNT(*) as connect FROM vicidial_agent_log a JOIN vicidial_statuses b ON a.`status`=b.`status` WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND b.status_connect='CONNECT'");
        return $query->row_array();
    }

    public function not_contact($start_date, $end_date)
    {
        $query = $this->db->query("SELECT COUNT(*) as not_contact FROM vicidial_agent_log a JOIN vicidial_statuses b on a.`status`=b.`status` WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND b.status_contact='NOT CONTACT'");
        return $query->row_array();
    }

    public function contact($start_date, $end_date)
    {
        $query = $this->db->query("SELECT COUNT(*) as contact FROM vicidial_agent_log a JOIN vicidial_statuses b on a.`status`=b.`status` WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND b.status_contact='CONTACT'");
        return $query->row_array();
    }

    public function not_presetented($start_date, $end_date)
    {
        $query = $this->db->query("SELECT COUNT(*) as not_presetented FROM vicidial_agent_log a JOIN vicidial_statuses b on a.`status`=b.`status` WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND b.status_presetented='NOT PRESETENTED'");
        return $query->row_array();
    }

    public function presetented($start_date, $end_date)
    {
        $query = $this->db->query("SELECT COUNT(*) as presetented FROM vicidial_agent_log a JOIN vicidial_statuses b on a.`status`=b.`status` WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND b.status_presetented='PRESETENTED'");
        return $query->row_array();
    }

    public function fu($start_date, $end_date)
    {
        $query = $this->db->query("SELECT COUNT(*) as FU FROM vicidial_agent_log a JOIN vicidial_statuses b on a.`status`=b.`status` WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND b.status_respon='FU' ");
        return $query->row_array();
    }

    public function ni($start_date, $end_date)
    {
        $query = $this->db->query("SELECT COUNT(*) as NI FROM vicidial_agent_log a JOIN vicidial_statuses b on a.`status`=b.`status` WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND b.status_respon='NI'");
        return $query->row_array();
    }

    public function nq($start_date, $end_date)
    {
        $query = $this->db->query("SELECT COUNT(*) as NQ FROM vicidial_agent_log a JOIN vicidial_statuses b on a.`status`=b.`status` WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND b.status_respon='NQ'");
        return $query->row_array();
    }

    public function sale($start_date, $end_date)
    {
        $query = $this->db->query("SELECT COUNT(*) as 'SALE' FROM vicidial_agent_log a JOIN vicidial_statuses b on a.`status`=b.`status` WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND b.status_respon='SALE'");
        return $query->row_array();
    }
}
?>
