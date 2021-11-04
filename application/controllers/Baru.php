<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baru extends CI_Controller {

	function __construct() {
        parent::__construct();
        $this->load->library('pdf');
    }

	public function ExportExcel()
	{
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		$excel = new PHPExcel();

		$style_col = array(
			'font' => array('bold' => true),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);

		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "Paket Pekerjaan");
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Penyedia Jasa");
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Tahun Anggaran");

		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);

		$kategori = $this->Model_global->getDataAll('sda');
		$numrow = 2;
		foreach ($kategori as $key) {
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $key->paket_pekerjaan);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $key->penyedia_jasa);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $key->tahun_anggaran);

			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			
			$numrow += 1;
			//$excel->setActiveSheetIndex(0)->setCellValueExplicit('E'.$numrow, $data['telp'], PHPExcel_Cell_DataType::TYPE_STRING);
		}

		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		$excel->getActiveSheet(0)->setTitle("Laporan Perencanaan SDA");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Laporan Perencanaan SDA.xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function pdf()
	{

		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'NO',1,0);
        $pdf->Cell(200,6,'PAKET PEKERJAAN',1,0);
        $pdf->Cell(35,6,'PENYEDIA JASA',1,0);
        $pdf->Cell(37,6,'TAHUN ANGGARAN',1,1);
        $pdf->SetFont('Arial','',10);
        $sda = $this->Model_global->getDataAll('sda');
        $no = 0;
        foreach ($sda as $row){
            /*$pdf->MultiCell(200,6,$row->paket_pekerjaan,1,'L');
            $pdf->Cell(35,6,$row->penyedia_jasa,1,'L');
            $pdf->Cell(37,6,$row->tahun_anggaran,1,'L');*/
	        $cellWidth=200; //lebar sel
			$cellHeight=5; //tinggi sel satu baris normal
			
			//periksa apakah teksnya melibihi kolom?
			if($pdf->GetStringWidth($row->paket_pekerjaan) < $cellWidth){
				//jika tidak, maka tidak melakukan apa-apa
				$line=1;
			}else{
				//jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
				//dengan memisahkan teks agar sesuai dengan lebar sel
				//lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
				
				$textLength=strlen($row->paket_pekerjaan);	//total panjang teks
				$errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
				$startChar=0;		//posisi awal karakter untuk setiap baris
				$maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
				$textArray=array();	//untuk menampung data untuk setiap baris
				$tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
				
				while($startChar < $textLength){ //perulangan sampai akhir teks
					//perulangan sampai karakter maksimum tercapai
					while( 
					$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
					($startChar+$maxChar) < $textLength ) {
						$maxChar++;
						$tmpString=substr($row->paket_pekerjaan,$startChar,$maxChar);
					}
					//pindahkan ke baris berikutnya
					$startChar=$startChar+$maxChar;
					//kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
					array_push($textArray,$tmpString);
					//reset variabel penampung
					$maxChar=0;
					$tmpString='';
					
				}
				//dapatkan jumlah baris
				$line=count($textArray);
			}
			
		    //tulis selnya
		    $pdf->SetFillColor(255,255,255);
			$pdf->Cell(10,($line * $cellHeight),$no++,1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
			
			//memanfaatkan MultiCell sebagai ganti Cell
			//atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
			//ingat posisi x dan y sebelum menulis MultiCell
			$xPos=$pdf->GetX();
			$yPos=$pdf->GetY();
			$pdf->MultiCell($cellWidth,$cellHeight,$row->paket_pekerjaan,1);
			
			//kembalikan posisi untuk sel berikutnya di samping MultiCell 
		    //dan offset x dengan lebar MultiCell
			$pdf->SetXY($xPos + $cellWidth , $yPos);
			
			$pdf->Cell(35,($line * $cellHeight),$row->penyedia_jasa,1,0); //sesuaikan ketinggian dengan jumlah garis
		    $pdf->Cell(37,($line * $cellHeight),$row->tahun_anggaran,1,1); //sesuaikan ketinggian dengan jumlah garis
	    }
		$pdf->Output();
    }
	public function ExportExcel2()
	{
		include APPPATH.'third_party/PHPExcel/PHPExcel.php';
		$excel = new PHPExcel();

		$style_col = array(
			'font' => array('bold' => true),
			'alignment' => array(
				'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);

		$style_row = array(
			'alignment' => array(
				'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
			),
			'borders' => array(
				'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
				'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
			)
		);

		$excel->setActiveSheetIndex(0)->setCellValue('A1', "Paket Pekerjaan");
		$excel->setActiveSheetIndex(0)->setCellValue('B1', "Lokasi");
		$excel->setActiveSheetIndex(0)->setCellValue('C1', "Output");
		$excel->setActiveSheetIndex(0)->setCellValue('D1', "Outcome");
		$excel->setActiveSheetIndex(0)->setCellValue('E1', "Penyedia jasa");
		$excel->setActiveSheetIndex(0)->setCellValue('F1', "Tahun Anggaran");
		$excel->setActiveSheetIndex(0)->setCellValue('G1', "Biaya");

		$excel->getActiveSheet()->getStyle('A1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('B1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('C1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('D1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('E1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('F1')->applyFromArray($style_col);
		$excel->getActiveSheet()->getStyle('G1')->applyFromArray($style_col);

		$kategori = $this->Model_global->getDataAll('kontruksi');
		$numrow = 2;
		foreach ($kategori as $key) {
			$excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $key->paket_pekerjaan);
			$excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $key->lokasi);
			$excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $key->output);
			$excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $key->outcome);
			$excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $key->penyedia_jasa);
			$excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $key->tahun_anggaran);
			$excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $key->biaya);
			
			$excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
			$excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
			
			$numrow += 1;
			//$excel->setActiveSheetIndex(0)->setCellValueExplicit('E'.$numrow, $data['telp'], PHPExcel_Cell_DataType::TYPE_STRING);
		}

		$excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

		$excel->getActiveSheet(0)->setTitle("Laporan Perencanaan SDA");
		$excel->setActiveSheetIndex(0);

		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
		header('Content-Disposition: attachment; filename="Laporan Perencanaan kontruksi.xlsx"');
		header('Cache-Control: max-age=0');

		$write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
		$write->save('php://output');
	}

	public function pdf2()
	{

		$pdf = new FPDF('l','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(10,6,'NO',1,0);
        $pdf->Cell(200,6,'PAKET PEKERJAAN',1,0);
        $pdf->Cell(35,6,'LOKASI',1,0);
        $pdf->Cell(37,6,'OUTPUT',1,1);
		$pdf->Cell(37,6,'OUTCOME',1,1);
		$pdf->Cell(200,6,'PENYEDIA JASA',1,0);
		$pdf->Cell(37,6,'TAHUN ANGGARAN',1,1);
		$pdf->Cell(37,6,'BIAYA',1,1);
		
        $pdf->SetFont('Arial','',10);
        $kontruksi = $this->Model_global->getDataAll('kontruksi');
        $no = 0;
        foreach ($kontruksi as $row){
            /*$pdf->MultiCell(200,6,$row->paket_pekerjaan,1,'L');
            $pdf->Cell(35,6,$row->penyedia_jasa,1,'L');
            $pdf->Cell(37,6,$row->tahun_anggaran,1,'L');*/
	        $cellWidth=200; //lebar sel
			$cellHeight=5; //tinggi sel satu baris normal
			
			//periksa apakah teksnya melibihi kolom?
			if($pdf->GetStringWidth($row->paket_pekerjaan) < $cellWidth){
				//jika tidak, maka tidak melakukan apa-apa
				$line=1;
			}else{
				//jika ya, maka hitung ketinggian yang dibutuhkan untuk sel akan dirapikan
				//dengan memisahkan teks agar sesuai dengan lebar sel
				//lalu hitung berapa banyak baris yang dibutuhkan agar teks pas dengan sel
				
				$textLength=strlen($row->paket_pekerjaan);	//total panjang teks
				$errMargin=5;		//margin kesalahan lebar sel, untuk jaga-jaga
				$startChar=0;		//posisi awal karakter untuk setiap baris
				$maxChar=0;			//karakter maksimum dalam satu baris, yang akan ditambahkan nanti
				$textArray=array();	//untuk menampung data untuk setiap baris
				$tmpString="";		//untuk menampung teks untuk setiap baris (sementara)
				
				while($startChar < $textLength){ //perulangan sampai akhir teks
					//perulangan sampai karakter maksimum tercapai
					while( 
					$pdf->GetStringWidth( $tmpString ) < ($cellWidth-$errMargin) &&
					($startChar+$maxChar) < $textLength ) {
						$maxChar++;
						$tmpString=substr($row->paket_pekerjaan,$startChar,$maxChar);
					}
					//pindahkan ke baris berikutnya
					$startChar=$startChar+$maxChar;
					//kemudian tambahkan ke dalam array sehingga kita tahu berapa banyak baris yang dibutuhkan
					array_push($textArray,$tmpString);
					//reset variabel penampung
					$maxChar=0;
					$tmpString='';
					
				}
				//dapatkan jumlah baris
				$line=count($textArray);
			}
			
		    //tulis selnya
		    $pdf->SetFillColor(255,255,255);
			$pdf->Cell(10,($line * $cellHeight),$no++,1,0,'C',true); //sesuaikan ketinggian dengan jumlah garis
			
			//memanfaatkan MultiCell sebagai ganti Cell
			//atur posisi xy untuk sel berikutnya menjadi di sebelahnya.
			//ingat posisi x dan y sebelum menulis MultiCell
			$xPos=$pdf->GetX();
			$yPos=$pdf->GetY();
			$pdf->MultiCell($cellWidth,$cellHeight,$row->paket_pekerjaan,1);
			
			//kembalikan posisi untuk sel berikutnya di samping MultiCell 
		    //dan offset x dengan lebar MultiCell
			$pdf->SetXY($xPos + $cellWidth , $yPos);
			
			$pdf->Cell(35,($line * $cellHeight),$row->penyedia_jasa,1,0); //sesuaikan ketinggian dengan jumlah garis
		    $pdf->Cell(37,($line * $cellHeight),$row->tahun_anggaran,1,1); //sesuaikan ketinggian dengan jumlah garis
	    }
		$pdf->Output();
		
    }
	public function search()
	{
		$keyword = $this->input->post('keyword');
		$data['kontruksi']=$this->Model_global->get_keyword($keyword);
		$this->load->view('kontruksi',$data);		
	}
}
