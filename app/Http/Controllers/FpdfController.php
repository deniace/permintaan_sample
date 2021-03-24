<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Codedge\Fpdf\Fpdf\Fpdf;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class FpdfController extends Controller
{
    //
    public function index()
    {
        $fpdf = new Fpdf;

        $fpdf->AddPage('P', 'a4');

        $fpdf->SetMargins(5.0, 2.0);
        // setting jenis font yang akan digunakan
        $fpdf->SetFont('Arial', 'B', 12);
        $fpdf->Cell(10, 4, '', 0, 1);
        $fpdf->Cell(160, 6, 'TEST BIKIN PDF', 0, 1, 'C');
        $fpdf->Cell(160, 6, 'INI LAGI TEST', 0, 1, 'C');
        $fpdf->SetFont('Arial', 'B', 14);
        $fpdf->Output();
        exit();
        ///asdfasdfasf
    }
    /**
     * menampilkan pdf berdasarkan id transaksi
     * @param : $id = id transaksi
     */
    public function show($id)
    {
        // menampilkan detail
        $transaction = Transaction::find($id);
        $trx = Transaction::where("id_trx", $transaction->id_trx)->get();
        $fpdf = new Fpdf;

        $fpdf->AddPage('P', 'a4');

        // setting jenis font yang akan digunakan
        $fpdf->SetFont('Times', '', 10);

        $fpdf->Cell(45, 6, 'No', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->Cell(67, 6, $transaction->id_transaction, 0, 0);
        $fpdf->Cell(18, 6, 'AREA', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->Cell(54, 6, $transaction->area->nama_area, 0, 1);

        $fpdf->Cell(45, 6, 'SALES NAME', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->Cell(67, 6, $transaction->sales->name, 0, 0);
        $fpdf->Cell(18, 6, 'DIVISION', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->Cell(54, 6, $transaction->division->nama_division, 0, 1);

        $fpdf->Cell(45, 6, 'CUSTOMER NAME', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->Cell(142, 6, $transaction->customer, 0, 1);

        $fpdf->Cell(45, 6, 'CUSTOMER ADDRESS**', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->Cell(142, 6, $transaction->alamat_customer, 0, 1);
        $fpdf->Cell(190, 6, "", 0, 1);

        $fpdf->Cell(48, 6, '', 0, 0);
        $fpdf->Cell(15, 6, 'Phone', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->Cell(50, 6, $transaction->telp_customer, 0, 0);
        $fpdf->Cell(10, 6, 'PIC', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->Cell(60, 6, "", 0, 1);

        $fpdf->Cell(45, 6, 'END APPLICATION', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->Cell(142, 6, $transaction->end_application, 0, 1);

        $fpdf->Cell(45, 6, 'EXPECTED DELIVERY', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->Cell(142, 6, 'SAMPLES ARE PREPARED IN THE LABORATORY IN 2x24 HOURS ACCORDING TO THE', 0, 1);
        $fpdf->Cell(48, 6, '', 0, 0);
        $fpdf->Cell(142, 6, 'STANDARDS OF THE SAMPLES IN RETAIN IF THE SAMPLE IS NOT AVAIABLE IN', 0, 1);
        $fpdf->Cell(48, 6, '', 0, 0);
        $fpdf->Cell(142, 6, 'RETAIN AND QUANTITY DOES NOT ACCORD THE STANDARDS, THEN WILL BE', 0, 1);
        $fpdf->Cell(48, 6, '', 0, 0);
        $fpdf->Cell(142, 6, 'INFORMED BY EMAIL', 0, 1);

        // table
        $fpdf->SetFont('Times', 'B', 10);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->Cell(135, 6, 'FILLED BY SALES', 1, 0, 'C', 1);
        $fpdf->SetFillColor(230, 230, 230);
        $fpdf->Cell(55, 6, 'Filled by LAB', 1, 1, 'C',  1);

        $fpdf->Cell(10, 15, 'NO', 1, 0, 'C');
        $fpdf->Cell(25, 15, 'Product', 1, 0, 'C');
        $fpdf->Cell(25, 15, 'Supplier', 1, 0, 'C');
        $fpdf->MultiCell(17, 5, "Qty\nRequest\n(gr or kg)", 1, "C"); // multicell
        $fpdf->SetXY(87, 82);
        $fpdf->MultiCell(33, 5, "Doc Request\nSpec, CoA, MSDS,\nHalal, etc", 1, "C"); // multicell
        $fpdf->SetXY(120, 82);
        $fpdf->MultiCell(25, 7.5, "Expected\nDelivery", 1, "C"); // multicell
        $fpdf->SetXY(145, 82);
        $fpdf->MultiCell(25, 7.5, "Actual Time\nof Delivery", 1, "C"); // multicell
        $fpdf->SetXY(170, 82);
        $fpdf->MultiCell(30, 7.5, "Remarks\n(Tracking No, etc)", 1, "C"); // multicell

        // isian
        $no = 1;
        foreach ($trx as $value) {
            $fpdf->Cell(10, 10, $no, 1, 0, 'C');
            $fpdf->Cell(25, 10, $value->product_name, 1, 0, 'C');
            $fpdf->Cell(25, 10, $value->supplier, 1, 0, 'C');
            $fpdf->Cell(17, 10, $value->qty, 1, 0, 'C');
            $fpdf->Cell(33, 10, '', 1, 0, 'C');
            $fpdf->Cell(25, 10, '', 1, 0, 'C');
            $fpdf->Cell(25, 10, '', 1, 0, 'C');
            $fpdf->Cell(30, 10, '', 1, 1, 'C');
            $no++;
        }

        // date("d-M-Y", strtotime($value->tgl))

        $fpdf->SetFont('Times', '', 8);
        $fpdf->Cell(55, 6, 'Information from LAB : Tiki (15:00 WIB), Rosalia & Post Offiece (12:00 WIB), Sekkai (16:30 WIB)', 0, 1, 'L');

        $fpdf->SetFont('Times', '', 10);
        $fpdf->Cell(45, 6, 'NOTE FROM SALES', 0, 0);
        $fpdf->Cell(3, 6, ':', 0, 0);
        $fpdf->MultiCell(142, 6, $transaction->note, 0, "L", 0, 3); // multicell

        $fpdf->SetXY(12, 198);
        $fpdf->Cell(190, 4, '', 0, 1);
        $fpdf->Cell(47.5, 6, 'Requested by', 0, 0, "C");
        $fpdf->Cell(47.5, 6, 'Approved by', 0, 0, "C");
        $fpdf->Cell(47.5, 6, 'Received by', 0, 0, "C");
        $fpdf->Cell(47.5, 6, 'Noted by', 0, 1, "C");


        $fpdf->Cell(5, 12, '', 0, 0);
        $fpdf->Cell(37.5, 12, '', 'B', 0);
        $fpdf->Cell(10, 12, '', 0, 0);
        $fpdf->Cell(37.5, 12, '', 'B', 0);
        $fpdf->Cell(10, 12, '', 0, 0);
        $fpdf->Cell(37.5, 12, '', 'B', 0);
        $fpdf->Cell(10, 12, '', 0, 0);
        $fpdf->Cell(37.5, 12, '', 'B', 1);

        $fpdf->Cell(5, 12, '', 0, 0);
        $fpdf->Cell(37.5, 12, 'Sales Dept', 0, 0, 'C');
        $fpdf->Cell(10, 12, '', 0, 0);
        $fpdf->MultiCell(37.5, 6, 'Marketing Dir./ GM Marketing / Sales Mgr', 0, "C", 0, 2); // multicell

        $fpdf->SetXY(110, 220);
        $fpdf->Cell(37.5, 12, 'Lab Technician', 0, 0, 'C');
        $fpdf->Cell(10, 12, '', 0, 0);
        $fpdf->Cell(37.5, 12, 'Technical Mgr / Lab Spv', 0, 1);

        $fpdf->SetFont('Times', '', 8);
        $fpdf->Cell(47.5, 6, 'Date :', 0, 0);
        $fpdf->Cell(47.5, 6, 'Date :', 0, 0);
        $fpdf->Cell(47.5, 6, 'Date :', 0, 0);
        $fpdf->Cell(47.5, 6, 'Date :', 0, 1);
        $fpdf->Cell(190, 6, '', 0, 1);
        $fpdf->Cell(190, 15, '', 1, 1);


        $fpdf->SetXY(15, 214);
        $fpdf->SetFont('Times', 'B', 10);
        $fpdf->Cell(37.5, 6, $transaction->sales->name, 0, 0, 'C');

        $fpdf->SetXY(12, 247);
        $fpdf->SetFont('Times', 'B', 10);
        $fpdf->Write(0, "Follow Up by Sales / Report Result : ");


        // optiona;
        $fpdf->SetFont('Times', '', 8);
        $fpdf->SetXY(10, 259);
        $fpdf->Cell(190, 4, '*) Optional', 0, 1);
        $fpdf->Cell(190, 4, '**) Must Filled if the sample is send via shipping service', 0, 1);
        $fpdf->Cell(190, 1, '', 0, 1);
        $fpdf->Cell(190, 4, 'Original : Tecnical', false, 1);
        $fpdf->Cell(190, 4, 'Copy : Sales Administration', false, 1);

        $fpdf->Output();
        exit();
    }
}
