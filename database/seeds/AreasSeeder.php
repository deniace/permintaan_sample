<?php

use App\Area;
use Illuminate\Database\Seeder;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class AreasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Area::create([
            'id_area' => "JKT",
            'nama_area' => 'Jakarta'
        ]);
        Area::create([
            'id_area' => 'BDG',
            'nama_area' => 'Bandung'
        ]);
        Area::create([
            'id_area' => 'SMG',
            'nama_area' => 'Semarang'
        ]);
        Area::create([
            'id_area' => 'SBY',
            'nama_area' => 'Surabaya'
        ]);
    }
}
