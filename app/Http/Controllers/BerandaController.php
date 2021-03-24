<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Repositories\NbcRepository;
use Illuminate\Http\Request;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class BerandaController extends Controller
{
    public function __construct(NbcRepository $nbcRepository)
    {
        $this->nbcRepository = $nbcRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trans = DB::table('transactions')
            ->limit(1)
            ->get();
        if (count($trans)  === 0) {
            return redirect("/import");
        }

        $bulan = $trans[0]->month;

        // 
        $data['month'] = $bulan;
        $data['months'] = Transaction::distinct()->get('month');
        $data['sales1'] = $this->nbcRepository->getSales1($bulan);
        $data['branc1'] = $this->nbcRepository->getBranc1($bulan);
        $data['quantity'] = $this->nbcRepository->getQuantity($bulan);

        $total_transaksi_bulanan = $data['sales1']['total_transaksi'][0] + $data['sales1']['total_transaksi'][1] + $data['sales1']['total_transaksi'][2];

        $data['persentase_transaksi'][0] = number_format(($data['sales1']['total_transaksi'][0] / $total_transaksi_bulanan * 100), 3);
        $data['persentase_transaksi'][1] = number_format(($data['sales1']['total_transaksi'][1] / $total_transaksi_bulanan * 100), 3);
        $data['persentase_transaksi'][2] = number_format(($data['sales1']['total_transaksi'][2] / $total_transaksi_bulanan * 100), 3);

        return view("/beranda", $data);
    }
    /**
     * Display the specified resource.
     *
     */
    public function show(Request $request)
    {
        // validasi input
        $request->validate([
            'bulan' => 'required'
        ], [
            // error message
            'nama_area.required' => 'bulan harus di isi',
        ]);

        $bulan = $request->bulan;

        $data['month'] = $bulan;
        $data['months'] = Transaction::distinct()->get('month');
        $data['sales1'] = $this->nbcRepository->getSales1($bulan);
        $data['branc1'] = $this->nbcRepository->getBranc1($bulan);
        $data['quantity'] = $this->nbcRepository->getQuantity($bulan);

        $total_transaksi_bulanan = $data['sales1']['total_transaksi'][0] + $data['sales1']['total_transaksi'][1] + $data['sales1']['total_transaksi'][2];

        $data['persentase_transaksi'][0] = $data['sales1']['total_transaksi'][0] / $total_transaksi_bulanan * 100;
        $data['persentase_transaksi'][1] = $data['sales1']['total_transaksi'][1] / $total_transaksi_bulanan * 100;
        $data['persentase_transaksi'][2] = $data['sales1']['total_transaksi'][2] / $total_transaksi_bulanan * 100;

        return view("beranda", $data);
    }
}
