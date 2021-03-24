<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use PDF;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class PdfController extends Controller
{
    /**
     * menampilkan pdf berdasarkan id transaksi
     * @param : $id = id transaksi
     */
    public function show($id)
    {
        // menampilkan detail
        $transaction = Transaction::find($id);
        $pdf = PDF::loadview('pdf.index', ["data" => $transaction]);
        return $pdf->stream();
    }
}
