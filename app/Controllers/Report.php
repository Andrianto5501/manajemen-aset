<?php

namespace App\Controllers;

use TCPDF;
use App\Models\AsetModel;
use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Spreadsheet;

class Report extends BaseController
{
    protected $asetModel;

    public function __construct()
    {
        $this->asetModel = new AsetModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Aset',
            'barang' => $this->asetModel->findAll(),
        ];

        return view('laporan/index', $data);
    }

    public function exportExcel()
    {
        $dataBarang =  $this->asetModel->findAll();

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nomor')
            ->setCellValue('C1', 'Sub Nomor')
            ->setCellValue('D1', 'Satuan')
            ->setCellValue('E1', 'Kode Barang')
            ->setCellValue('F1', 'No Aset')
            ->setCellValue('G1', 'Tercatat')
            ->setCellValue('H1', 'Kode Lokasi')
            ->setCellValue('I1', 'Kode Perkap')
            ->setCellValue('J1', 'Kondisi Aset')
            ->setCellValue('K1', 'Uraian Aset')
            ->setCellValue('L1', 'Uraian Perkap')
            ->setCellValue('M1', 'Kode Ruang')
            ->setCellValue('N1', 'Uraian Ruang')
            ->setCellValue('O1', 'Catatan')
            ->setCellValue('P1', 'Kondisi')
            ->setCellValue('Q1', 'Nominal Aset')
            ->setCellValue('R1', 'Foto Aset')
            ->setCellValue('S1', 'Tanggal Pengadaan')
            ->setCellValue('T1', 'Sumber Pengadaan')
            ->setCellValue('U1', 'QR Code')
            ->setCellValue('V1', 'User Penginput');

        $column = 2;
        $i = 1;
        // tulis data mobil ke cell
        foreach ($dataBarang as $data) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $column, $i++)
                ->setCellValue('B' . $column, $data['nomor'])
                ->setCellValue('C' . $column, $data['sub_nomor'])
                ->setCellValue('D' . $column, $data['satuan'])
                ->setCellValue('E' . $column, $data['kode_barang'])
                ->setCellValue('F' . $column, $data['no_aset'])
                ->setCellValue('G' . $column, $data['tercatat'])
                ->setCellValue('H' . $column, $data['kode_lokasi'])
                ->setCellValue('I' . $column, $data['kode_perkap'])
                ->setCellValue('J' . $column, $data['kondisi_aset'])
                ->setCellValue('K' . $column, $data['uraian_aset'])
                ->setCellValue('L' . $column, $data['uraian_perkap'])
                ->setCellValue('M' . $column, $data['kode_ruang'])
                ->setCellValue('N' . $column, $data['uraian_ruang'])
                ->setCellValue('O' . $column, $data['catatan'])
                ->setCellValue('P' . $column, $data['kondisi'])
                ->setCellValue('Q' . $column, $data['nominal_aset'])
                ->setCellValue('R' . $column, $data['foto'])
                ->setCellValue('S' . $column, $data['tanggal_pengadaan'])
                ->setCellValue('T' . $column, $data['sumber_pengadaan'])
                ->setCellValue('U' . $column, $data['qr_code'])
                ->setCellValue('V' . $column, $data['user_penginput']);
            $column++;
        }
        // tulis dalam format .xlsx
        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);
        $fileName = 'Data Barang';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    public function printPdf()
    {
        // create new PDF document
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        // set document information
        $pdf->SetCreator(PDF_CREATOR);
        $pdf->SetAuthor('Pengelola');
        $pdf->SetTitle('PT Satria Dirgantara');
        $pdf->SetSubject('Data Aset');
        $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

        // set default header data
        $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE . ' 001', PDF_HEADER_STRING, array(0, 64, 255), array(0, 64, 128));
        $pdf->setFooterData(array(0, 64, 0), array(0, 64, 128));

        // set header and footer fonts
        $pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
        $pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

        // set default monospaced font
        $pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

        // set margins
        $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
        $pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

        // set auto page breaks
        $pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

        // set image scale factor
        $pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

        // set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once(dirname(__FILE__) . '/lang/eng.php');
            $pdf->setLanguageArray($l);
        }

        // ---------------------------------------------------------

        // set default font subsetting mode
        $pdf->setFontSubsetting(true);

        // Set font
        // dejavusans is a UTF-8 Unicode font, if you only need to
        // print standard ASCII chars, you can use core fonts like
        // helvetica or times to reduce file size.
        $pdf->SetFont('dejavusans', '', 14, '', true);

        // Add a page
        // This method has several options, check the source code documentation for more information.
        $pdf->AddPage('L', 'A4');

        // set text shadow effect
        $pdf->setTextShadow(array('enabled' => true, 'depth_w' => 0.2, 'depth_h' => 0.2, 'color' => array(196, 196, 196), 'opacity' => 1, 'blend_mode' => 'Normal'));

        // ---------------------------------------------------------

        // Close and output PDF document
        // This method has several options, check the source code documentation for more information.
        $pdf->Output('example_001.pdf', 'I');

        //============================================================+
        // END OF FILE
        //============================================================+
    }
}
