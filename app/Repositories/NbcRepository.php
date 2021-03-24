<?php

namespace App\Repositories;

use App\Transaction;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class NbcRepository
{
    public function getSales1($month)
    {
        $sales['value']['additive'][0] = Transaction::where([['id_sales', '=', 12], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();
        $sales['value']['additive'][1] = Transaction::where([['id_sales', '=', 4], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();
        $sales['value']['additive'][2] = Transaction::where([['id_sales', '=', 5], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();
        $sales['value']['additive'][3] = Transaction::where([['id_sales', '=', 6], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();
        $sales['value']['additive'][4] = Transaction::where([['id_sales', '=', 7], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();
        $sales['value']['additive'][5] = Transaction::where([['id_sales', '=', 8], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();
        $sales['value']['additive'][6] = Transaction::where([['id_sales', '=', 9], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();
        $sales['value']['additive'][7] = Transaction::where([['id_sales', '=', 10], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();
        $sales['value']['additive'][8] = Transaction::where([['id_sales', '=', 11], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();

        $sales['value']['tronox'][0] = Transaction::where([['id_sales', '=', 12], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();
        $sales['value']['tronox'][1] = Transaction::where([['id_sales', '=', 4], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();
        $sales['value']['tronox'][2] = Transaction::where([['id_sales', '=', 5], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();
        $sales['value']['tronox'][3] = Transaction::where([['id_sales', '=', 6], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();
        $sales['value']['tronox'][4] = Transaction::where([['id_sales', '=', 7], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();
        $sales['value']['tronox'][5] = Transaction::where([['id_sales', '=', 8], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();
        $sales['value']['tronox'][6] = Transaction::where([['id_sales', '=', 9], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();
        $sales['value']['tronox'][7] = Transaction::where([['id_sales', '=', 10], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();
        $sales['value']['tronox'][8] = Transaction::where([['id_sales', '=', 11], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();

        $sales['value']['pigment'][0] = Transaction::where([['id_sales', '=', 12], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();
        $sales['value']['pigment'][1] = Transaction::where([['id_sales', '=', 4], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();
        $sales['value']['pigment'][2] = Transaction::where([['id_sales', '=', 5], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();
        $sales['value']['pigment'][3] = Transaction::where([['id_sales', '=', 6], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();
        $sales['value']['pigment'][4] = Transaction::where([['id_sales', '=', 7], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();
        $sales['value']['pigment'][5] = Transaction::where([['id_sales', '=', 8], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();
        $sales['value']['pigment'][6] = Transaction::where([['id_sales', '=', 9], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();
        $sales['value']['pigment'][7] = Transaction::where([['id_sales', '=', 10], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();
        $sales['value']['pigment'][8] = Transaction::where([['id_sales', '=', 11], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();

        $sales["total_transaksi"][0] = $sales['value']['additive'][0] + $sales['value']['additive'][1] + $sales['value']['additive'][2] + $sales['value']['additive'][3] + $sales['value']['additive'][4] + $sales['value']['additive'][5] + $sales['value']['additive'][6] + $sales['value']['additive'][7] + $sales['value']['additive'][8];
        $sales["total_transaksi"][1] = $sales['value']['tronox'][0] + $sales['value']['tronox'][1] + $sales['value']['tronox'][2] + $sales['value']['tronox'][3] + $sales['value']['tronox'][4] + $sales['value']['tronox'][5] + $sales['value']['tronox'][6] + $sales['value']['tronox'][7] + $sales['value']['tronox'][8];
        $sales["total_transaksi"][2] = $sales['value']['pigment'][0] + $sales['value']['pigment'][1] + $sales['value']['pigment'][2] + $sales['value']['pigment'][3] + $sales['value']['pigment'][4] + $sales['value']['pigment'][5] + $sales['value']['pigment'][6] + $sales['value']['pigment'][7] + $sales['value']['pigment'][8];

        $sales['label'] = array('Zeila', 'Bagus', 'Christine', 'Elshinta', 'Haryono', 'Ivan', 'Permana', 'Randy', 'Rian');
        $sales['type'] = array('I/C Additive', 'I/C Tronox', 'I/C Pigment');

        $sales['max'] = 0;
        foreach ($sales['value'] as $value) {
            for ($i = 0; $i < count($value); $i++) {
                if ($sales['max'] < $value[$i]) {
                    $sales['max'] = $value[$i];
                }
            }
        }
        $sales['max'] += 5;
        return $sales;
    }


    public function getBranc1($month)
    {
        $branc['value']['additive'][0] = Transaction::where([['id_area', '=', "JKT"], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();
        $branc['value']['additive'][1] = Transaction::where([['id_area', '=', "SBY"], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();
        $branc['value']['additive'][2] = Transaction::where([['id_area', '=', "SMG"], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->count();

        $branc['value']['tronox'][0] = Transaction::where([['id_area', '=', "JKT"], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();
        $branc['value']['tronox'][1] = Transaction::where([['id_area', '=', "SBY"], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();
        $branc['value']['tronox'][2] = Transaction::where([['id_area', '=', "SMG"], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->count();

        $branc['value']['pigment'][0] = Transaction::where([['id_area', '=', "JKT"], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();
        $branc['value']['pigment'][1] = Transaction::where([['id_area', '=', "SBY"], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();
        $branc['value']['pigment'][2] = Transaction::where([['id_area', '=', "SMG"], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->count();

        $branc["total_transaksi"][0] = $branc['value']['additive'][0] + $branc['value']['additive'][1] + $branc['value']['additive'][2];
        $branc["total_transaksi"][1] = $branc['value']['tronox'][0] + $branc['value']['tronox'][1] + $branc['value']['tronox'][2];
        $branc["total_transaksi"][2] = $branc['value']['pigment'][0] + $branc['value']['pigment'][1] + $branc['value']['pigment'][2];

        $branc['label'] = array('jakarta', 'Surabaya', 'Semarang');
        $branc['type'] = array('I/C Additive', 'I/C Tronox', 'I/C Pigment');

        $branc['max'] = 0;
        foreach ($branc['value'] as $value) {
            for ($i = 0; $i < count($value); $i++) {
                if ($branc['max'] < $value[$i]) {
                    $branc['max'] = $value[$i];
                }
            }
        }
        $branc['max'] += 5;
        return $branc;
    }

    public function getTotalTransaction()
    {
        $total = Transaction::all()->count();
        return $total;
    }

    public function getQuantity($month)
    {
        $branc['value']['additive'][0] = Transaction::where([['id_area', '=', "JKT"], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->sum('qty');
        $branc['value']['additive'][1] = Transaction::where([['id_area', '=', "SBY"], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->sum('qty');
        $branc['value']['additive'][2] = Transaction::where([['id_area', '=', "SMG"], ['product_type', '=', 'I/C Additive'], ['month', '=', $month]])->sum('qty');

        $branc['value']['tronox'][0] = Transaction::where([['id_area', '=', "JKT"], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->sum('qty');
        $branc['value']['tronox'][1] = Transaction::where([['id_area', '=', "SBY"], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->sum('qty');
        $branc['value']['tronox'][2] = Transaction::where([['id_area', '=', "SMG"], ['product_type', '=', 'I/C Tronox'], ['month', '=', $month]])->sum('qty');

        $branc['value']['pigment'][0] = Transaction::where([['id_area', '=', "JKT"], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->sum('qty');
        $branc['value']['pigment'][1] = Transaction::where([['id_area', '=', "SBY"], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->sum('qty');
        $branc['value']['pigment'][2] = Transaction::where([['id_area', '=', "SMG"], ['product_type', '=', 'I/C Pigment'], ['month', '=', $month]])->sum('qty');

        $branc["total_transaksi"][0] = $branc['value']['additive'][0] + $branc['value']['tronox'][0] + $branc['value']['pigment'][0];
        $branc["total_transaksi"][1] = $branc['value']['additive'][1] + $branc['value']['tronox'][1] + $branc['value']['pigment'][1];
        $branc["total_transaksi"][2] = $branc['value']['additive'][2] + $branc['value']['tronox'][2] + $branc['value']['pigment'][2];

        $branc['label'] = array('jakarta', 'Surabaya', 'Semarang');
        $branc['type'] = array('I/C Additive', 'I/C Tronox', 'I/C Pigment');

        $branc['max'] = 0;
        foreach ($branc['value'] as $value) {
            for ($i = 0; $i < count($value); $i++) {
                if ($branc['max'] < $value[$i]) {
                    $branc['max'] = $value[$i];
                }
            }
        }
        $branc['max'] += 1000;
        return $branc;
    }
}
