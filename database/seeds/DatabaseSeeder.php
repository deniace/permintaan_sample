<?php

use Illuminate\Database\Seeder;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // run the database seeder
        $this->call(JabatanSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StatusSeeder::class);
        $this->call(DivisionsSeeder::class);
        $this->call(AreasSeeder::class);
    }
}
