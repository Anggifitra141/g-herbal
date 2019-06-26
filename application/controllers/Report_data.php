
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_data extends CI_Controller {
  /**
   *  =======   Application By    : Team @GetDial  2018    =======
   *  =======   Version           : V.1.0                  =======
   *  ===========           Copyright 2018          ==============
  */
    public function __construct()
    {
      parent::__construct();
      $this->load->database();
      $this->load->library('PHPExcel');
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
    	$tanggal="$tgl/$bln/$thn";
    	return $tanggal;
    }

    public function get_campaign_name($mobile_no)
    {
      $this->db->select('vicidial_lists.campaign_id');
      $this->db->from('vicidial_lists');
      $this->db->join('vicidial_list', 'vicidial_lists.list_id = vicidial_list.list_id');
      $this->db->where('vicidial_list.phone_number', $mobile_no);
      $q = $this->db->get()->result();
      foreach ($q as $row) {
        $data = $row->campaign_id;
      }
      return $data;
    }

    public function download()
    {


          $date_option = $this->input->post('date_option');
          $start = $this->input->post('start_date');
          $end= $this->input->post('end_date');
          $start_date = date("Y-m-d", strtotime($start))." 00:00:00";
          $end_date = date("Y-m-d", strtotime($end))." 23:00:00";
          $status_filter = $this->input->post('status_filter');

          $tgl = date("d F Y", strtotime($start_date));

          $data = array();

          if(!empty($start_date)){
            $this->db->where('activation_date >=', $start_date);
          }
          if(!empty($end_date)){
            $this->db->where('activation_date <=', $end_date);
          }

          if(!empty($status_filter)){
            $this->db->where('status_data', $status_filter);
          }else{
            $this->db->where('status_data !=', 'CALLBACK');
          }
          if(!empty($payment_option)){
            $this->db->where('payment_option', $payment_option);
          }

          $this->db->select('*');
          $this->db->from('data');
          $this->db->join('booking', 'booking.booking_formid = data.formid');

          $select = $this->db->get()->result();

          $objPHPExcel    = new PHPExcel();
          $baris = 1;

          $styleArray = array('alignment' => array('horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER));
        // Auto Widt Colomn
              for($col = 'A'; $col !== 'AI'; $col++) {
                  $objPHPExcel->getActiveSheet()
                      ->getColumnDimension($col)
                      ->setAutoSize(true);
              }
              $objPHPExcel->getActiveSheet()->getStyle('A1:AI1')->applyFromArray($styleArray);
              // Tulis judul tabel
              $objPHPExcel->setActiveSheetIndex(0)
              ->setCellValue('M1', 'PAKET RAMADHAN (BODY & WEIGHT)')->mergeCells('M1:O1')
              ->setCellValue('P1', 'BODY')->mergeCells('P1:R1')
              ->setCellValue('S1', 'WEIGHT')->mergeCells('S1:U1')
              ->setCellValue('V1', 'SKIN')->mergeCells('V1:X1')

              ->setCellValue('A2', 'NAMA')
              ->setCellValue('B2', 'NO HP')
              ->setCellValue('C2', 'DOB')
              ->setCellValue('D2', 'JENIS KELAMIN')
              ->setCellValue('E2', 'MINUM 2 KAPSUL SECARA RUTIN ?')
              ->setCellValue('F2', 'APAKAH SETIAP PAKET YANG DI BELI SELALU DI HABISKAN ?')
              ->setCellValue('G2', 'APAKAH ANDA MERASAKAN MANFAAT DAN HASILNYA ?')
              ->setCellValue('H2', 'JIKA YA, BODY')
              ->setCellValue('I2', 'JIKA YA, WEIGHT')
              ->setCellValue('J2', 'JIKA YA, SKIN')
              ->setCellValue('K2', 'EMAIL')
              ->setCellValue('L2', 'PEMESANAN')
              ->setCellValue('M2', 'HARGA') // Paket ramadhan
              ->setCellValue('N2', 'QUANTITY')
              ->setCellValue('O2', 'SUB TOTAL')
              ->setCellValue('P2', 'HARGA') // body
              ->setCellValue('Q2', 'QUANTITY')
              ->setCellValue('R2', 'SUB TOTAL')
              ->setCellValue('S2', 'HARGA') // weight
              ->setCellValue('T2', 'QUANTITY')
              ->setCellValue('U2', 'SUB TOTAL')
              ->setCellValue('V2', 'HARGA') // skin
              ->setCellValue('W2', 'QUANTITY')
              ->setCellValue('X2', 'SUB TOTAL')
              ->setCellValue('Y2', 'TOTAL')
              ->setCellValue('Z2', 'ALAMAT')
              ->setCellValue('AA2', 'KOTA')
              ->setCellValue('AB2', 'KODE POS')
              ->setCellValue('AC2', 'NAMA PENERIMA')
              ->setCellValue('AD2', 'NO HP PENERIMA')
              ->setCellValue('AE2', 'NO KARTU KREDIT')
              ->setCellValue('AF2', 'EXPIRED')
              ->setCellValue('AG2', 'AGENT')
              ->setCellValue('AH2', 'STATUS');


            $baris=3; // pindah ke row bawahnya. (ke row 2)
            $no= 1;
            $ex = $objPHPExcel->setActiveSheetIndex(0);
            foreach ($select as $row) {
              $ex->setCellValue('A'.$baris, $row->name);
              $ex->setCellValueExplicit('B'.$baris, $row->mobile_phone);
              $ex->setCellValue('C'.$baris, date('d-m-Y', strtotime($row->dob)));
              $ex->setCellValue('D'.$baris, $row->gender);
              $ex->setCellValue('E'.$baris, $row->question1);
              $ex->setCellValue('F'.$baris, $row->question2);
              $ex->setCellValue('G'.$baris, $row->question3);
              $ex->setCellValue('H'.$baris, $row->benefit_body);
              $ex->setCellValue('I'.$baris, $row->benefit_weight);
              $ex->setCellValue('J'.$baris, $row->benefit_skin);
              $ex->setCellValue('K'.$baris, $row->email_data);
              $ex->setCellValue('L'.$baris, $row->booking);
              if($row->booking == 'Ya'){
              $ex->setCellValueExplicit('M'.$baris, $row->harga_paket_ramadhan);
              $ex->setCellValueExplicit('N'.$baris, $row->qty_paket_ramadhan);
              $ex->setCellValueExplicit('O'.$baris, $row->sub_total_paket_ramadhan);
              $ex->setCellValueExplicit('P'.$baris, $row->harga_body);
              $ex->setCellValueExplicit('Q'.$baris, $row->qty_body);
              $ex->setCellValueExplicit('R'.$baris, $row->sub_total_body);
              $ex->setCellValueExplicit('S'.$baris, $row->harga_weight);
              $ex->setCellValueExplicit('T'.$baris, $row->qty_weight);
              $ex->setCellValueExplicit('U'.$baris, $row->sub_total_weight);
              $ex->setCellValueExplicit('V'.$baris, $row->harga_skin);
              $ex->setCellValueExplicit('W'.$baris, $row->qty_skin);
              $ex->setCellValueExplicit('X'.$baris, $row->sub_total_skin);
              $ex->setCellValueExplicit('Y'.$baris, $row->total);
              }
              $ex->setCellValue('Z'.$baris, $row->address);
              $ex->setCellValue('AA'.$baris, $row->city);
              $ex->setCellValueExplicit('AB'.$baris, $row->zip);
              $ex->setCellValue('AC'.$baris, $row->recipient_name);
              $ex->setCellValueExplicit('AD'.$baris, $row->recipient_hp);
              $ex->setCellValueExplicit('AE'.$baris, $row->credit_card);
              $ex->setCellValue('AF'.$baris, $row->expired);
              $ex->setCellValue('AG'.$baris, $row->agent);
              $ex->setCellValue('AH'.$baris, $row->status_data);


            $baris++; // pindah ke row bawahnya ($baris + 1)


            }

            $objPHPExcel->getProperties()->setCreator("Anggi Fitrahandika")
                    ->setTitle("Report Data");
            $objPHPExcel->getActiveSheet()->setTitle('Sheet1');
            // Set sheet yang aktif adalah index pertama, jadi saat dibuka akan langsung fokus ke sheet pertama


            // Sheet 2
            $objPHPExcel->createSheet()

            ->setCellValue('C1', 'PAKET RAMADHAN (BODY & WEIGHT)')->mergeCells('C1:E1')
            ->setCellValue('F1', 'BODY')->mergeCells('F1:H1')
            ->setCellValue('I1', 'WEIGHT')->mergeCells('I1:K1')
            ->setCellValue('L1', 'WEIGHT')->mergeCells('L1:N1')

            ->setCellValue('A2', 'NAMA')
            ->setCellValue('B2', 'NO HP')
            ->setCellValue('C2', 'HARGA')//paket ramdhan
            ->setCellValue('D2', 'QUANTITY')
            ->setCellValue('E2', 'SUB TOTAL')
            ->setCellValue('F2', 'HARGA')// body
            ->setCellValue('G2', 'QUANTITY')
            ->setCellValue('H2', 'SUB TOTAL')
            ->setCellValue('I2', 'HARGA') //weight
            ->setCellValue('J2', 'QUANTITY')
            ->setCellValue('K2', 'SUB TOTAL')
            ->setCellValue('L2', 'HARGA') // skin
            ->setCellValue('M2', 'QUANTITY')
            ->setCellValue('N2', 'SUB TOTAL')
            ->setCellValue('O2', 'TOTAL')// total
            ->setCellValue('P2', 'ALAMAT') // body
            ->setCellValue('Q2', 'KOTA')
            ->setCellValue('R2', 'KODE POS')
            ->setCellValue('S2', 'NAMA PENERIMA')
            ->setCellValue('T2', 'NO HP PENERIMA');

            for($col = 'A'; $col !== 'AI'; $col++) {
                $objPHPExcel->getActiveSheet(1)
                    ->getColumnDimension($col)
                    ->setAutoSize(true);
            }
            $objPHPExcel->getActiveSheet(1)->getStyle('A1:U1')->applyFromArray($styleArray);
            $baris2=3; // pindah ke row bawahnya. (ke row 2)
            $no= 1;
            $ex = $objPHPExcel->setActiveSheetIndex(1);
            foreach ($select as $row) {

              $ex->setCellValue('A'.$baris2, $row->name);
              $ex->setCellValueExplicit('B'.$baris2, $row->mobile_phone);
              if($row->booking == 'Ya'){
              $ex->setCellValueExplicit('C'.$baris2, $row->harga_paket_ramadhan);
              $ex->setCellValueExplicit('D'.$baris2, $row->qty_paket_ramadhan);
              $ex->setCellValueExplicit('E'.$baris2, $row->sub_total_paket_ramadhan);
              $ex->setCellValueExplicit('F'.$baris2, $row->harga_body);
              $ex->setCellValueExplicit('G'.$baris2, $row->qty_body);
              $ex->setCellValueExplicit('H'.$baris2, $row->sub_total_body);
              $ex->setCellValueExplicit('I'.$baris2, $row->harga_weight);
              $ex->setCellValueExplicit('J'.$baris2, $row->qty_weight);
              $ex->setCellValueExplicit('K'.$baris2, $row->sub_total_weight);
              $ex->setCellValueExplicit('L'.$baris2, $row->harga_skin);
              $ex->setCellValueExplicit('M'.$baris2, $row->qty_skin);
              $ex->setCellValueExplicit('N'.$baris2, $row->sub_total_skin);
              $ex->setCellValueExplicit('O'.$baris2, $row->total);
              }
              $ex->setCellValueExplicit('P'.$baris2, $row->address);
              $ex->setCellValueExplicit('Q'.$baris2, $row->city);
              $ex->setCellValueExplicit('R'.$baris2, $row->zip);
              $ex->setCellValueExplicit('S'.$baris2, $row->recipient_name);
              $ex->setCellValueExplicit('T'.$baris2, $row->recipient_hp);

              $baris2++;
            }
            $objPHPExcel->getActiveSheet()->setTitle('Sheet2');
            // Download (Excel2007)
            ob_end_clean();
            header('Last-Modified:'. gmdate("D, d M Y H:i:s").'GMT');
            header('Chace-Control: no-store, no-cache, must-revalation');
            header('Chace-Control: post-check=0, pre-check=0', FALSE);
            header('Pragma: no-cache');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Data_Aftersales_'.date('d_m_Y').'.xls"');
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            set_time_limit(0);
            ini_set('memory_limit', '1G');
            ob_end_clean();
            exit;

    }

}
