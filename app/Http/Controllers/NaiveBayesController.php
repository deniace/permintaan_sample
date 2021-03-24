<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Transaction;

use App\Repositories\NbcRepository;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class NaiveBayesController extends Controller
{
    public function __construct(NbcRepository $nbcRepository)
    {
        $this->nbcRepository = $nbcRepository;
    }
    //
    public function index()
    {
        // mengambil data transaksi di tabel transaksi
        $trans = DB::table('transactions')
            ->limit(1)
            ->get();
        // cek apakah ada transaksi nya, jika 0 maka pindahkan ke import file excel
        if (count($trans)  === 0) {
            return redirect("/import");
        }

        // mengambil data bulan
        $bulan = $trans[0]->month;
        // mengambil data sales
        $data_sales1 = $this->nbcRepository->getSales1($bulan);

        // mengecek apakah ada transaksi nya, jika transaksi tidak ada (0) maka di arahkan ke import file excel
        if ($data_sales1['total_transaksi'][0] == 0) {
            return redirect("/import")->with('status', 'Permintaan sample I/C Additive, I/C Tronox dan I/C Pigment tidak di temukan, Harap Import sample'); // dengan flashdata flash session;
        }

        $data_sales1['bagi']['additive'][0] = $data_sales1['value']["additive"][0] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][1] = $data_sales1['value']["additive"][1] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][2] = $data_sales1['value']["additive"][2] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][3] = $data_sales1['value']["additive"][3] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][4] = $data_sales1['value']["additive"][4] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][5] = $data_sales1['value']["additive"][5] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][6] = $data_sales1['value']["additive"][6] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][7] = $data_sales1['value']["additive"][7] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][8] = $data_sales1['value']["additive"][8] / $data_sales1['total_transaksi'][0];
        $data_sales1['kali']['additive'] = $data_sales1['bagi']['additive'][0] * $data_sales1['bagi']['additive'][1] * $data_sales1['bagi']['additive'][2] * $data_sales1['bagi']['additive'][3] * $data_sales1['bagi']['additive'][4] * $data_sales1['bagi']['additive'][5] * $data_sales1['bagi']['additive'][6] * $data_sales1['bagi']['additive'][7] * $data_sales1['bagi']['additive'][8];

        $data_sales1['bagi']['tronox'][0] = $data_sales1['value']["tronox"][0] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][1] = $data_sales1['value']["tronox"][1] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][2] = $data_sales1['value']["tronox"][2] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][3] = $data_sales1['value']["tronox"][3] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][4] = $data_sales1['value']["tronox"][4] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][5] = $data_sales1['value']["tronox"][5] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][6] = $data_sales1['value']["tronox"][6] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][7] = $data_sales1['value']["tronox"][7] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][8] = $data_sales1['value']["tronox"][8] / $data_sales1['total_transaksi'][1];
        $data_sales1['kali']['tronox'] = $data_sales1['bagi']['tronox'][0] * $data_sales1['bagi']['tronox'][1] * $data_sales1['bagi']['tronox'][2] * $data_sales1['bagi']['tronox'][3] * $data_sales1['bagi']['tronox'][4] * $data_sales1['bagi']['tronox'][5] * $data_sales1['bagi']['tronox'][6] * $data_sales1['bagi']['tronox'][7] * $data_sales1['bagi']['tronox'][8];

        $data_sales1['bagi']['pigment'][0] = $data_sales1['value']["pigment"][0] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][1] = $data_sales1['value']["pigment"][1] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][2] = $data_sales1['value']["pigment"][2] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][3] = $data_sales1['value']["pigment"][3] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][4] = $data_sales1['value']["pigment"][4] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][5] = $data_sales1['value']["pigment"][5] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][6] = $data_sales1['value']["pigment"][6] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][7] = $data_sales1['value']["pigment"][7] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][8] = $data_sales1['value']["pigment"][8] / $data_sales1['total_transaksi'][2];
        $data_sales1['kali']['pigment'] = $data_sales1['bagi']['pigment'][0] * $data_sales1['bagi']['pigment'][1] * $data_sales1['bagi']['pigment'][2] * $data_sales1['bagi']['pigment'][3] * $data_sales1['bagi']['pigment'][4] * $data_sales1['bagi']['pigment'][5] * $data_sales1['bagi']['pigment'][6] * $data_sales1['bagi']['pigment'][7] * $data_sales1['bagi']['pigment'][8];

        // branc
        $data_branc1 = $this->nbcRepository->getBranc1($bulan);
        $data_branc1['bagi']['additive'][0] = $data_branc1['value']["additive"][0] / $data_branc1['total_transaksi'][0];
        $data_branc1['bagi']['additive'][1] = $data_branc1['value']["additive"][1] / $data_branc1['total_transaksi'][0];
        $data_branc1['bagi']['additive'][2] = $data_branc1['value']["additive"][2] / $data_branc1['total_transaksi'][0];
        $data_branc1['kali']['additive'] = $data_branc1['bagi']['additive'][0] * $data_branc1['bagi']['additive'][1] * $data_branc1['bagi']['additive'][2];

        $data_branc1['bagi']['tronox'][0] = $data_branc1['value']["tronox"][0] / $data_branc1['total_transaksi'][1];
        $data_branc1['bagi']['tronox'][1] = $data_branc1['value']["tronox"][1] / $data_branc1['total_transaksi'][1];
        $data_branc1['bagi']['tronox'][2] = $data_branc1['value']["tronox"][2] / $data_branc1['total_transaksi'][1];
        $data_branc1['kali']['tronox'] = $data_branc1['bagi']['tronox'][0] * $data_branc1['bagi']['tronox'][1] * $data_branc1['bagi']['tronox'][2];

        $data_branc1['bagi']['pigment'][0] = $data_branc1['value']["pigment"][0] / $data_branc1['total_transaksi'][2];
        $data_branc1['bagi']['pigment'][1] = $data_branc1['value']["pigment"][1] / $data_branc1['total_transaksi'][2];
        $data_branc1['bagi']['pigment'][2] = $data_branc1['value']["pigment"][2] / $data_branc1['total_transaksi'][2];
        $data_branc1['kali']['pigment'] = $data_branc1['bagi']['pigment'][0] * $data_branc1['bagi']['pigment'][1] * $data_branc1['bagi']['pigment'][2];

        // quantity
        $data_quantity = $this->nbcRepository->getQuantity($bulan);
        $data_quantity['bagi']['additive'][0] = $data_quantity['value']["additive"][0] / $data_branc1['total_transaksi'][0];
        $data_quantity['bagi']['additive'][1] = $data_quantity['value']["additive"][1] / $data_branc1['total_transaksi'][0];
        $data_quantity['bagi']['additive'][2] = $data_quantity['value']["additive"][2] / $data_branc1['total_transaksi'][0];
        $data_quantity['kali']['additive'] = $data_quantity['bagi']['additive'][0] * $data_quantity['bagi']['additive'][1] * $data_quantity['bagi']['additive'][2];

        $data_quantity['bagi']['tronox'][0] = $data_quantity['value']["tronox"][0] / $data_branc1['total_transaksi'][1];
        $data_quantity['bagi']['tronox'][1] = $data_quantity['value']["tronox"][1] / $data_branc1['total_transaksi'][1];
        $data_quantity['bagi']['tronox'][2] = $data_quantity['value']["tronox"][2] / $data_branc1['total_transaksi'][1];
        $data_quantity['kali']['tronox'] = $data_quantity['bagi']['tronox'][0] * $data_quantity['bagi']['tronox'][1] * $data_quantity['bagi']['tronox'][2];

        $data_quantity['bagi']['pigment'][0] = $data_quantity['value']["pigment"][0] / $data_branc1['total_transaksi'][2];
        $data_quantity['bagi']['pigment'][1] = $data_quantity['value']["pigment"][1] / $data_branc1['total_transaksi'][2];
        $data_quantity['bagi']['pigment'][2] = $data_quantity['value']["pigment"][2] / $data_branc1['total_transaksi'][2];
        $data_quantity['kali']['pigment'] = $data_quantity['bagi']['pigment'][0] * $data_quantity['bagi']['pigment'][1] * $data_quantity['bagi']['pigment'][2];

        // menghitung total transaksi bulanan
        $total_transaksi_bulanan = $data_sales1['total_transaksi'][0] + $data_sales1['total_transaksi'][1] + $data_sales1['total_transaksi'][2];

        // perhitungan probabilitas jumlah product type dibagi jumlah seluruhnya
        $data_sales1['prob'][0] = number_format(($data_sales1['total_transaksi'][0] / $total_transaksi_bulanan), 3);
        $data_sales1['prob'][1] = number_format(($data_sales1['total_transaksi'][1] / $total_transaksi_bulanan), 3);
        $data_sales1['prob'][2] = number_format(($data_sales1['total_transaksi'][2] / $total_transaksi_bulanan), 3);

        $data = array(
            "month" => $bulan,
            "months" => Transaction::distinct()->get('month'),
            "sales1" => $data_sales1,
            "branc1" => $data_branc1,
            "quantity" => $data_quantity,
        );

        return view("nbc", $data);
    }

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

        // sales
        $data_sales1 = $this->nbcRepository->getSales1($bulan);
        $data_sales1['bagi']['additive'][0] = $data_sales1['value']["additive"][0] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][1] = $data_sales1['value']["additive"][1] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][2] = $data_sales1['value']["additive"][2] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][3] = $data_sales1['value']["additive"][3] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][4] = $data_sales1['value']["additive"][4] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][5] = $data_sales1['value']["additive"][5] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][6] = $data_sales1['value']["additive"][6] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][7] = $data_sales1['value']["additive"][7] / $data_sales1['total_transaksi'][0];
        $data_sales1['bagi']['additive'][8] = $data_sales1['value']["additive"][8] / $data_sales1['total_transaksi'][0];
        $data_sales1['kali']['additive'] = $data_sales1['bagi']['additive'][0] * $data_sales1['bagi']['additive'][1] * $data_sales1['bagi']['additive'][2] * $data_sales1['bagi']['additive'][3] * $data_sales1['bagi']['additive'][4] * $data_sales1['bagi']['additive'][5] * $data_sales1['bagi']['additive'][6] * $data_sales1['bagi']['additive'][7] * $data_sales1['bagi']['additive'][8];

        $data_sales1['bagi']['tronox'][0] = $data_sales1['value']["tronox"][0] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][1] = $data_sales1['value']["tronox"][1] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][2] = $data_sales1['value']["tronox"][2] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][3] = $data_sales1['value']["tronox"][3] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][4] = $data_sales1['value']["tronox"][4] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][5] = $data_sales1['value']["tronox"][5] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][6] = $data_sales1['value']["tronox"][6] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][7] = $data_sales1['value']["tronox"][7] / $data_sales1['total_transaksi'][1];
        $data_sales1['bagi']['tronox'][8] = $data_sales1['value']["tronox"][8] / $data_sales1['total_transaksi'][1];
        $data_sales1['kali']['tronox'] = $data_sales1['bagi']['tronox'][0] * $data_sales1['bagi']['tronox'][1] * $data_sales1['bagi']['tronox'][2] * $data_sales1['bagi']['tronox'][3] * $data_sales1['bagi']['tronox'][4] * $data_sales1['bagi']['tronox'][5] * $data_sales1['bagi']['tronox'][6] * $data_sales1['bagi']['tronox'][7] * $data_sales1['bagi']['tronox'][8];

        $data_sales1['bagi']['pigment'][0] = $data_sales1['value']["pigment"][0] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][1] = $data_sales1['value']["pigment"][1] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][2] = $data_sales1['value']["pigment"][2] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][3] = $data_sales1['value']["pigment"][3] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][4] = $data_sales1['value']["pigment"][4] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][5] = $data_sales1['value']["pigment"][5] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][6] = $data_sales1['value']["pigment"][6] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][7] = $data_sales1['value']["pigment"][7] / $data_sales1['total_transaksi'][2];
        $data_sales1['bagi']['pigment'][8] = $data_sales1['value']["pigment"][8] / $data_sales1['total_transaksi'][2];
        $data_sales1['kali']['pigment'] = $data_sales1['bagi']['pigment'][0] * $data_sales1['bagi']['pigment'][1] * $data_sales1['bagi']['pigment'][2] * $data_sales1['bagi']['pigment'][3] * $data_sales1['bagi']['pigment'][4] * $data_sales1['bagi']['pigment'][5] * $data_sales1['bagi']['pigment'][6] * $data_sales1['bagi']['pigment'][7] * $data_sales1['bagi']['pigment'][8];

        // branc
        $data_branc1 = $this->nbcRepository->getBranc1($bulan);
        $data_branc1['bagi']['additive'][0] = $data_branc1['value']["additive"][0] / $data_branc1['total_transaksi'][0];
        $data_branc1['bagi']['additive'][1] = $data_branc1['value']["additive"][1] / $data_branc1['total_transaksi'][0];
        $data_branc1['bagi']['additive'][2] = $data_branc1['value']["additive"][2] / $data_branc1['total_transaksi'][0];
        $data_branc1['kali']['additive'] = $data_branc1['bagi']['additive'][0] * $data_branc1['bagi']['additive'][1] * $data_branc1['bagi']['additive'][2];

        $data_branc1['bagi']['tronox'][0] = $data_branc1['value']["tronox"][0] / $data_branc1['total_transaksi'][1];
        $data_branc1['bagi']['tronox'][1] = $data_branc1['value']["tronox"][1] / $data_branc1['total_transaksi'][1];
        $data_branc1['bagi']['tronox'][2] = $data_branc1['value']["tronox"][2] / $data_branc1['total_transaksi'][1];
        $data_branc1['kali']['tronox'] = $data_branc1['bagi']['tronox'][0] * $data_branc1['bagi']['tronox'][1] * $data_branc1['bagi']['tronox'][2];

        $data_branc1['bagi']['pigment'][0] = $data_branc1['value']["pigment"][0] / $data_branc1['total_transaksi'][2];
        $data_branc1['bagi']['pigment'][1] = $data_branc1['value']["pigment"][1] / $data_branc1['total_transaksi'][2];
        $data_branc1['bagi']['pigment'][2] = $data_branc1['value']["pigment"][2] / $data_branc1['total_transaksi'][2];
        $data_branc1['kali']['pigment'] = $data_branc1['bagi']['pigment'][0] * $data_branc1['bagi']['pigment'][1] * $data_branc1['bagi']['pigment'][2];

        // quantity
        $data_quantity = $this->nbcRepository->getQuantity($bulan);
        $data_quantity['bagi']['additive'][0] = $data_quantity['value']["additive"][0] / $data_branc1['total_transaksi'][0];
        $data_quantity['bagi']['additive'][1] = $data_quantity['value']["additive"][1] / $data_branc1['total_transaksi'][0];
        $data_quantity['bagi']['additive'][2] = $data_quantity['value']["additive"][2] / $data_branc1['total_transaksi'][0];
        $data_quantity['kali']['additive'] = $data_quantity['bagi']['additive'][0] * $data_quantity['bagi']['additive'][1] * $data_quantity['bagi']['additive'][2];

        $data_quantity['bagi']['tronox'][0] = $data_quantity['value']["tronox"][0] / $data_branc1['total_transaksi'][1];
        $data_quantity['bagi']['tronox'][1] = $data_quantity['value']["tronox"][1] / $data_branc1['total_transaksi'][1];
        $data_quantity['bagi']['tronox'][2] = $data_quantity['value']["tronox"][2] / $data_branc1['total_transaksi'][1];
        $data_quantity['kali']['tronox'] = $data_quantity['bagi']['tronox'][0] * $data_quantity['bagi']['tronox'][1] * $data_quantity['bagi']['tronox'][2];

        $data_quantity['bagi']['pigment'][0] = $data_quantity['value']["pigment"][0] / $data_branc1['total_transaksi'][2];
        $data_quantity['bagi']['pigment'][1] = $data_quantity['value']["pigment"][1] / $data_branc1['total_transaksi'][2];
        $data_quantity['bagi']['pigment'][2] = $data_quantity['value']["pigment"][2] / $data_branc1['total_transaksi'][2];
        $data_quantity['kali']['pigment'] = $data_quantity['bagi']['pigment'][0] * $data_quantity['bagi']['pigment'][1] * $data_quantity['bagi']['pigment'][2];

        // menghitung total transaksi bulanan
        $total_transaksi_bulanan = $data_sales1['total_transaksi'][0] + $data_sales1['total_transaksi'][1] + $data_sales1['total_transaksi'][2];

        // perhitungan probabilitas jumlah product type dibagi jumlah seluruhnya
        $data_sales1['prob'][0] = ($data_sales1['total_transaksi'][0] / $total_transaksi_bulanan);
        $data_sales1['prob'][1] = ($data_sales1['total_transaksi'][1] / $total_transaksi_bulanan);
        $data_sales1['prob'][2] = ($data_sales1['total_transaksi'][2] / $total_transaksi_bulanan);

        $data = array(
            "month" => $bulan,
            "months" => Transaction::distinct()->get('month'),
            "sales1" => $data_sales1,
            "branc1" => $data_branc1,
            "quantity" => $data_quantity,
        );

        return view("nbc", $data);
    }
}
