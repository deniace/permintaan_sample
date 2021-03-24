<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function bulan($bulan_angka)
    {
        $bulan = array(
            0 => '',
            1 => 'Jan',
            "Feb",
            "Mar",
            "Apr",
            "Mei",
            "Jun",
            "Jul",
            "Ags",
            "Sep",
            "Okt",
            "Nov",
            "Des"
        );
        // mengambil karakter pertama
        $bulan_depan = substr($bulan_angka, 0, 1);

        // cek karakter pertama, jika 0 maka hapus
        if ($bulan_depan == "0") {
            $bulan_angka_clean = str_replace("0", "", $bulan_angka);
        } else {
            $bulan_angka_clean = $bulan_angka;
        }
        return $bulan[$bulan_angka_clean];
    }
}
