<?php

namespace App\Http\Controllers;

use App\Area;
use App\Division;
use App\Transaction;
use Illuminate\Http\Request;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class PermintaanSampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // menampilkan seluruh data
        $data = Transaction::all();
        return view("permintaansample.index", ["data" => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // mengambil data division
        $data["division"] = Division::all();
        // mengambil data area
        $data["area"] = Area::all();
        // mengambil data product
        return view("permintaansample.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // validasi input
        $request->validate([
            'id_sales' => 'required',
            'nama_product' => 'required',
            'qty' => 'required',
            'customer' => 'required',
            'id_division' => 'required',
            'id_area' => 'required',
            'tgl_pesan' => 'required',
            'end_application' => 'required',
            'manager_customer' => 'required',
            'product_type' => 'required',
            'supplier' => 'required',
            'status_product' => 'required',
            'tgl_pengiriman' => 'required',
        ], [
            // error message
            'id_sales.required' => 'Sales Harus diisi',
            'nama_product.required' => 'nama produk Harus diisi',
            'qty.required' => 'Jumlah Harus diisi',
            'customer.required' => 'Customer tidak boleh kosong',
            'id_division.required' => 'Division Harus Diisi',
            'id_area.required' => 'Area Tidak boleh kosong',
            'tgl.required' => 'Tanggal tidak boleh kosong'
        ]);

        // mengambil transaksi di table transaksi
        $trx = Transaction::orderByDesc("id_trx")->take(1)->get();

        // cek apakah ada 
        if (count($trx) > 0) {
            // jika ada maka ambul id transaksi nya lalu tambahkan 1
            $trxx = $trx->toArray();
            $id_trx = $trxx[0]['id_trx'] + 1;
        } else {
            // juka tidak ada maka id transaksi nya = 1
            $id_trx = 1;
        }

        for ($i = 0; $i < count($request->nama_product); $i++) {
            // insert data transaction
            $transaction = new Transaction;
            $transaction->id_trx = $id_trx;
            $transaction->id_sales = $request->id_sales;
            $transaction->id_division = $request->id_division;
            $tgl_pesan = explode('-', $request->tgl_pesan);
            $transaction->date = $tgl_pesan[2];
            $transaction->month = $this->bulan($tgl_pesan[1]);
            $transaction->id_area = $request->id_area;
            $transaction->product_type = $request->product_type[$i];
            $transaction->product_name = $request->nama_product[$i];
            $transaction->supplier = $request->supplier;
            $transaction->status_product = $request->status_product;
            $transaction->end_application = $request->end_application;
            $transaction->customer = $request->customer;
            $transaction->qty = $request->qty[$i];
            $transaction->tgl_pengiriman = $request->tgl_pengiriman;
            $transaction->note = $request->note;

            $transaction->save();
        }

        return redirect("/permintaansample")->with('status', 'data berhasil disimpan'); // dengan flashdata flash session

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $data['trx'] = Transaction::where("id_trx", $transaction->id_trx)->get();
        $data['transaction'] = $transaction;
        // menampilkan detail
        return view("permintaansample.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
        Transaction::where('id_transaction', $transaction->id_transaction)
            ->update([
                'id_manager' => $request->id_manager,
                'status_manager' => $request->status_manager
            ]);
        if ($request->status_manager == 2) {
            $status = "Success acc permintaan sample";
        } else {
            $status = "Success reject permintaan sample";
        }
        return redirect("/permintaansample")->with('status', $status); // dengan flashdata / flash session
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
