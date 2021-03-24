<?php

use App\Division;
use Illuminate\Database\Seeder;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class DivisionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Division::create([
            'id_division' => 1,
            'nama_division' => 'Food'
        ]);
        Division::create([
            'id_division' => 2,
            'nama_division' => 'Coating'
        ]);
        Division::create([
            'id_division' => 3,
            'nama_division' => 'Leather Paper'
        ]);
    }
}
