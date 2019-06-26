<?php
class M_login extends CI_Model
/**
 *  =======   Application By    : Team @GetDial  2018    =======
 *  =======   Version           : V.1.0                  =======
 *  ===========           Copyright 2018          ==============
*/
{
	public function check()
	{
		$this->db->where('username', $this->input->post('username', TRUE));
		$this->db->where('password', md5($this->input->post('password', TRUE)));
    $this->db->where('status', "ACTIVE", TRUE);
		$query = $this->db->get('user');
		if($query->num_rows() > 0)
		{
			$result = $query->row_array();
			$data = array(
					'id' => $result['id'],
					'username' => $result['username'],
          'fullname' => $result['fullname'],
					'level' => $result['level'],
          'status' => $result['status'],
					'logged_in' => TRUE
					);
			$this->session->set_userdata($data);

			return TRUE;
		}
		else
		{
			return FALSE;
		}
	}
}
