<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use App\Transaction;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class ImportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('import.forminput');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'file_excel' => "required"
        ]);
        $file = $request->file('file_excel');
        $spreadsheet = IOFactory::load($file);
        $sheetdata = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        $name = "";

        $trans = Transaction::orderBy("id_trx", "desc")->first();
        if ($trans) {
            $id_transaksi = $trans->id_trx + 1;
        } else {
            $id_transaksi = 0;
        }

        for ($i = 2; $i <= count($sheetdata); $i++) {
            if ($sheetdata[$i]['C'] == 'Zeila') {
                $id_sales = 12;
            } elseif ($sheetdata[$i]['C'] == 'Rian') {
                $id_sales = 11;
            } elseif ($sheetdata[$i]['C'] == 'Randy') {
                $id_sales = 10;
            } elseif ($sheetdata[$i]['C'] == 'Permana') {
                $id_sales = 9;
            } elseif ($sheetdata[$i]['C'] == 'Ivan') {
                $id_sales = 8;
            } elseif ($sheetdata[$i]['C'] == 'Haryono') {
                $id_sales = 7;
            } elseif ($sheetdata[$i]['C'] == 'Elshinta') {
                $id_sales = 6;
            } elseif ($sheetdata[$i]['C'] == 'Christine') {
                $id_sales = 5;
            } elseif ($sheetdata[$i]['C'] == 'Bagus') {
                $id_sales = 4;
            } else {
                $id_sales = 3;
            }

            if ($sheetdata[$i]['C'] != $name) {
                $name = $sheetdata[$i]['C'];
                $id_transaksi++;
            }

            $transaction = new Transaction;

            $transaction->id_trx = $id_transaksi;
            $transaction->id_division = 2;
            $transaction->date = $sheetdata[$i]['A'];
            $transaction->month = $sheetdata[$i]['B'];
            $transaction->id_sales = $id_sales;
            $transaction->id_area = $sheetdata[$i]['D'];
            $transaction->product_type = $sheetdata[$i]['E'];
            $transaction->product_name = $sheetdata[$i]['F'];
            $transaction->supplier = $sheetdata[$i]['G'];
            $transaction->status_product = $sheetdata[$i]['H'];
            $transaction->end_application = $sheetdata[$i]['I'] != null ? $sheetdata[$i]['I'] : "";
            $transaction->customer = $sheetdata[$i]['J'];
            $transaction->qty = $sheetdata[$i]['K'];
            $transaction->note = $sheetdata[$i]['L'] != null ? $sheetdata[$i]['L'] : "";

            $transaction->save();
        }
        return redirect("/import")->with('status', 'data berhasil disimpan'); // dengan flashdata flash session
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        // menghapus data
        Transaction::truncate();
        return redirect("/import")->with('status', 'data berhasil dihapus'); // dengan flashdata / flash session
    }
}
