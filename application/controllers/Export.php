<?php
class Export extends CI_Controller {
        public function __construct()
        {
                parent::__construct();
        }
        public function index()
        {
                $this->load->view('export_view');
        }
        public function download()
        {
                //load our new PHPExcel library
                $this->load->library('excel');
                
                $excel = $this->excel;
                $excel->setActiveSheetIndex(0)->setTitle('Export Data');
                //table header
                $excel->getActiveSheet()->setCellValue('A1', 'No');
                $excel->getActiveSheet()->setCellValue('B1', 'Nama Presiden');
                $excel->getActiveSheet()->setCellValue('C1', 'Lama Menjabat');
                //table body
                $excel->getActiveSheet()->setCellValue('A2', '1');
                $excel->getActiveSheet()->setCellValue('B2', 'Soekarno');
                $excel->getActiveSheet()->setCellValue('C2', '4 Tahun');
                $excel->getActiveSheet()->setCellValue('A3', '2');
                $excel->getActiveSheet()->setCellValue('B3', 'Soeharto');
                $excel->getActiveSheet()->setCellValue('C3', '32 Tahun');
                $excel->getActiveSheet()->setCellValue('A4', '3');
                $excel->getActiveSheet()->setCellValue('B4', 'BJ Habibie');
                $excel->getActiveSheet()->setCellValue('C4', '1 Tahun');
                $excel->getActiveSheet()->setCellValue('A5', '4');
                $excel->getActiveSheet()->setCellValue('B5', 'Abdurahman Wahid');
                $excel->getActiveSheet()->setCellValue('C5', '2 Tahun');
                $excel->getActiveSheet()->setCellValue('A6', '5');
                $excel->getActiveSheet()->setCellValue('B6', 'Megawati');
                $excel->getActiveSheet()->setCellValue('C6', '3 Tahun');
                $excel->getActiveSheet()->setCellValue('A7', '6');
                $excel->getActiveSheet()->setCellValue('B7', 'SB Yudhoyono');
                $excel->getActiveSheet()->setCellValue('C7', '10 Tahun');
                $excel->getActiveSheet()->setCellValue('A8', '7');
                $excel->getActiveSheet()->setCellValue('B8', 'Joko Widodo');
                $excel->getActiveSheet()->setCellValue('C8', '5 Tahun');
                //save file         
                $filename='export_data.xls';
                header('Content-Type: application/vnd.ms-excel');
                header('Content-Disposition: attachment;filename="'.$filename.'"');
                header('Cache-Control: max-age=0');
                            
                $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
                $objWriter->save('php://output');
        }
}