<?php

use App\JabatanModel;
use Illuminate\Database\Seeder;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // inserting data to database jabatan table
        JabatanModel::create([
            'id_jabatan' => 1,
            'nama_jabatan' => 'Admin',
            'singkatan_jabatan' => 'ADM'
        ]);
        JabatanModel::create([
            'id_jabatan' => 2,
            'nama_jabatan' => 'Manager',
            'singkatan_jabatan' => 'MGR'
        ]);
        JabatanModel::create([
            'id_jabatan' => 3,
            'nama_jabatan' => 'Sales',
            'singkatan_jabatan' => 'SLS'
        ]);
    }
}
