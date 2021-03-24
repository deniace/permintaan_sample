<?php

use App\StatusModel;
use Illuminate\Database\Seeder;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        StatusModel::create([
            'id_status' => 1,
            'nama_status' => 'Pending'
        ]);
        StatusModel::create([
            'id_status' => 2,
            'nama_status' => 'Accepted'
        ]);
        StatusModel::create([
            'id_status' => 3,
            'nama_status' => 'Rejected'
        ]);
    }
}
