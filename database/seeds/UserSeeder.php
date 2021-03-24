<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * Created By Deni supriyatna (Deni Ace)
 * email : denisupriyatna01@gmail.com
 */
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // inserting data to database users table
        User::create([
            'name' => 'admin',
            'id_role' => 1,
            'email' => 'admin@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('adminadmin')
        ]);

        User::create([
            'name' => 'manager',
            'id_role' => 2,
            'email' => 'manager@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('managermanager')
        ]);

        User::create([
            'name' => 'sales',
            'id_role' => 3,
            'email' => 'sales@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salessales')
        ]);

        User::create([
            'name' => 'Bagus',
            'id_role' => 3,
            'email' => 'bagus@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salessales')
        ]);
        User::create([
            'name' => 'Christine',
            'id_role' => 3,
            'email' => 'christine@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salessales')
        ]);
        User::create([
            'name' => 'Elshinta',
            'id_role' => 3,
            'email' => 'elshinta@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salessales')
        ]);
        User::create([
            'name' => 'Haryono',
            'id_role' => 3,
            'email' => 'haryono@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salessales')
        ]);
        User::create([
            'name' => 'Ivan',
            'id_role' => 3,
            'email' => 'ivan@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salessales')
        ]);
        User::create([
            'name' => 'Permana',
            'id_role' => 3,
            'email' => 'permana@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salessales')
        ]);
        User::create([
            'name' => 'Randy',
            'id_role' => 3,
            'email' => 'randy@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salessales')
        ]);
        User::create([
            'name' => 'Rian',
            'id_role' => 3,
            'email' => 'rian@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salessales')
        ]);
        User::create([
            'name' => 'Zeila',
            'id_role' => 3,
            'email' => 'zeila@mail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('salessales')
        ]);
    }
}
