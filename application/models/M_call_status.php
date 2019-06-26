<?php

class M_call_status extends CI_model
/**
 *  =======   Application By    : Team @GetDial  2018    =======
 *  =======   Version           : V.1.0                  =======
 *  ===========           Copyright 2018          ==============
*/
{

	public function __construct()
	{
    $this->load->database();
		parent::__construct();
	}

	var $table = 'vicidial_statuses';
	var $column_order = array('status','status_name','status_connect','status_contact','status_presetented','status_respon');
  var $column_search = array('status','status_name','status_connect','status_contact','status_presetented','status_respon');
	var $order = array('ASC');
  private function _get_datatables_query()
  {
	$this->db->select('status, status_name, status_connect, status_contact, status_presetented, status_respon');
	$this->db->from($this->table);
  $this->db->where('selectable', 'Y');

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

  public function get_data($status)
	{
    $this->db->select('status, status_name, status_connect, status_contact, status_presetented, status_respon');
		$this->db->from($this->table);
    $this->db->where('selectable', 'Y');
    $this->db->where('status', $status);
		$query= $this->db->get();
		return $query->row();
	}


  public function update_call_status($where, $data)
	{
		$this->db->update($this->table, $data, $where);
		return $this->db->affected_rows();
	}

}
