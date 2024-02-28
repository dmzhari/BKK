<?php
require '../inc/function.database.php';
require '../inc/function.default.php';
include "../vendor/tcpdf/tcpdf.php";

class CetakDataPDF extends TCPDF
{

    //Page header
    public function Header()
    {
        // Logo
        $image_file = '../assets/img/logo_bkk.jpeg';
        $this->Image($image_file, 15, 6, 0, 20, 'JPG', '', 'T', true, 300, '', false, false, 0, false, false, false);
        // $this->setJPEGQuality(90);
        $this->SetFont('helvetica', 'B', 20);
        $this->Cell(80);
        $this->Cell(0, 0, 'BKK' . ' - SMK MAHARDHIKA BATUJAJAR', 'C', 0, 'R');
        $this->Ln(8);
        $this->SetFont('helvetica', '', 10);
        $this->Cell(0, 0, 'SMK MAHARDHIKA BATUJAJAR', 'C', 0, 'R');
        $this->Ln(8);
        $this->SetFont('helvetica', 'B', 15);
        $this->Cell(0, 15, 'DATA LOWONGAN PEKERJAAN', "B", 0, "C");
        $this->Ln();
    }

    // Page footer
    public function Footer()
    {
        // Position at 15 mm from bottom
        $this->SetY(-15);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 10, 'BKK - SMK MAHARDHIKA BATUJAJAR ' . date("Y-m-d"), 0, false, 'L', 0, '', 0, false, 'T', 'M');
        $this->Cell(11, 10, 'Halaman ' . $this->getAliasNumPage() . '/' . $this->getAliasNbPages(), 0, false, 'R', 0, '', 0, false, 'T', 'M');
    }

    // Colored table
    public function ColoredTable($header, $data)
    {
        // Colors, line width and bold font
        $this->SetFillColor(255, 0, 0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');
        // Header
        $w = array(10, 77, 40, 50, 60, 30);
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->MultiCell($w[$i], 11, $header[$i], 1, 'C', 1, 0);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
        // Data
        $fill = 0;
        $i = 1;
        foreach ($data as $row) {
            $this->Cell($w[0], 30, $i, 'LR', false, 'C', $fill, '', 0, false, 'T', 'M');
            // $this->MultiCell($w[0], 30, $i, 'LR', 'C', $fill, 0);
            $this->MultiCell($w[1], 30, $row['judul_loker'], 'LR', 'L', $fill, 0);
            $this->MultiCell($w[2], 30, $row['posisi_loker'], 'LR', 'L', $fill, 0);
            // $this->MultiCell($w[3], 20, $row['penempatan_job'], 'LR', 'C', $fill, 0);
            $this->Cell($w[3], 30, $row['penempatan_job'], 'LR', false, 'C', $fill, '', 0, false, 'T', 'M');
            $this->MultiCell($w[4], 30, $row['syarat_job'], 'LR', 'L', $fill, 0);
            // $this->Cell($w[4], 20, $row['syarat_job'], 'LR', false, 'C', 0, '', 0, false, 'T', 'M');
            $this->Cell($w[5], 30, $row['tanggal_kadaluarsa'], 'LR', false, 'C', $fill, '', 0, false, 'T', 'M');
            // $this->MultiCell($w[5], 20, $row['tanggal_kadaluarsa'], 'LR', 'C', $fill, 0);
            $this->Ln();
            $fill = !$fill;
            $i++;
        }
        $this->Cell(array_sum($w), 0, '', 'T');
    }
}

// create new PDF document
$pdf = new CetakDataPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator('DmzHari');
$pdf->SetAuthor('DmzHari');
$pdf->SetTitle('Data Lowongan');
$pdf->SetSubject('Data Lowongan');
$pdf->SetKeywords('Data Laporan Loker, Loker, Data Lowongan, Pencaker');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, 'BKK SMK MAHARDHIKA' . ' BATUJAJAR', "SMK MAHARDHIKA BATUJAJAR\nhttps://smkmahardhika.sch.id");

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 39, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set font
$pdf->SetFont('helvetica', '', 12);

// add a page
$pdf->AddPage();

// column titles
$header = array('No', 'Judul Loker', 'Posisi Loker', 'Penempatan Loker', 'Persyaratan', 'Tanggal Kadaluarsa');

// print colored table
$id = $_SESSION['id_partner'];
$data = myquery("SELECT * FROM tb_loker WHERE id_user = '$id'");
$pdf->ColoredTable($header, $data);

// close and output PDF document
ob_end_clean();
$user = myquery("SELECT * FROM tb_partner WHERE id = '$id'");
$pdf->Output("Data_Loker_" . $user[0]['nama_perusahaan'] . ".pdf", 'I');
