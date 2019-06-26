<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Supply_chain extends CI_Controller {

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
			$this->load->library('PHPExcel');
			$this->load->model('M_supply_chain');
			$this->load->model('M_app');
      if(!$this->session->userdata('logged_in') || $this->session->userdata('level') == 'QUALITY')
        {
          $data=array();
  				$data['msg'] = "Maaf Anda tidak punya akses ke halaman ini !";
  				$content = $this->load->view('errors/html/error_sessi', $data, TRUE);
  				exit($content);
        }
		}

		public function InggrisTgl($tanggal)
	  {
	  	$bln=substr($tanggal,3,2);
	  	$tgl=substr($tanggal,0,2);
	  	$thn=substr($tanggal,6,4);
	  	$tanggal="$thn-$bln-$tgl";
	  	return $tanggal;
	  }

		public function index()
		{

      $data= array();
			$start_date = date("Y-m-d", strtotime($this->input->post('start_date')))." 00:00:01";
			$end_date = date("Y-m-d", strtotime($this->input->post('end_date')))." 23:59:00";

      $output = array(
					'start_date' => $this->input->post('start_date'),
					'end_date' =>$this->input->post('start_date')
					);
			$this->session->set_userdata($output);

      $data['leads'] = $this->M_supply_chain->leads($start_date, $end_date);
      $data['not_connect'] = $this->M_supply_chain->not_connect($start_date, $end_date);
      $data['connect'] = $this->M_supply_chain->connect($start_date, $end_date);
      $data['not_contact'] = $this->M_supply_chain->not_contact($start_date, $end_date);
      $data['contact'] = $this->M_supply_chain->contact($start_date, $end_date);
      $data['not_presetented'] = $this->M_supply_chain->not_presetented($start_date, $end_date);
      $data['presetented'] = $this->M_supply_chain->presetented($start_date, $end_date);
      $data['fu'] = $this->M_supply_chain->fu($start_date, $end_date);
      $data['ni'] = $this->M_supply_chain->ni($start_date, $end_date);
      $data['nq'] = $this->M_supply_chain->nq($start_date, $end_date);
      $data['sale'] = $this->M_supply_chain->sale($start_date, $end_date);
      $data['page_title'] = "Supply Chain";
      //$data['campaign'] = $this->M_app->get_campaign();

      $data['content'] = $this->load->view('supply_chain', $data, TRUE);
      $this->load->view('layout', $data);


		}

    public function count()
		{

			$data= array();

			$start_date = date("Y-m-d", strtotime($this->input->post('start_date')))." 00:00:01";
			$end_date = date("Y-m-d", strtotime($this->input->post('end_date')))." 23:59:00";

			$output = array(
					'start_date' => $this->input->post('start_date'),
					'end_date' =>$this->input->post('start_date')
					);
			$this->session->set_userdata($output);

      $data['leads'] = $this->M_supply_chain->leads($start_date, $end_date);
      $data['not_connect'] = $this->M_supply_chain->not_connect($start_date, $end_date);
      $data['connect'] = $this->M_supply_chain->connect($start_date, $end_date);
      $data['not_contact'] = $this->M_supply_chain->not_contact($start_date, $end_date);
      $data['contact'] = $this->M_supply_chain->contact($start_date, $end_date);
      $data['not_presetented'] = $this->M_supply_chain->not_presetented($start_date, $end_date);
      $data['presetented'] = $this->M_supply_chain->presetented($start_date, $end_date);
      $data['fu'] = $this->M_supply_chain->fu($start_date, $end_date);
      $data['ni'] = $this->M_supply_chain->ni($start_date, $end_date);
      $data['nq'] = $this->M_supply_chain->nq($start_date, $end_date);
      $data['sale'] = $this->M_supply_chain->sale($start_date, $end_date);
      $data['page_title'] = "Supply Chain";

      $data['content'] = $this->load->view('supply_chain', $data, TRUE);
      $this->load->view('layout', $data);

		}

		/*
		public function report_download()
		{
			$start_date = $this->InggrisTgl($_GET['start_date']);
			$end_date= $this->InggrisTgl($_GET['end_date']);

			$tgl = date("d F Y", strtotime($start_date));

			$data = array();

			$query = $this->db->query("SELECT a.user,a.lead_id,c.first_name,a.campaign_id,c.phone_number,a.event_time,b.status_connect FROM vicidial_agent_log a JOIN vicidial_statuses b ON a.`status`=b.`status` JOIN vicidial_list c ON a.lead_id=c.lead_id WHERE a.event_time BETWEEN '$start_date 00:00:00' AND '$end_date 23:00:00' AND (b.status_connect = 'CONNECT' OR b.status_connect = 'NOT CONNECT')");
			$select = $query->result();

			$objPHPExcel    = new PHPExcel();
			$baris = 1;

			$styleArray = array(
				'font'  => array(
						'bold'  => true,
						'size'  => 15,
				));

						// Auto Widt Colomn
						for($col = 'A'; $col !== 'I'; $col++) {
						    $objPHPExcel->getActiveSheet()
						        ->getColumnDimension($col)
						        ->setAutoSize(true);
						}
						// Tulis judul tabel
						$objPHPExcel->setActiveSheetIndex(0)
						->setCellValue('A'.$baris, 'NO')
						->setCellValue('B'.$baris, 'USER')
						->setCellValue('C'.$baris, 'LEAD ID')
						->setCellValue('D'.$baris, 'CUSTOMER NAME')
						->setCellValue('E'.$baris, 'CAMPAIGN ID')
						->setCellValue('F'.$baris, 'MOBILE NO')
						->setCellValue('G'.$baris, 'EVENT TIME')
						->setCellValue('H'.$baris, 'STATUS CONNECT');

				$baris=2; // pindah ke row bawahnya. (ke row 2)
				$no= 1;
				foreach ($select as $row) {
					$objPHPExcel->setActiveSheetIndex(0)
					->setCellValue('A'.$baris, $no)
					->setCellValue('B'.$baris, $row->user)
					->setCellValue('C'.$baris, $row->lead_id)
					->setCellValue('D'.$baris, $row->first_name)
					->setCellValue('E'.$baris, $row->campaign_id)
					->setCellValueExplicit('F'.$baris, $row->phone_number)
					->setCellValue('G'.$baris, $row->event_time)
					->setCellValue('H'.$baris, $row->status_connect);

$baris++; // pindah ke row bawahnya ($baris + 1)
$no++;

				}

					$objPHPExcel->getProperties()->setCreator("Anggi Fitrahandika")
									->setTitle("Report Supply Chain");
					$objPHPExcel->getActiveSheet()->setTitle('Sheet1');
					// Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama
					$objPHPExcel->setActiveSheetIndex(0);

					// Download (Excel2007)
					ob_end_clean();
					header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
					header('Chace-Control: no-store, no-cache, must-revalation');
					header('Chace-Control: post-check=0, pre-check=0', FALSE);
					header('Pragma: no-cache');
					header('Content-Type: application/vnd.ms-excel');
					header('Content-Disposition: attachment;filename="Report Data Export Supply Chain_'.date('d_m_Y').'.xls"');
					$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
					$objWriter->save('php://output');
					set_time_limit(0);
					ini_set('memory_limit', '1G');
					ob_end_clean();
					exit;
		}
		*/
}
